<div class="container mb-5">

<h1>Aplication Form</h1>

<form id="applicant-form" method="POST" action="<?php echo admin_url('admin-ajax.php');?>">
<div class="row mb-3">
    <label for="inputFullName" class="col-sm-2 col-form-label">Full name</label>
    <div class="col-sm-10">
    <input type="text" name="fname" class="form-control" id="inputFullName">
    </div>
</div>
<div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
</div>
<div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
    <input type="password" name="pass" class="form-control" id="inputPassword3">
    </div>
</div>
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
    <div class="col-sm-10">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
        <label class="form-check-label" for="gridRadios1">
        Male
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="FeMale">
        <label class="form-check-label" for="gridRadios2">
        FeMale
        </label>
    </div>
    <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Other" disabled>
        <label class="form-check-label" for="gridRadios3">
        Other
        </label>
    </div>
    </div>
    <input class="mt-3 ml-3" type="file" name="avatar">
</fieldset>
<div class="row mb-3">
    <div class="col-sm-10">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
        Agree with policies
        </label>
    </div>
    </div>
</div>
<input type="hidden" name="action" value="create_applicant">
<button type="submit" class="btn btn-primary">Submit1</button>
</form>

</div>