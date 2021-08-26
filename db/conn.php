<?php
  $host = "localhost";
  $db = "attendance_db";
  $user = "root";
  $password = "";
  $charset = "utf8mb4";

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try{
    $PDO = new PDO($dsn, $user, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    // echo "<h1 class='text-danger'>No database found!</h1>";
    throw new PDOException($e->getMessage());
  }

  require_once 'crud.php';
  $crud = new crud($PDO);
?>
