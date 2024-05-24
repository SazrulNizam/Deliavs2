<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;
require_once($CFG->dirroot.'/superadmin/video/vod/form.php');


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");

$ids = (int)$_GET["id"];
echo $ids;

$anjing = "SELECT *
FROM mdl_user WHERE id = $ids ";
$babi = mysqli_query($con,$anjing);
$ayam = mysqli_fetch_assoc($babi);

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

