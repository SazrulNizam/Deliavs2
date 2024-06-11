<?php
require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {
    function definition() {
        $mform = $this->_form;
        
        // File picker element
        $mform->addElement(
            'filepicker',
            'userfile',
            'File',
            null,
            [
                'maxbytes' => 1111111111,
                'accepted_types' => '*',
            ]
        );
        
        // Hidden elements for student ID and course ID
        $mform->addElement('hidden', 'student_id', $_GET["id"]);
        $mform->addElement('hidden', 'course_id', $_GET['course_id']);
        
        // Comments field
        //$mform->addElement('textarea', 'comments', get_string('comments'), 'wrap="virtual" rows="5" cols="50"');
        //$mform->addRule('comments', null, 'required', null, 'client');
        
        // Submit button
        $this->add_action_buttons(true, get_string('upload'));
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Form submitted.";
    var_dump($_POST);
    var_dump($_FILES);

    $mform = new simplehtml_form();

    if ($fromform = $mform->get_data()) {
        echo "Form data retrieved.";
        // Handle file upload
        if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
            echo "File uploaded.";
            $name = $mform->get_new_filename('userfile');
            $fullpath = "FileHere/" . $name; 
            $success = $mform->save_file('userfile', $fullpath);

            if ($success) {
                global $DB, $USER;

                // Prepare the data for insertion
                $data = new stdClass();
                $data->timecreated = time();
                $data->file = $name;
                $data->path = $fullpath;
                $data->uploadid = $USER->id;
                $data->courseid = $fromform->course_id;
                $data->userid =  $fromform->student_id;
                $data->status = 'uploaded';

                // Update or insert the record in the database
                $existing_record = $DB->get_record('local_reportcards', array('userid' => $fromform->student_id, 'courseid' => $fromform->course_id));

                if ($existing_record) {
                    $data->id = $existing_record->id;
                    $DB->update_record('local_reportcards', $data);
                    echo "Record has been updated successfully";
                } else {
                    $DB->insert_record('local_reportcards', $data);
                    echo "Record has been added successfully";
                }

                redirect('../reportcard.php', null, null, \core\output\notification::NOTIFY_SUCCESS);
            } else {
                echo "Failed to save the file.";
            }
        } else {
            echo "No file selected or file upload error.";
        }
    } else {
        echo "Form data not valid.";
    }
}
?>
