<?php
require_once("../../config.php");

// Ensure user is logged in
require_login();

// Include necessary global variables
global $CFG, $DB, $USER, $OUTPUT;

// Get parameters
$action = optional_param('action', '', PARAM_ALPHA);
$student_id = optional_param('id', 0, PARAM_INT);
$course_id = optional_param('course_id', 0, PARAM_INT);
// Header
echo $OUTPUT->header();
// Handle actions
if ($action == 'view' && $student_id && $course_id) {
    // Fetch record from the database
    $record = $DB->get_record('local_reportcards', array('userid' => $student_id, 'courseid' => $course_id));

    if ($record) {
        // Check if the record is uploaded
        if ($record->status == 'uploaded') {
            echo $file_path = $record->path;
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));
        echo readfile($file_path);
        exit;

    } else {
        // If no record found in the database
        echo "<p>No record found for this student and course.</p>";
    }}
} else {
    // If action is not 'view' or missing parameters
    echo "<p>Invalid action or parameters.</p>";
}

// Footer
echo $OUTPUT->footer();
?>