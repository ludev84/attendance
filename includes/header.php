<?php
  // This includes the session file. This file contains code that starts/resume a session.
  // By having it in the header, it will be included on every page, allowing session capability to be used on every page across the website.
  include 'includes/session.php'
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- <link rel="stylesheet" href="css/site.css"> -->

    <title> Attendance - <?php echo $title ?> </title>
  </head>
  <body>
    <!-- Navbar Bootstrap 5 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="./">IT Conference</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewrecords.php">View attendees</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <?php if(!isset($_SESSION['userid'])){ ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
            <?php } else{ ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"> Hello <?php echo $_SESSION['username'] ?>! </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
              </li>
            <?php } ?>
                
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main container of each page -->
    <div class="container mt-3 mb-3">