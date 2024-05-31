<?php

$con =mysqli_connect("localhost","root","","deliadata");

$query = "SELECT *
FROM mdl_local_videos WHERE category = 'podcast'";
$podcast = mysqli_query($con,$query);

$query1 = "SELECT *
FROM mdl_local_videos WHERE category = 'VOD'";
$vod = mysqli_query($con,$query1);

$query2 = "SELECT *
FROM mdl_local_videos WHERE category = 'recording'";
$recording = mysqli_query($con,$query2);

$query3 = "SELECT *
FROM mdl_local_videos WHERE category = 'notes'";
$notes = mysqli_query($con,$query3);

$video = "SELECT *
FROM mdl_local_videos";
$allvideo = mysqli_query($con,$video);

//count 
$all = mysqli_query($con,"SELECT COUNT(*) AS 'all' FROM mdl_local_videos");
$totalall=mysqli_fetch_assoc($all);

$total = mysqli_query($con,"SELECT COUNT(*) AS 'podcast' FROM mdl_local_videos WHERE category = 'podcast'");
$totalpodcast=mysqli_fetch_assoc($total);

$total2 = mysqli_query($con,"SELECT COUNT(*) AS 'vod' FROM mdl_local_videos WHERE category = 'VOD'");
$totalvod=mysqli_fetch_assoc($total2);

$total3 = mysqli_query($con,"SELECT COUNT(*) AS 'recording' FROM mdl_local_videos WHERE category = 'recording'");
$totalrecording=mysqli_fetch_assoc($total3);

$total4 = mysqli_query($con,"SELECT COUNT(*) AS 'notes' FROM mdl_local_videos WHERE category = 'notes'");
$totalnotes=mysqli_fetch_assoc($total4);

$videos = "SELECT *
FROM mdl_local_videos";
$allvideos = mysqli_query($con,$videos);
?>