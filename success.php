<?php
  $title = "Success";
  require 'includes/header.php';
  require 'db/conn.php';

  if(isset($_POST['submit'])){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty_id = $_POST['specialty'];

    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty_id);

    if($isSuccess){
      include 'includes/successmessage.php';
    } else {
      include 'includes/errormessage.php';
    }
  }

  //Get specialty name by id
  $result = $crud->getSpecialtyDetails($specialty_id)
?>



<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
      <?php echo $_POST['firstName'] . " " . $_POST['lastName']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      Specialty: <?php echo $result['name'] ?>
    </h6>
    <p class="card-text">
      Date of Birth: <?php echo $_POST['dob']; ?>
    </p>
    <p class="card-text">
      Email: <?php echo $_POST['email']; ?>
    </p>
    <p class="card-text">
      Phone Number: <?php echo $_POST['phone']; ?>
    </p>
  </div>
</div>

<?php require 'includes/footer.php' ?>
