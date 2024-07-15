<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");
require_once($CFG->dirroot.'/superadmin/ManageTeacher/form.php');





$mform = new simplehtml_form();

$mform->set_data([
    'userid' => $ids,

]);

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    redirect('manage-teacher.php');
    
} else if ($fromform = $mform->get_data()) {
   

  
    $data = new stdclass;
    $data->nameofteacher = $fromform->nameofteacher;
    $data->categoryofteacher = $fromform->categoryofteacher;
    $data->contactnumber = $fromform->contactnumber;
    $data->email = $fromform->email;
    $data->address = $fromform->address;
    $data->qualification = $fromform->qualification;
    $data->yearofexperience = $fromform->yearofexperience;
    $data->module = $fromform->module;
    $data->studentlevel = $fromform->studentlevel;
    $data->timecreated = time();

    $DB->insert_record('local_teachers',$data);

    $_SESSION['message'] = 'success';
    redirect('manage-teacher.php');
   


} else {


    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();

