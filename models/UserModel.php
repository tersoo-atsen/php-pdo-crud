<?php
class UserModel
{
  static public function login($data)
  {
    $email = $data['email'];
    try {
      $stmt = DB::connect()->prepare('SELECT * FROM users WHERE email=:email');
      $stmt->bindParam('email', $email);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_OBJ);
      $stmt = null;
      return $user;
    } catch (PDOException $ex) {
      echo 'error' . $ex->getMessage();
    }
  }

  static public function register($data)
  {
    $stmt = DB::connect()->prepare('INSERT INTO users (fname,lname,dob,email,phone,password)
			VALUES (:fname,:lname,:dob,:email,:phone,:password)');
    $stmt->bindParam(':fname', $data['fname']);
    $stmt->bindParam(':lname', $data['lname']);
    $stmt->bindParam(':dob', $data['dob']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->bindParam(':password', $data['password']);

    $response = $stmt->execute() ? 'ok' : 'error';
    $stmt = null;
    return $response;
  }

  static public function getUser($data)
  {
    $id = $data['id'];
    try {
      $stmt = DB::connect()->prepare('SELECT * FROM users WHERE id=:id');
      $stmt->execute(array(':id' => $id));
      $User = $stmt->fetch(PDO::FETCH_OBJ);
      $stmt = null;
      return $User;
    } catch (PDOException $ex) {
      echo 'error' . $ex->getMessage();
    }
  }

  static public function updateUser($data)
  {
    $stmt = DB::connect()->prepare('UPDATE users SET fname=:fname,lname=:lname,dob=:dob,email=:email,phone=:phone WHERE id=:id');
    $stmt->bindParam(':id', $data['id']);
    $stmt->bindParam(':fname', $data['fname']);
    $stmt->bindParam(':lname', $data['lname']);
    $stmt->bindParam(':dob', $data['dob']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':phone', $data['phone']);
    $response =  $stmt->execute() ? 'ok' : 'error';
    $stmt = null;
    return $response;
  }

  static public function deleteUser($data)
  {
    $id = $data['id'];
    try {
      $stmt = DB::connect()->prepare('DELETE FROM users WHERE id=:id');
      $result = $stmt->execute(array('id' => $id));
      $stmt = null;
      if ($result) {
        return 'ok';
      }
    } catch (PDOException $ex) {
      echo 'error' . $ex->getMessage();
    }
  }
}
