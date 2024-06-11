<?php

require_once("$CFG->libdir/formslib.php");

class simplehtml_form extends moodleform {

    function definition() {
        global $CFG;
       
        $mform = $this->_form; // Don't forget the underscore! 
        $con =mysqli_connect("localhost","root","","deliadata");

        $idss =   $_GET["id"];
        $mform->addElement('hidden', 'id', $_GET["id"]);

        $sql = 'SELECT * FROM mdl_local_teachers WHERE id = ?';
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $idss);
$stmt->execute();
$result = $stmt->get_result();
$resultss = mysqli_fetch_assoc($result);

        // $queryss =  mysqli_query($con,"SELECT * FROM mdl_local_teachers WHERE id = $idss");
        // $resultss = mysqli_fetch_assoc($queryss);

        
        $mform->addElement('text', 'nameofteacher', 'Name Of Teacher');
        $mform->setDefault('nameofteacher',$resultss['nameofteacher']);


        $options = array(
            'NADI' => 'NADI',
            'HQ' => 'HQ',
        );
        $select = $mform->addElement('select', 'categoryofteacher', 'Category Of Teacher', $options);
        // This will select the colour blue.
        $select->setSelected($resultss['categoryofteacher']);

        // $mform->addElement('text', 'name', 'test', 'test');
        // $mform->setDefault('name','test');



        $mform->addElement('text', 'contactnumber', 'Contact Number');
        $mform->setDefault('contactnumber',$resultss['contactnumber']);

        
        $mform->addElement('text', 'email', 'Email');
        $mform->setDefault('email',$resultss['email']);

        $mform->addElement('textarea', 'address', 'Address', 'wrap="virtual" rows="4" cols="4"');
        $mform->setDefault('address',$resultss['address']);

        $mform->addElement('text', 'qualification', 'Qualification');
        $mform->setDefault('qualification',$resultss['qualification']);

        $mform->addElement('text', 'yearofexperience', 'Year Of Experience');
        $mform->setDefault('yearofexperience',$resultss['yearofexperience']);

        $mform->addElement('text', 'module', 'Module');
        $mform->setDefault('module',$resultss['module']);

        $mform->addElement('text', 'studentlevel', 'Student Level');
        $mform->setDefault('studentlevel',$resultss['studentlevel']);


        $this->add_action_buttons(true, "Update");

        

    }                           // Close the function

}       
