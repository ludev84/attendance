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

    // Handling profile picture uploaded in index.php (if it wasn't uploaded, set value as null)
    $destination = null;
    if($_FILES["avatar"]["name"]){
      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = $target_dir . $contact . '.' . $ext;
      move_uploaded_file($orig_file, $destination);
    }
    
    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty_id, $destination);

    if($isSuccess){
      include 'includes/successmessage.php';
    } else {
      include 'includes/errormessage.php';
    }
  }

  //Get specialty name by id
  $result = $crud->getSpecialtyDetails($specialty_id)
?>

<img src="<?php echo empty($destination) ? 'uploads/blank.png' : $destination ?>" alt="User profile picture">

<br>
<br>

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
