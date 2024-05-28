<?php
require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {
    function definition() {
        $mform = $this->_form;
        
        // File picker element
      
        
        $mform->addElement(
            'filepicker',
            'userfile',
            'File',
            null,
            [
                'maxbytes' => 1111111111,
                'accepted_types' => '*',
            ]
        );
        
        // Hidden elements for student ID and course ID
        $mform->addElement('hidden', 'student_id', $_GET["id"]);
    
        $mform->addElement('hidden', 'course_id',$_GET['course_id']);
        
        // Comments field
        //$mform->addElement('textarea', 'comments', get_string('comments'), 'wrap="virtual" rows="5" cols="50"');
        //$mform->addRule('comments', null, 'required', null, 'client');
        
        // Submit button
        $this->add_action_buttons(true, get_string('upload'));
    }
}
?>
