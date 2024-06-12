<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;

$student_id = optional_param('id', 0, PARAM_INT);
$course_id = optional_param('course_id', 0, PARAM_INT);
$filename = optional_param('file', 0, PARAM_INT);
$action = optional_param('action', '', PARAM_ALPHA);

// Header
echo $OUTPUT->header();


if ($action === 'view') {
    // Retrieve the file record from the database

    $filename = basename($_GET["file"]);
    echo $filename;
    $filepath = "FileHere/" . $filename;
    
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type:  application/zip");
    header("Content-Transfer-Encoding: binary");
    readfile($filepath);
     exit;

    } 


 else if ($action === 'delete' && $student_id && $course_id) {
    echo $course_id;
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

<script>
function confirmDelete(student_id, course_id) {
    if (confirm("Are you sure you want to delete this file?")) {
        // Perform AJAX request to delete the file
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>?id=" + student_id + "&course_id=" + course_id + "&action=delete", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("message").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
}
</script>