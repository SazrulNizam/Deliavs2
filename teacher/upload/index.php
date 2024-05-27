<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;
require_once($CFG->dirroot.'/teacher/upload/form.php');

// Instantiate the form.
echo $OUTPUT->header();

$student_id = $_GET["id"];
$course_id = $_GET['course_id'];

echo "Student ID: " . $student_id . "<br>";
echo "Course ID: " . $course_id . "<br>";

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
    $fullpath = $CFG->dataroot."/FileHere/".$name; 
    $success = $mform->save_file('userfile', $fullpath);

    echo "name?: " .$name ."<br>";
    echo "path?: ".$fullpath."<br>";
    echo "success or not?: " . $success . "<br>";
    echo "Upload success: " . ($success ? 'Yes' : 'No') . "<br>";
    
  


    if ($success) {
        // Check if there's already a file uploaded for this student under this course
        // Only one file is allowed for one student under specific course
        $existing_record = $DB->get_record('local_reportcards', ['userid' => $student_id, 'courseid' => $course_id]);

        $data = new stdClass;
        $data->userid = $student_id;
        $data->path = $fullpath;
        $data->status = $existing_record ? 1 : 'Uploaded';
        $data->timecreated = time();
        $data->uploadid = $USER->id;
        $data->courseid = $course_id;

        $insert_result =$DB->insert_record('local_reportcards', $data);

        // Check if insertion was successful
        if ($insert_result) {
        echo "Record inserted successfully.<br>";
        } else {
        echo "Error inserting record: " . $DB->get_last_error() . "<br>";
        }


        redirect($redirect, 'Record have been added succesfully', null, \core\output\notification::NOTIFY_SUCCESS);
    } if ($fromform = $mform->get_data()) {

        echo "<pre>";
        print_r($fromform);
        echo "</pre>";

       
        // Check if file was uploaded successfully
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            echo "File upload failed with error code: " . $_FILES['file']['error'];
            echo 'file count=', count($_FILES),"\n"; 
            print "<pre>"; 
            print_r($_FILES); 
            print "</pre>"; 
            echo "\n"; 
            // Exit or return to prevent further execution
            return;
        }

        
    }
} else {
    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();
