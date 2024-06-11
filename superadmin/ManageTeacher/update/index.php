<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");
require_once($CFG->dirroot.'/superadmin/ManageTeacher/update/form.php');





$mform = new simplehtml_form();



// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    redirect('../manage-teacher.php');
    
} else if ($fromform = $mform->get_data()) {
   

  

    $sql =  mysqli_query($con,"UPDATE mdl_local_teachers set nameofteacher= '" . $fromform->nameofteacher. "' WHERE id ='". $fromform->id."'");


    redirect('../manage-teacher.php', 'Record have been added succesfully', null, \core\output\notification::NOTIFY_SUCCESS);
   


} else {


    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();

