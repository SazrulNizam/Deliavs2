<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");

$ids = $_GET["id"];
echo $ids;

$anjin = "SELECT *
FROM mdl_user WHERE id = $ids ";
$bab = mysqli_query($con,$anjin);
$ayam = mysqli_fetch_assoc($bab);
require_once($CFG->dirroot.'/superadmin/video/vod/form.php');

$mform = new simplehtml_form();

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    redirect('vod.php');
    
} else if ($fromform = $mform->get_data()) {
   




    $name = $ayam['username'].$mform->get_new_filename('userfile');

    $fullpath = "../Video/".$name;
    $success = $mform->save_file('userfile', $fullpath);

 

    redirect('vod.php', 'Record have been added succesfully', null, \core\output\notification::NOTIFY_SUCCESS);


} else {


    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();

