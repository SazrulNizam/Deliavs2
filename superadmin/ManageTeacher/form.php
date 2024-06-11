<?php

require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {

    function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 

        
        $mform->addElement('text', 'nameofteacher', 'Name Of Teacher');

        $options = array(
            'NADI' => 'NADI',
            'HQ' => 'HQ',
        );
        $select = $mform->addElement('select', 'categoryofteacher', 'Category Of Teacher', $options);
        // This will select the colour blue.
        $select->setSelected('NADI');

        // $mform->addElement('text', 'name', 'test', 'test');
        // $mform->setDefault('name','test');



        $mform->addElement('text', 'contactnumber', 'Contact Number');
        $mform->addRule('contactnumber', 'Number Only', 'numeric', null, 'client');

        
        $mform->addElement('text', 'email', 'Email');
        $mform->addRule('email', 'Email Only', 'email', null, 'client');

        $mform->addElement('textarea', 'address', 'Address', 'wrap="virtual" rows="4" cols="4"');

        $mform->addElement('text', 'qualification', 'Qualification');

        $mform->addElement('text', 'yearofexperience', 'Year Of Experience');

        $mform->addElement('text', 'module', 'Module');

        $mform->addElement('text', 'studentlevel', 'Student Level');

        $this->add_action_buttons(true, "Add Teacher");

//         $buttonarray=array();
// $buttonarray[] = $mform->createElement('submit', 'submitbutton', get_string('savechanges'));
// $buttonarray[] = $mform->createElement('reset', 'resetbutton', get_string('revert'));
// $buttonarray[] = $mform->createElement('cancel',null,'back');
// $mform->addGroup($buttonarray, 'buttonar', '', ' ', false);

    }                           // Close the function

}       
