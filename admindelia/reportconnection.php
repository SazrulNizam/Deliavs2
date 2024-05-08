<?php


$state = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 1");
$dstate= mysqli_fetch_assoc($state);


$phase = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 2");
$nphase= mysqli_fetch_assoc($phase);

$nadi = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 3");
$nnadi= mysqli_fetch_assoc($nadi);

$email = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 4");
$nemail= mysqli_fetch_assoc($email);

$name = mysqli_query($con,"SELECT * FROM mdl_user WHERE id = $datauserid");
$uname= mysqli_fetch_assoc($name);

$ic = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 7");
$icnumber= mysqli_fetch_assoc($ic);

$useremail = mysqli_query($con,"SELECT * FROM mdl_user WHERE id = $datauserid");
$uemail= mysqli_fetch_assoc($useremail);

$age = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 8");
$uage= mysqli_fetch_assoc($age);

$phonenum = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 12");
$pnum= mysqli_fetch_assoc($phonenum);

$parentsname = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 9");
$pname= mysqli_fetch_assoc($parentsname);

$parentsemail = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 11");
$pemail= mysqli_fetch_assoc($parentsemail);

$parentsnumber = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE userid = $datauserid AND fieldid = 10");
$ppnum= mysqli_fetch_assoc($parentsnumber);
?>