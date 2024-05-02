<?php

$con =mysqli_connect("localhost","root","","deliadata");

$query = "SELECT distinct mdl_user.id ,mdl_user.email ,mdl_user.firstname,mdl_user.city, 
mdl_role_assignments.userid, mdl_role_assignments.roleid 
FROM mdl_user INNER JOIN mdl_role_assignments ON mdl_user.id = mdl_role_assignments.userid";
$result = mysqli_query($con,$query);



//total student query
$totalstudent = mysqli_query($con,"SELECT COUNT(DISTINCT userid) AS 'total' FROM mdl_role_assignments WHERE roleid = 5");
$data=mysqli_fetch_assoc($totalstudent);

//total course
$totalcourse = mysqli_query($con,"SELECT COUNT(*) AS 'allcourse' FROM mdl_course WHERE category != 0");
$allcourse=mysqli_fetch_assoc($totalcourse);

?>