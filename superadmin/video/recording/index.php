<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");
require_once($CFG->dirroot.'/superadmin/video/recording/form.php');





$mform = new simplehtml_form();

$mform->set_data([
    'userid' => $ids,

]);

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    redirect('recording.php');
    
} else if ($fromform = $mform->get_data()) {
   


   

    $name = (rand(10,999999)).$mform->get_new_filename('userfile');

  

    $fullpath = "../Video/".$name;
    $success = $mform->save_file('userfile', $fullpath);

    $data = new stdclass;
    $data->file = $name;
    $data->title = $fromform->title;
    $data->path = $fullpath;
    $data->description = $fromform->description;
    $data->timecreated = time();
    $data->category = "recording";
    $data->title = $fromform->title;

    $DB->insert_record('local_videos',$data);

    redirect('recording.php', 'Record have been added succesfully', null, \core\output\notification::NOTIFY_SUCCESS);
 


    


} else {


    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();

