<div class="form-row">
<div class="form-group col-md-4 ">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $data_personal['name'];?>" id="formGroupExampleInput" disabled >
  </div>
  <div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">IC Number</label>
    <input type="text" class="form-control" name="icnumber" value="<?php echo $data_personal['ic_number'];?>" id="formGroupExampleInput" onkeypress="return isNumber(event)" onpaste="return false;" disabled>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="text" class="form-control" value="<?php echo $data_personal['mobile'];?>" name="pnumber" id="formGroupExampleInput" onkeypress="return isNumber(event)" onpaste="return false;" disabled >
  </div>
  <div class="form-group col-md-6 ">
    <label for="formGroupExampleInput">School Name</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" value="<?php echo $data_personal['school_name'];?>" disabled>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Birth Date</label>
    <input type="text" name="bdate" class="form-control" id="formGroupExampleInput" value="<?php echo $data_personal['birth_date'];?>" disabled >
  </div>
  <div class="form-group col-md-2">
      <label for="inputState">Gender</label>
      <input type="text" name="bdate" class="form-control" id="formGroupExampleInput" value="<?php echo $data_personal['gender'];?>" disabled >

    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Race</label>
      <input type="text" name="bdate" class="form-control" id="formGroupExampleInput" value="<?php echo $data_personal['race'];?>" disabled >

    </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">State</label>
      <input type="text" name="bdate" class="form-control" id="formGroupExampleInput" value="<?php echo $data_personal['state'];?>" disabled >
      </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Nadi</label>
      <input type="text" name="bdate" class="form-control" id="formGroupExampleInput" value="<?php echo $data_personal['nadi'];?>" disabled >
      </div>
  </div>
  
<div class="form-row">
<div class="form-group col-md-4 ">
<label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $data_personal['email'];?>" disabled aria-describedby="emailHelp">
  </div>

</div>