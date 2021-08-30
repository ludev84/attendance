<?php
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  if(!$_GET['id']){
    include 'includes/errormessage.php';
    // sleep(5);
    // header('Location: viewrecords.php');
  }
  else{
    // Get id value
    $id = $_GET['id'];

    // Call delete function
    $result = $crud->deleteAttendee($id);
    // Redirect to list

    if($result){
      header('Location: viewrecords.php');
    }
    else{
      include 'includes/errormessage.php';
    }
    
  }