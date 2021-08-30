<?php

  // Local mode
  // $host = "localhost";
  // $db = "attendance_db";
  // $user = "root";
  // $password = "";
  // $charset = "utf8mb4";

  //Remote mode
  $host = "remotemysql.com";
  $db = "MVPtbayhSj";
  $user = "MVPtbayhSj";
  $password = "nIPm4xADvv";
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
  require_once 'user.php';
  $crud = new crud($PDO);
  $user = new user($PDO);

  $user->insertUser("admin", "password");
?>
