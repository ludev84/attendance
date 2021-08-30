<?php
  $title = "View Record";
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';

  //Get attendee by id
  if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
  }
  else{
    $id = $_GET['id'];
    $result = $crud->getAttendeeDetails($id);
    
  
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">
      <?php echo $result['firstname'] . " " . $result['lastname']; ?>
    </h5>
    <h6 class="card-subtitle mb-2 text-muted">
      Specialty: <?php echo $result['name'] ?>
    </h6>
    <p class="card-text">
      Date of Birth: <?php echo $result['dateofbirth']; ?>
    </p>
    <p class="card-text">
      Email: <?php echo $result['emailadress']; ?>
    </p>
    <p class="card-text">
      Phone Number: <?php echo $result['contactnumber']; ?>
    </p>
  </div>
</div>

<br>

<a href="viewrecords.php"><button class="btn btn-info">Back to list</button></a>
<a href="edit.php?id=<?php echo $result['attendee_id']; ?>"><button class="btn btn-warning">Edit</button></a>
<a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $result['attendee_id']; ?>"><button class="btn btn-danger">Delete</button></a>

<?php }; ?>

<?php require_once 'includes/footer.php'; ?>