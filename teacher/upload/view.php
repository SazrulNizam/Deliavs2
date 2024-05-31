<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;

$student_id = optional_param('id', 0, PARAM_INT);
$course_id = optional_param('course_id', 0, PARAM_INT);
$action = optional_param('action', '', PARAM_ALPHA);

// Header
echo $OUTPUT->header();

// Check action
if ($action === 'view' && $student_id && $course_id) {
    $record = $DB->get_record('local_reportcards', array('userid' => $student_id, 'courseid' => $course_id));
    if ($record && $record->status === 'uploaded') {
        echo $file_path = $record->path;
       
        echo '<iframe src="https://docs.google.com/viewer?url=' . urlencode($file_path) . '&embedded=true" style="width: 100%; height: 600px;"></iframe>';
            
    } else {
        echo "<p>No file uploaded for this student and course.</p>";
    }

} else if ($action === 'delete' && $student_id && $course_id) {
    $record = $DB->get_record('local_reportcards', array('userid' => $student_id, 'courseid' => $course_id));
    if ($record && $record->status === 'uploaded') {
        // Check if the file exists
        $file_path = trim($record->path);
        echo "<p>Retrieved file path from the database: $file_path</p>"; 
        if (file_exists($file_path)) {
            if (unlink($file_path)) {
                // Update the database record
                $DB->delete_records('local_reportcards', array('userid' => $student_id, 'courseid' => $course_id));


                echo "<p>File has been deleted successfully.</p>";
            } else {
               
                echo "<p>Failed to delete the file.</p>";
            }
        } else {
            echo "<p>File does not exist at path: $file_path</p>";
        }
    } 

   
}

echo $OUTPUT->footer();
?>