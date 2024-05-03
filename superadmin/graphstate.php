<?php
$con =mysqli_connect("localhost","root","","deliadata");


$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

//Johor
$johor = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

    $johor++;
  }
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

    $kedah++;
  }
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

    $kelantan++;
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

    $melaka++;
  }
}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

    $sembilan++;
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

    $pahang++;
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

    $penang++;
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

    $perak++;
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

    $perlis++;
  }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

    $sabah++;
  }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

    $sarawak++;
  }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $January = date("m", $rows["timecreated"]);

    if ($Januaryselangor == 01){

      $selangor++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data WHERE userid = $id AND data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

    $terengganu++;
  }
}

//February Chart
?>





