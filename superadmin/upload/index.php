<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;

// Instantiate the form.
echo $OUTPUT->header();

$student_id = $_GET["id"];
$course_id = $_GET['course_id'];

echo "Student ID: " . $student_id . "<br>";
echo "Course ID: " . $course_id . "<br>";
echo "Current User ID: " . $USER->id . "<br>";
require_once($CFG->dirroot.'/teacher/upload/form.php');

$mform = new simplehtml_form();
$mform->set_data([
    'userid' => $student_id,
    'courseid' => $course_id,
    'uploadid' => $USER->id,
]);


// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    echo "You have clicked the cancel button";
} else if ($fromform = $mform->get_data()) {
    $name = $mform->get_new_filename('userfile');
    $fullpath = "FileHere/".$name; 
    $success = $mform->save_file('userfile', $fullpath);

    if ($success) {
        // Prepare the data for insertion
        $data = new stdClass();
        $data->timecreated = time();
        $data->file = $name;
        $data->path = $fullpath;
        $data->uploadid = $USER->id;
        $data->courseid = $fromform->course_id;
        $data->userid =  $fromform->student_id;
        $data->status = 'uploaded';

        // Insert or update the record in the database
        $existing_record = $DB->get_record('local_reportcards', array('uploadid' => $fromform->student_id, 'courseid' => $fromform->course_id));

        if ($existing_record) {
            $data->id = $existing_record->id;
            $DB->update_record('local_reportcards', $data);
        } else {
            $DB->insert_record('local_reportcards', $data);
        }

        $_SESSION['message'] = 'success';

        redirect('../reportcard.php');
    } else {
        echo "Failed to save the file.";
    }
} else {
    
    // Check if a file is already uploaded for this student under this course
    $student_id = optional_param('student_id', 0, PARAM_INT);
    $course_id = optional_param('course_id', 0, PARAM_INT);

    if ($student_id && $course_id) {
        $record = $DB->get_record('local_reportcards', array('uploadid' => $student_id, 'courseid' => $course_id));

        if ($record && $record->status === 'uploaded') {
            $status_message = "File has been uploaded.";
        } else {
            $status_message = "File not uploaded.";
        }

        echo "<p>Status: $status_message</p>";
    }

    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();
?>

