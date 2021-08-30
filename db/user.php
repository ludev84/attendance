<?php

class user {
  private $db;

  function __construct($conn){
    $this->db = $conn;
  }

  public function insertUser($username, $password){
    try {
      // Verificar que no exista un usuario con el mismo nombre llamando a la función getUserByUsername($username)
      $result = $this->getUserByUsername($username);
      if($result['num'] > 0){
        return false;
      }
      else{
        // Encriptación de la contraseña
        $new_password = md5($password.$username);
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->db->prepare($sql);
  
        $stmt->bindparam(':username', $username);
        $stmt->bindparam(':password', $new_password);
  
        $stmt->execute();
        return true;
      }

    }
    catch(PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function getUser($username, $password){
    try{
      $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':username', $username);
      $stmt->bindparam(':password', $password);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function getUserByUsername($username){
    try{
      $sql = "SELECT COUNT(*) as num FROM users WHERE username = :username";
      $stmt = $this->db->prepare($sql);
      $stmt->bindparam(':username', $username);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }




}

  