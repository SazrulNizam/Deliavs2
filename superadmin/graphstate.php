<?php
$con =mysqli_connect("localhost","root","","deliadata");

$currentyear = date("Y");
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

//Johor
$johor = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $Januaryjohor = date("Y-m", $rows["timecreated"]);

 if ($Januaryjohor == $currentyear."-01"){

   $johor++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $Januarykedah = date("Y-m", $rows["timecreated"]);

      if ($Januarykedah == $currentyear."-01"){
      
       $kedah++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $Januarykelantan = date("Y-m", $rows["timecreated"]);

      if ($Januarykelantan == $currentyear."-01"){
      
        $kelantan++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $January = date("Y-m", $rows["timecreated"]);

    if ($January == $currentyear."-01"){
    
      $melaka++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $sembilan++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $pahang++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $penang++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $perak++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $perlis++;
          }   }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $sabah++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $sarawak++;
          }  
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

    $Januaryselangor = date("Y-m", $rows["timecreated"]);

    if ($Januaryselangor == $currentyear."-01"){

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
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $January = date("Y-m", $rows["timecreated"]);

      if ($January == $currentyear."-01"){
      
        $terengganu++;
          }

          }
}

//February Chart

//Johor
$johor2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $Februaryjohor = date("Y-m", $rows["timecreated"]);

 if ($Februaryjohor == $currentyear."-02"){

   $johor2++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $Februarykedah = date("Y-m", $rows["timecreated"]);

      if ($Februarykedah == $currentyear."-02"){
      
       $kedah2++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $Februarykelantan = date("Y-m", $rows["timecreated"]);

      if ($Februarykelantan == $currentyear."-02"){
      
        $kelantan2++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $February = date("Y-m", $rows["timecreated"]);

    if ($February == $currentyear."-02"){
    
      $melaka2++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $sembilan2++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $pahang2++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $penang2++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $perak2++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $perlis2++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $sabah2++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $sarawak2++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $Februaryselangor = date("Y-m", $rows["timecreated"]);

    if ($Februaryselangor == $currentyear."-02"){

      $selangor2++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu2 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $February = date("Y-m", $rows["timecreated"]);

      if ($February == $currentyear."-02"){
      
        $terengganu2++;
          }  
          }
}

//March Chart

//Johor
$johor3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

 if ($March == $currentyear."-03"){

   $johor3++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
       $kedah3++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $kelantan3++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $March = date("Y-m", $rows["timecreated"]);

    if ($March == $currentyear."-03"){
    
      $melaka3++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $sembilan3++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $pahang3++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $penang3++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $perak3++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $perlis3++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $sabah3++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $sarawak3++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $Marchselangor = date("Y-m", $rows["timecreated"]);

    if ($Marchselangor == $currentyear."-03"){

      $selangor3++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu3 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $March = date("Y-m", $rows["timecreated"]);

      if ($March == $currentyear."-03"){
      
        $terengganu3++;
          }  
          }
}

//April Chart

//Johor
$johor4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

 if ($April == $currentyear."-04"){

   $johor4++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
       $kedah4++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $kelantan4++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $April = date("Y-m", $rows["timecreated"]);

    if ($April == $currentyear."-04"){
    
      $melaka4++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $sembilan4++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $pahang4++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $penang4++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $perak4++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $perlis4++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $sabah4++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $sarawak4++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $April = date("Y-m", $rows["timecreated"]);

    if ($April == $currentyear."-04"){

      $selangor4++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu4 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $April = date("Y-m", $rows["timecreated"]);

      if ($April == $currentyear."-04"){
      
        $terengganu4++;
          }  
          }
}

//May Chart

//Johor
$johor5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

 if ($May == $currentyear."-05"){

   $johor5++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
       $kedah5++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $kelantan5++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $May = date("Y-m", $rows["timecreated"]);

    if ($May == $currentyear."-05"){
    
      $melaka5++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $sembilan5++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $pahang5++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $penang5++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $perak5++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $perlis5++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $sabah5++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $sarawak5++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $May = date("Y-m", $rows["timecreated"]);

    if ($May == $currentyear."-05"){

      $selangor5++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu5 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $May = date("Y-m", $rows["timecreated"]);

      if ($May == $currentyear."-05"){
      
        $terengganu5++;
          }  
          }
}

//Jun Chart

//Johor
$johor6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

 if ($Jun == $currentyear."-06"){

   $johor6++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
       $kedah6++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $kelantan6++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $Jun = date("Y-m", $rows["timecreated"]);

    if ($Jun == $currentyear."-06"){
    
      $melaka6++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $sembilan6++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $pahang6++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $penang6++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $perak6++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $perlis6++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $sabah6++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $sarawak6++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $Jun = date("Y-m", $rows["timecreated"]);

    if ($Jun == $currentyear."-06"){

      $selangor6++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu6 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $Jun = date("Y-m", $rows["timecreated"]);

      if ($Jun == $currentyear."-06"){
      
        $terengganu6++;
          }  
          }
}

//July Chart

//Johor
$johor7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

 if ($July == $currentyear."-07"){

   $johor7++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
       $kedah7++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $kelantan7++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $July = date("Y-m", $rows["timecreated"]);

    if ($July == $currentyear."-07"){
    
      $melaka7++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $sembilan7++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $pahang7++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $penang7++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $perak7++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $perlis7++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $sabah7++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $sarawak7++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $July = date("Y-m", $rows["timecreated"]);

    if ($July == $currentyear."-07"){

      $selangor7++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu7 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $July = date("Y-m", $rows["timecreated"]);

      if ($July == $currentyear."-07"){
      
        $terengganu7++;
          }  
          }
}

//August Chart

//Johor
$johor8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

 if ($August == $currentyear."-08"){

   $johor8++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
       $kedah8++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $kelantan8++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $August = date("Y-m", $rows["timecreated"]);

    if ($August == $currentyear."-08"){
    
      $melaka8++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $sembilan8++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $pahang8++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $penang8++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $perak8++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $perlis8++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $sabah8++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $sarawak8++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $August = date("Y-m", $rows["timecreated"]);

    if ($August == $currentyear."-08"){

      $selangor8++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu8 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $August = date("Y-m", $rows["timecreated"]);

      if ($August == $currentyear."-08"){
      
        $terengganu8++;
          }  
          }
}

//September Chart

//Johor
$johor9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

 if ($September == $currentyear."-09"){

   $johor9++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
       $kedah9++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $kelantan9++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $September = date("Y-m", $rows["timecreated"]);

    if ($September == $currentyear."-09"){
    
      $melaka9++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $sembilan9++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $pahang9++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $penang9++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $perak9++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $perlis9++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $sabah9++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $sarawak9++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $September = date("Y-m", $rows["timecreated"]);

    if ($September == $currentyear."-09"){

      $selangor9++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu9 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $September = date("Y-m", $rows["timecreated"]);

      if ($September == $currentyear."-09"){
      
        $terengganu9++;
          }  
          }
}

//October Chart

//Johor
$johor10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

 if ($October == $currentyear."-10"){

   $johor10++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
       $kedah10++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $kelantan10++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $October = date("Y-m", $rows["timecreated"]);

    if ($October == $currentyear."-10"){
    
      $melaka10++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $sembilan10++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $pahang10++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $penang10++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $perak10++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $perlis10++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $sabah10++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $sarawak10++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $October = date("Y-m", $rows["timecreated"]);

    if ($October == $currentyear."-10"){

      $selangor10++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu10 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $October = date("Y-m", $rows["timecreated"]);

      if ($October == $currentyear."-10"){
      
        $terengganu10++;
          }  
          }
}

//November Chart

//Johor
$johor11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

 if ($November == $currentyear."-11"){

   $johor11++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
       $kedah11++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $kelantan11++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $November = date("Y-m", $rows["timecreated"]);

    if ($November == $currentyear."-11"){
    
      $melaka11++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $sembilan11++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $pahang11++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $penang11++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $perak11++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $perlis11++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $sabah11++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $sarawak11++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $November = date("Y-m", $rows["timecreated"]);

    if ($November == $currentyear."-11"){

      $selangor11++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu11 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $November = date("Y-m", $rows["timecreated"]);

      if ($November == $currentyear."-11"){
      
        $terengganu11++;
          }  
          }
}

//December Chart

//Johor
$johor12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $statejohor = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Johor' ";
    $Johor = mysqli_query($con,$statejohor);
  
    while ($rows = $Johor->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

 if ($December == $currentyear."-12"){

   $johor12++;
  } 
    }  
}

//Kedah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kedah12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kedah' ";
    $Kedah = mysqli_query($con,$state1);
  
    while ($rows = $Kedah->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
       $kedah12++;
      } 
  } 
}

//Kelantan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$kelantan12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Kelantan' ";
    $Kelantan = mysqli_query($con,$state1);
  
    while ($rows = $Kelantan->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $kelantan12++;
      } 
  }
}

//Melaka
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$melaka12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Melaka' ";
    $Melaka = mysqli_query($con,$state1);
  
    while ($rows = $Melaka->fetch_assoc()){

      
    $December = date("Y-m", $rows["timecreated"]);

    if ($December == $currentyear."-12"){
    
      $melaka12++;
        } 
    
  }

}

//Sembilan
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sembilan12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='N.Sembilan' ";
    $Sembilan = mysqli_query($con,$state1);
  
    while ($rows = $Sembilan->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $sembilan12++;
          } 
  }
}

//Pahang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$pahang12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Pahang' ";
    $Pahang = mysqli_query($con,$state1);
  
    while ($rows = $Pahang->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $pahang12++;
          } 
  }
}

//Penang
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$penang12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Penang' ";
    $Penang = mysqli_query($con,$state1);
  
    while ($rows = $Penang->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $penang12++;
          } 
  }
}

//Perak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);

$perak12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perak' ";
    $Perak = mysqli_query($con,$state1);
  
    while ($rows = $Perak->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $perak12++;
          } 
  }
}

//Perlis
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$perlis12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Perlis' ";
    $Perlis = mysqli_query($con,$state1);
  
    while ($rows = $Perlis->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $perlis12++;
          }   
        }
}

//Sabah
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sabah12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sabah' ";
    $Sabah = mysqli_query($con,$state1);
  
    while ($rows = $Sabah->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $sabah12++;
          }  
         }
}

//Sarawak
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$sarawak12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Sarawak' ";
    $Sarawak = mysqli_query($con,$state1);
  
    while ($rows = $Sarawak->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $sarawak12++;
          }  
          }
}

//Selangor
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$selangor12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
     WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Selangor' ";
    $Selangor = mysqli_query($con,$state1);
  
    while ($rows = $Selangor->fetch_assoc()){

    $December = date("Y-m", $rows["timecreated"]);

    if ($December == $currentyear."-12"){

      $selangor12++;
    }
  }
}

//Terengganu
$datastate1 = "SELECT * FROM mdl_user_info_data WHERE data='Student' ";
$state = mysqli_query($con,$datastate1);
$terengganu12 = 0;
while ($row = $state->fetch_assoc()) {

    $id = $row['userid'];
    $state1 = "SELECT * FROM mdl_user_info_data INNER JOIN mdl_user ON  mdl_user_info_data.userid = mdl_user.id
    WHERE mdl_user_info_data.userid = $id AND mdl_user_info_data.data='Terengganu' ";
    $Terengganu = mysqli_query($con,$state1);
  
    while ($rows = $Terengganu->fetch_assoc()){

      $December = date("Y-m", $rows["timecreated"]);

      if ($December == $currentyear."-12"){
      
        $terengganu12++;
          }  
          }
}
?>





