<div class="form-row">
<div class="form-group col-md-4 ">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" name="name" class="form-control" id="formGroupExampleInput" >
  </div>
  <div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">IC Number</label>
    <input type="text" class="form-control" name="icnumber" id="formGroupExampleInput" onkeypress="return isNumber(event)" onpaste="return false;" required>
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="text" class="form-control" name="pnumber" id="formGroupExampleInput" onkeypress="return isNumber(event)" onpaste="return false;" >
  </div>
  <div class="form-group col-md-6 ">
    <label for="formGroupExampleInput">School Name</label>
    <input type="text" class="form-control" name="schoolname" id="formGroupExampleInput" >
  </div>
</div>

<div class="form-row">
<div class="form-group col-md-3 ">
    <label for="formGroupExampleInput">Birth Date</label>
    <input type="date" name="bdate" class="form-control" id="formGroupExampleInput" >
  </div>
  <div class="form-group col-md-2">
      <label for="inputState">Gender</label>
      <select name="gender" id="inputState" class="form-control">
        <option selected hidden>Choose...</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Race</label>
      <select name="race" id="inputState" class="form-control">
        <option selected hidden>Choose...</option>
        <option value="Malay">Malay</option>
        <option value="India">India</option>
        <option value="Cina">Cina</option>
        <option value="Other">Other</option>

      </select>
    </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">State</label>
      <select name="state" id="inputState" class="form-control">
        <option selected hidden>Choose...</option>
        <option value="Johor">Johor</option>
        <option value="Kedah">Kedah</option>
        <option value="Kelantan">Kelantan</option>
        <option value="Melaka">Melaka</option>
        <option value="N.Sembilan">N.Sembilan</option>
        <option value="Pahang">Pahang</option>
        <option value="Penang">Penang</option>
        <option value="Perak">Perak</option>
        <option value="Perlis">Perlis</option>
        <option value="Sabah">Sabah</option>
        <option value="Sarawak">Sarawak</option>
        <option value="Selangor">Selangor</option>
        <option value="Terengganu">Terengganu</option>

      </select>    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Nadi</label>
      <select name="nadi" id="inputState" class="form-control">
        <option selected hidden>Choose...</option>
        <option>...</option>
      </select>    </div>
  </div>
  
<div class="form-row">
<div class="form-group col-md-4 ">
<label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

</div>