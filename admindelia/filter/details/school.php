<?php
   if ( mysqli_num_rows ( $att ) >= 1 ){

     while ($rowatt = $att->fetch_assoc()) {

   ?>
<div class="form-group row">
    <label for="january" class="col-sm-2 col-form-label"><?php echo $rowatt['months'];?></label>
    <div class="col-md-1">
      <input type="text" class="form-control" id="january" value="<?php echo $rowatt['average'];?>" disabled>
    </div>
     </div>
  <?php
     }}else{
      echo  "<p class='lead'>Not Available</p>";
     }
?>  