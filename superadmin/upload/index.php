<?php

require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;
require_once($CFG->dirroot.'/superadmin/upload/form.php');


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();

$ids = $_GET["id"];
echo $ids;
$mform = new simplehtml_form();

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    echo "You has clicked cancel button";
    
} else if ($fromform = $mform->get_data()) {
   
    echo $_GET['id'];
    $name = $mform->get_new_filename('userfile');

    $fullpath = "FileHere/".$name;
    $success = $mform->save_file('userfile', $fullpath);

    $data = new stdClass;
    $data->userid =   $_GET['id'];

    redirect($redirect, $name, null, \core\output\notification::NOTIFY_SUCCESS);


} else {
   

    // Display the form.
    $mform->display();
}

echo $OUTPUT->footer();

