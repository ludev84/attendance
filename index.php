<?php
  $title = "Home";
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  //Get all specialties
  $results = $crud->getSpecialties()
?>

<!-- 
  Create form:
    - First name
    - Last name
    - Date of birth (use datepicker)
    - Speciality (Database admin, software developer, web administrator, other)
    - Email adress
    - Contact number
-->

<h1 class='text-center'>Registrtion for IT Conference</h1>

<form method="post" enctype="multipart/form-data" action="success.php">
  <div class="mb-3">
    <label for="firstName" class="form-label">First Name</label>
    <input required type="text" id="firstName" class="form-control" name="firstName">
  </div>
  <div class="mb-3">
    <label for="lastName" class="form-label">Last Name</label>
    <input required type="text" id="lastName" class="form-control" name="lastName">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="text" id="dob" class="form-control" name="dob">
  </div>
  <div class="mb-3">
    <label for="specialty" class="form-label">Area of specialty</label>
    <select id='specialty' class="form-select" name='specialty'>
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
        <option value=<?php echo $r['specialty_id'] ?> > <?php echo $r['name'] ?> </option>
      <?php }; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact number</label>
    <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
    <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="avatar" class="form-label">Upload a picture (Optional)</label>
    <input type="file" class="form-control" accept="image/*" name="avatar" id="avatar">
    <div id="avatar" class="form-text">This step is optional.</div>
  </div>
  <!-- <div class="mb-3">
    <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
    <label class="custom-file-label" for="avatar">Upload Image (Optional)</label>
    <div id="avatar" class="form-text">The profile picture is optional.</div>
  </div> -->
  <div class="d-grid gap-2">
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
  </div>
</form>

<?php require_once 'includes/footer.php' ?>