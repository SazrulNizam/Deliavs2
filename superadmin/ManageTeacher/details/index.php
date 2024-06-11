<?php

require_once("../../../config.php");
global $CFG, $DB, $USER, $OUTPUT;

$courseurl = core_course_category::user_top() ? new moodle_url('../manage-teacher.php') : null;
$PAGE->navbar->add("Manage Teacher", $courseurl);
$PAGE->navbar->add("Details", new moodle_url('../library.php'));


$PAGE->set_heading('Details');
// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
require_once($CFG->dirroot.'/superadmin/ManageTeacher/details/form.php');



$mform = new simplehtml_form();


// Form processing and displaying is done here.
if ($mform->is_cancelled()) {

    redirect('../manage-teacher.php');
    
}  else {


    // Display the form.
    
    $mform->display();
    echo "
        <a href='../manage-teacher.php' class='btn btn-secondary btn-lg active' role='button' aria-pressed='true'>Back</a>" ;
}

echo $OUTPUT->footer();

