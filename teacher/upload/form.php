<?php
require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {
    function definition() {
        $mform = $this->_form;
        
        // File picker element
        $mform->addElement('filepicker', 'userfile', get_string('file'), null, [
            'maxbytes' => 10485760, // 10MB
            'accepted_types' => '*',
        ]);
        
        // Hidden elements for student ID and course ID
        $mform->addElement('hidden', 'student_id');
        $mform->setType('student_id', PARAM_INT);
        
        $mform->addElement('hidden', 'course_id');
        $mform->setType('course_id', PARAM_INT);
        
        // Comments field
        $mform->addElement('textarea', 'comments', get_string('comments'), 'wrap="virtual" rows="5" cols="50"');
        $mform->addRule('comments', null, 'required', null, 'client');
        
        // Submit button
        $this->add_action_buttons(true, get_string('upload'));
    }
}
?>
