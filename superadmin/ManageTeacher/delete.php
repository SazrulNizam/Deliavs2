<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");

$ids = $_GET["id"];


$delete = mysqli_query($con,"DELETE FROM mdl_local_teachers WHERE id = $ids ");

$_SESSION['message'] = 'delete';
redirect('manage-teacher.php');


echo $OUTPUT->footer();

