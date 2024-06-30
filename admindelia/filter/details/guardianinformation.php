<div class="form-row">
<div class="form-group col-md-4 ">
    <label for="formGroupExampleInput">Father Name</label>
    <input type="text" name="father_name" class="form-control" id="formGroupExampleInput" value="<?php echo $data_guardian['father_name'];?>" disabled >
  </div>
  <div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="text" class="form-control" name="father_number"id="formGroupExampleInput" value="<?php echo $data_guardian['father_number'];?>" disabled >
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-4 ">
    <label for="formGroupExampleInput">Mother Name</label>
    <input type="text" class="form-control" name="mother_name" id="formGroupExampleInput" value="<?php echo $data_guardian['mother_name'];?>" disabled>
  </div>
  <div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="text" class="form-control" name="mother_number" id="formGroupExampleInput" value="<?php echo $data_guardian['mother_number'];?>" disabled >
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Parent's Email</label>
    <input type="email" class="form-control" name="parent_email" id="formGroupExampleInput" value="<?php echo $data_guardian['parents_email'];?>" disabled >
  </div>
  <div class="form-group col-md-6">
    <label for="formGroupExampleInput">Address</label>
    <input type="text" class="form-control" name="address" id="formGroupExampleInput" value="<?php echo $data_guardian['address'];?>" disabled >
  </div>
</div>
<div class="form-row">

<div class="form-group col-md-3">

  <label for="formGroupExampleInput">Are You a Receiver of Government`s Aid?</label>
  <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" value="yes" name="receiver" class="custom-control-input" @if($data_guardian['receiver_aid'] == "yes") checked @endif disabled>
  <label class="custom-control-label" for="customRadioInline1" >Yes</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="receiver" value="no" class="custom-control-input" <?php if ( $data_guardian['receiver_aid'] == "no" ) echo "checked"; ?> disabled>
  <label class="custom-control-label" for="customRadioInline2">No</label>
</div>

</div>
<div class="form-group col-md-6">
    <label for="formGroupExampleInput">Types of Aid Received</label>
    <input type="text" class="form-control" name="type_of_aid" id="formGroupExampleInput" value="<?php echo $data_guardian['type_receiver'];?>" disabled >
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Total Dependants</label>
    <input type="text" class="form-control" name="total_depen" id="formGroupExampleInput" value="<?php echo $data_guardian['total_dependants'];?>" disabled >
  </div>
<div class="form-group col-md-2 ">
    <label for="formGroupExampleInput">Father's Income</label>
    <input type="text" class="form-control" name="father_income" id="formGroupExampleInput" value="<?php echo $data_guardian['father_income'];?>" disabled >
  </div>
  <div class="form-group col-md-2">
    <label for="formGroupExampleInput">Mother's Income</label>
    <input type="text" class="form-control" name="mother_income" id="formGroupExampleInput" value="<?php echo $data_guardian['mother_income'];?>" disabled >
  </div>
  <div class="form-group col-md-2">
    <label for="formGroupExampleInput">Total Income</label>
    <input type="text" class="form-control" name="total_income" id="formGroupExampleInput"  value="<?php echo $data_guardian['total_income'];?>" disabled>
  </div>
</div>

