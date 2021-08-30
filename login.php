<?php
  $title = "Login";
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  // If data was submitted via a form POST request, then...
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    $new_password = md5($password.$username);

    $result = $user->getUser($username, $new_password);
    if(!$result){
      echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again.</div>';
    }
    else {
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $result['id'];
      header("Location: viewrecords.php");
    }
  }
?>

<h1 class='text-center'> <?php echo $title ?> </h1>

<!-- This form's action reloads this page and do the posting action on the same page -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
  <table class="table table-sm">
    <tr>
      <td><label for="username">Username: *</label></td>
      <td>
        <input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'] ?>">
        <!-- <?php //if(empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>" ?> -->
      </td>
    </tr>
    <tr>
      <td><label for="password">Password: *</label></td>
      <td>
        <input type="password" name="password" class="form-control" id="password">
        <!-- <?php //if(empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>" ?> -->
      </td>
    </tr>
  </table><br>
  <div class="d-grid gap-2">
    <input type="submit" value="Login" class="btn btn-primary btn-block">
  </div><br>
  <a href="#">Forgot Password</a>
</form>

<?php require_once 'includes/footer.php' ?>