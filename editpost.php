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

    // Call the CRUD function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty_id);

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