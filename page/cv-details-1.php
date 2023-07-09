<div class="container my-3">
  <h2 class="my-3">Enter Your Details</h2>
<form method="post" action="<?=$action->helper->url('action/createresume')?>" class="border border-2 p-2">
<div class="container row justify-content-between">
<p class="fs-4 fw-bold"><i class="bi bi-person-circle"></i> Personal Details</p>
  <div class="form-group col-6 mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5">Name</label>
    <div class="">
      <input type="text" class="form-control" id="" name="name" placeholder="Full Name" required>
    </div>
  </div>
  <div class="form-group col-6 mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5">Headline</label>
    <div class="">
      <input type="text" class="form-control" id="" name="headline" placeholder="Profession" required>
    </div>
  </div>
  </div>
  <div class="form-group  mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5">Objective</label>
    <div class="">
      <textarea class="w-100 container" name="objectives" style="border:1px solid lightgray;" placeholder="Tell us about you?" required></textarea>
    </div>
  </div>
  <hr>
  <p class="fs-4 fw-bold"><i class="bi bi-person-lines-fill"></i> Contact Details</p>
  <div class="container row justify-content-between">
  <div class="form-group col-6 mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5 " >Email</label>
    <div class="">
      <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="Email address" required>
    </div>
  </div>
  <div class="form-group col-6 mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5">Mobile</label>
    <div class="">
      <input type="text" class="form-control" id="inputEmail3" name="mobile" placeholder="Mobile number" required>
    </div>
  </div>
  </div>
  <div class="form-group mx-2 w-50 mb-3 container">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-5" >Location</label>
    <div class="">
      <input type="text" class="form-control" id="inputEmail3" name="address" placeholder="Current address" required>
    </div>
  </div>
  <hr>
  <div class="form-group  mb-3 container">
    <labe class="col-sm-2 col-form-label fs-4 fw-bold"><i class="bi bi-tools"></i> Skills</label>
    <div class="input-group my-3 gap-2">
  <input type="text" class="form-control" id="userSkill" placeholder="HTML" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-success"  id="addskill" type="button"> Add</button>
  </div>
  
</div>
<div id="skills" >
      <!-- Skills -->
    </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4 fw-bold"><i class="bi bi-book-half"></i> Education</label>
    <div class="d-flex gap-2">
      <input type="text" class="form-control" id="college" placeholder="Delhi University">
      <input type="text" class="form-control" id="course" placeholder="Bachelor in Computer Application">
      <input type="text" class="form-control" id="e_duration" placeholder="2020-2024">
      <button class="btn btn-success"  id="addEducatoion" type="button"> Add</button>
    </div>
    <div id="educations" class="my-2">
      <!-- Educations -->
    </div>
  </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4 fw-bold"><i class="bi bi-briefcase-fill"></i> Experience</label>
    <div class="d-flex gap-2 my-2">
      <input type="text" class="form-control" id="company" placeholder="facebook">
      <input type="text" class="form-control" id="jobrule" placeholder="Software Development Engineer">
      <input type="text" class="form-control" id="c_duration" placeholder="2020-2024">
    </div>
    
    <textarea class="w-100 container" id="work_desc" style="border:1px solid lightgray;" placeholder="Tell us about your Experience!"></textarea>
    <div>
    <button class="btn btn-success"  id="addexp" type="button"> Add</button>
    </div>
    <div id="exps" class="my-2">
      <!-- Experience -->
    </div>
  </div>
  <hr>
 
  <div class="form-group row text-center">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-warning" ><i class="bi bi-box-fill"></i> Create Resume</button>
    </div>
  </div>
</form>
</div>



