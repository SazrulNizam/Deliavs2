<?php
require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;
require_once("$CFG->libdir/formslib.php");


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");
//Database personal information


//Personal Information
$name = $_POST["name"];
$icnumber = $_POST["icnumber"];
$pnumber = intval($_POST["pnumber"]);
$schoolname = $_POST["schoolname"];
$bdate = $_POST["bdate"];
$gender = $_POST["gender"];
$race = $_POST["race"];
$state = $_POST["state"];
$nadi = $_POST["nadi"];
$email = $_POST["email"];
$currenttime = time();

//Guardian Information
$father_name = $_POST["father_name"];
$father_number = intval($_POST["father_number"]);
$mother_name = $_POST["mother_name"];
$mother_number = intval($_POST["mother_number"]);
$parent_email = $_POST["parent_email"];
$address = $_POST["address"];
$receiver = $_POST["receiver"];
$type_of_aid = $_POST["type_of_aid"];
$father_income = intval($_POST["father_income"]);
$mother_income = intval($_POST["mother_income"]);
$total_income = intval($_POST["total_income"]);
$total_depen = intval($_POST["total_depen"]);


//UPSR
$upsrsubject = $_POST["UPSRsubject"];
$upsrgrade = $_POST["UPSRgrade"];
$upsrmarks = $_POST["UPSRmarks"];

//UASA
$uasasubject = $_POST["UASAsubject"];
$uasagrade = $_POST["UASAgrade"];
$uasamarks = $_POST["UASAmarks"];

//FORM4
$form4subject = $_POST["form4subject"];
$form4grade = $_POST["form4grade"];
$form4marks = $_POST["form4marks"];

//PAJSK
$pajsk = $_POST["pajsk"];
$pajskgrade = intval($_POST["pajskgrade"]);;

//PSYCHOMETRIC
$psy = $_POST["psy"];
$psygrade = intval($_POST["psygrade"]);;

//ATTENDANCE

$attendance = $_POST["attendance"];
$month = $_POST["month"];

//SIBLING INFORMATION

$siblingname = $_POST["siblingname"];
$siblingeducation = $_POST["siblingeducation"];
$siblingage = $_POST["siblingage"];


//ENDHERE

// $testd = count($form4subject);
// for($i = 0; $i<count($form4subject); $i++){

//   if(!empty($form4subject[$i]) && !empty($form4grade[$i])){
  
//   $integermark = intval($form4marks[$i]);


//   $form4 = "INSERT INTO mdl_local_form4_exam (subjectexam,markexam,gradeexam)
// VALUES('$form4subject[$i]', '$integermark','$form4grade[$i]')";

// if (mysqli_query($con, $form4)) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $form4 . "<br>" . mysqli_error($con);
//   }
// }
// else{

//   echo "subject empty";

// }
// }
// die();

//Checking if ICnumber already exist.if not exist only then data can go through

$querysthis = "SELECT * FROM mdl_local_personal_information WHERE ic_number = $icnumber";
$resultsthis = mysqli_query($con,$querysthis);

if ( mysqli_num_rows ( $resultsthis ) >= 1 ){

  echo "This Ic Number Already Exist";
}
else
{




  //Personal Information Query
$querys = "INSERT INTO mdl_local_personal_information (state,nadi,name,gender,race, birth_date, ic_number,mobile,email,school_name,timecreated)
VALUES('$state', '$nadi','$name','$gender','$race','$bdate','$icnumber','$pnumber','$email','$schoolname','$currenttime')";
mysqli_query($con, $querys);

 //Guardian Information Query
$guardianinfo = "INSERT INTO mdl_local_guardian_information (mother_name,mother_number,father_name,father_number,parents_email,address,total_dependants,receiver_aid,type_receiver,father_income,mother_income,total_income,timecreated,userid)
VALUES('$mother_name', '$mother_number','$father_name','$father_number','$parent_email','$address','$total_depen','$receiver','$type_of_aid','$father_income','$mother_income','$total_income','$currenttime','$icnumber')";
mysqli_query($con, $guardianinfo);

//UPSR GRADE
if(!empty($upsrsubject)){
for($i = 0; $i<count($upsrsubject); $i++){

  if(!empty($upsrsubject[$i]) && !empty($upsrgrade[$i])){

$integermark = intval($upsrmarks[$i]);
$upsr = "INSERT INTO mdl_local_upsr (subjectupsr,markupsr,gradeupsr,timecreated,userid)
VALUES('$upsrsubject[$i]', '$integermark','$upsrgrade[$i]','$currenttime','$icnumber')";
mysqli_query($con, $upsr);
  }
}
}

//FORM 3 UASA GRADE
if(!empty($uasasubject)){

for($i = 0; $i<count($uasasubject); $i++){

  if(!empty($uasasubject[$i]) && !empty($uasagrade[$i])){
  
  $integeruasa = intval($uasamarks[$i]);

  $uasa = "INSERT INTO mdl_local_uasa (subjectuasa,markuasa,gradeuasa,timecreated,userid)
VALUES('$uasasubject[$i]', '$integeruasa','$uasagrade[$i]','$currenttime','$icnumber')";
mysqli_query($con, $uasa);

}
}
}

//FORM 4 GRADE
for($i = 0; $i<count($form4subject); $i++){

  if(!empty($form4subject[$i]) && !empty($form4grade[$i])){
  
  $integerform4 = intval($form4marks[$i]);

  $form4 = "INSERT INTO mdl_local_form4_exam (subjectexam,markexam,gradeexam,timecreated,userid)
VALUES('$form4subject[$i]', '$integerform4','$form4grade[$i]','$currenttime','$icnumber')";
mysqli_query($con, $form4);
$average_course = $average_course + $integerform4;
}

}

//PAJSK
$pajskdata = "INSERT INTO mdl_local_non_academic (subject,mark,timecreated,userid)
VALUES('$pajsk', '$pajskgrade','$currenttime','$icnumber')";
mysqli_query($con, $pajskdata);

//PSY
$psydata = "INSERT INTO mdl_local_non_academic (subject,mark,timecreated,userid)
VALUES('$psy', '$psygrade','$currenttime','$icnumber')";
mysqli_query($con, $psydata);

//Sibling Information
if(!empty($siblingname)){
  for($i = 0; $i<count($siblingname); $i++){
  
    if(!empty($siblingname[$i])){
  
  $sibage = intval($siblingage[$i]);
  $siblinginformation = "INSERT INTO mdl_local_sibling_information (sibling_name,sibling_age,sibling_education,timecreated,userid)
  VALUES('$siblingname[$i]', '$sibage','$siblingeducation[$i]','$currenttime','$icnumber')";
  mysqli_query($con, $siblinginformation);
    }
  }
  }


  //ATTENDANCE
  for($i = 0; $i<count($attendance); $i++){
  
    $integeratt = intval($attendance[$i]);
  
    $attdata = "INSERT INTO mdl_local_attandance (months,average,timecreated,userid)
  VALUES('$month[$i]', '$integeratt','$currenttime','$icnumber')";
  mysqli_query($con, $attdata);

  $average_att = $average_att + $integeratt;
  }

//attendance average calculation
$final_average_att = $average_att/12;
$round_att = round($final_average_att);

//endhere

//course average calculation
$final_average_course = $average_course/4;
$round_course = round($final_average_course);
//endhere

//Status and average data insert
  $status = "INSERT INTO mdl_local_status (status,average_course,average_att,average_koko,timecreated,userid,icnumber)
  VALUES('belumproses','$round_course','$round_att','$pajskgrade','$currenttime',$USER->id,'$icnumber')";
  mysqli_query($con, $status);


  redirect('manage-filter-student.php');


}




// if (mysqli_query($con, $querys)) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $querys . "<br>" . mysqli_error($con);
//   }

// echo $name;



echo $OUTPUT->footer();
