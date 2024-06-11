<?php

$con =mysqli_connect("localhost","root","","deliadata");

//student
$query = "SELECT *
FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid WHERE data='Student'";
$result = mysqli_query($con,$query);

//course


$querysthis = "SELECT * FROM mdl_course WHERE category !=0";
$resultsthis = mysqli_query($con,$querysthis);



// $studentcourse = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user_enrolments ON mdl_user_info_data.userid
// = mdl_user_enrolments.userid INNER JOIN mdl_enrol ON mdl_user_enrolments.enrolid = mdl_enrol.id WHERE mdl_user_info_data.data='Student' ";
// $stcourse = mysqli_query($con,$studentcourse);



//total student query
$totalstudent = mysqli_query($con,"SELECT COUNT(DISTINCT userid) AS 'total' FROM mdl_user_info_data WHERE fieldid = 6 AND data='Student'");
$data=mysqli_fetch_assoc($totalstudent);

//total course
$totalcourse = mysqli_query($con,"SELECT COUNT(*) AS 'allcourse' FROM mdl_course WHERE category != 0");
$allcourse=mysqli_fetch_assoc($totalcourse);


// //student
// $query = "SELECT distinct mdl_user.id ,mdl_user.email ,mdl_user.firstname,mdl_user.city, 
// mdl_role_assignments.userid, mdl_role_assignments.roleid, mdl_user.username 
// FROM mdl_user INNER JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid";
// $result = mysqli_query($con,$query);

//Report

$report = "SELECT *
FROM mdl_user INNER JOIN mdl_user_info_data ON mdl_user.id = mdl_user_info_data.userid";
$datareport = mysqli_query($con,$report);

$userinfo = "SELECT * FROM mdl_user_info_data";
$datauserinfo = mysqli_query($con,$userinfo);

// $enrol = "SELECT *
// FROM mdl_user_enrolments INNER JOIN mdl_enrol ON mdl_user_enrolments.enrolid = mdl_enrol.id INNER JOIN mdl_course ON mdl_enrol.courseid = mdl_course.id";
// $enrolreport = mysqli_query($con,$enrol);


//Student State Graph

// $datastate1 = mysqli_query($con,"SELECT * FROM mdl_user_info_data WHERE fieldid = 6 AND data='Student'");
// $state= mysqli_fetch_assoc($datastate1);

//Financial Report

$badgequery = "SELECT *
FROM mdl_badge JOIN mdl_badge_issued ON mdl_badge.id = mdl_badge_issued.badgeid 
JOIN mdl_user_info_data ON mdl_badge_issued.userid = mdl_user_info_data.userid 
AND mdl_user_info_data.data = 'Student'
JOIN mdl_user ON mdl_user_info_data.userid = mdl_user.id ";
$badge = mysqli_query($con,$badgequery);

$financial = "SELECT ka.id, ka.firstname, ka.lastname, c.fullname AS course_name, nadi.data AS nadi_name
FROM mdl_user ka
JOIN mdl_user_enrolments ra ON ka.id = ra.userid
JOIN mdl_enrol en ON ra.enrolid = en.id
JOIN mdl_course c ON en.courseid = c.id
JOIN mdl_user_info_data role ON ka.id = role.userid AND role.fieldid = 6 AND role.data = 'Student'
LEFT JOIN mdl_user_info_data nadi ON ka.id = nadi.userid AND nadi.fieldid = 14";
$financialdata = mysqli_query($con,$financial);

