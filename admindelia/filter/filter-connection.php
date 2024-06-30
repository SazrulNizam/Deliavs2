<?php
require_once("../../config.php");
global $CFG, $DB, $USER, $OUTPUT;


// Instantiate the myform form from within the plugin.
echo $OUTPUT->header();
$con =mysqli_connect("localhost","root","","deliadata");


//Query for Stage 1 filter by attadance must be more than 70% by average
$query = "SELECT mdl_local_status.id
FROM mdl_local_status JOIN mdl_local_personal_information ON mdl_local_status.icnumber = mdl_local_personal_information.ic_number
WHERE mdl_local_status.status = 'belumproses' AND mdl_local_status.userid = $USER->id AND mdl_local_status.average_att >= 70";
$result = mysqli_query($con,$query);

while ($stage1 = $result->fetch_assoc()) {

  $sql =  mysqli_query($con,"UPDATE mdl_local_status set stage1= 'lepas' WHERE id ='". $stage1['id']."'");

}
//end here

//Query for Stage 2 only 6 students with highest score will pass
$query2 = "SELECT mdl_local_status.id
FROM mdl_local_status JOIN mdl_local_personal_information ON mdl_local_status.icnumber = mdl_local_personal_information.ic_number
WHERE mdl_local_status.stage1 = 'lepas' AND mdl_local_status.userid = $USER->id ORDER BY mdl_local_status.average_koko DESC  ";
$result2 = mysqli_query($con,$query2);

$i=0;
while ($stage2 = $result2->fetch_assoc()) {

  $sql2 =  mysqli_query($con,"UPDATE mdl_local_status set stage2= 'lepas' WHERE id ='". $stage2['id']."'");

  
  $i=$i+1;
  if($i==6){
    break;
  }
}
//ENDHERE

// Query for stage 3 where data will student with medium average course only and this will the final
$query3 = "SELECT mdl_local_status.id
FROM mdl_local_status JOIN mdl_local_personal_information ON mdl_local_status.icnumber = mdl_local_personal_information.ic_number
WHERE mdl_local_status.stage2 = 'lepas' AND mdl_local_status.userid = $USER->id ORDER BY mdl_local_status.average_course DESC";
$result3 = mysqli_query($con,$query3);

$k = 0;

while ($stage3 = $result3->fetch_assoc()) {

  $k = $k+1;

  if($k == 2 || $k == 3 || $k == 4 || $k == 5 ){

    $sql3 =  mysqli_query($con,"UPDATE mdl_local_status set stage3= 'lepas', status = 'diterima' WHERE id ='". $stage3['id']."'");

  }

}

//ENDHERE

//Rejected Student
$rejectquery = "SELECT mdl_local_status.id
FROM mdl_local_status JOIN mdl_local_personal_information ON mdl_local_status.icnumber = mdl_local_personal_information.ic_number
WHERE mdl_local_status.stage3 IS NULL AND mdl_local_status.userid = $USER->id ";
$rejectresult = mysqli_query($con,$rejectquery);

while ($reject = $rejectresult->fetch_assoc()) {

  $sqlreject =  mysqli_query($con,"UPDATE mdl_local_status set status= 'ditolak' WHERE id ='". $reject['id']."'");

}
//ENDHERE

$_SESSION['message'] = 'succes';
redirect('manage-filter-student.php');


echo $OUTPUT->footer();
