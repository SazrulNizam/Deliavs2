<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");

$ids = $_GET["id"];

$path = mysqli_query($con,"SELECT * FROM mdl_local_videos WHERE id = $ids");
$data=mysqli_fetch_assoc($path);
$filepath = $data['path'];
$delete = mysqli_query($con,"DELETE FROM mdl_local_videos WHERE id = $ids ");


unlink($filepath);

redirect('recording.php', 'Record have been deleted', null, \core\output\notification::NOTIFY_ERROR);


echo $OUTPUT->footer();

