<?php
  $title = "Edit Record";
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';

  //Get all specialties
  $results = $crud->getSpecialties();

  if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
  }
  else{
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

?>

<h1 class='text-center'> <?php echo $title ?> </h1>

<form method="post" action="editpost.php">
  <input type="hidden" name="id" value=<?php echo $attendee['attendee_id'] ?> >
  <div class="mb-3">
    <label for="firstName" class="form-label">First Name</label>
    <input required type="text" id="firstName" value=<?php echo $attendee['firstname'] ?> class="form-control" name="firstName">
  </div>
  <div class="mb-3">
    <label for="lastName" class="form-label">Last Name</label>
    <input required type="text" id="lastName" value=<?php echo $attendee['lastname'] ?> class="form-control" name="lastName">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="text" id="dob" value=<?php echo $attendee['dateofbirth'] ?> class="form-control" name="dob">
  </div>
  <div class="mb-3">
    <label for="specialty" class="form-label">Area of specialty</label>
    <select id='specialty' class="form-select" name='specialty'>
      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
        <option value=<?php echo $r['specialty_id'] ?> <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?> >
          <?php echo $r['name'] ?>
        </option>
      <?php }; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" value=<?php echo $attendee['emailadress'] ?> id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact number</label>
    <input required type="text" class="form-control" id="phone" value=<?php echo $attendee['contactnumber'] ?> aria-describedby="phoneHelp" name="phone">
    <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
  </div>
  <div class="d-grid gap-2">
    <button type="submit" name="submit" class="btn btn-success btn-block">Save changes</button>
  </div>
</form>

<?php } ?>

<?php require_once 'includes/footer.php' ?>