<?php
  require 'db/conn.php';
  // Get values from the $_POST operation
  if(isset($_POST['submit'])){
    // Extract values from the $_POST array
    $id = $_POST['id'];
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

    // Call the CRUD function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty_id, $destination);

    // Redirect to index.php
    if($result){
      header("Location: viewrecords.php");
    }
    else{
      include 'includes/errormessage.php';
    }
  }
  else{
    include 'includes/errormessage.php';
  }
?>