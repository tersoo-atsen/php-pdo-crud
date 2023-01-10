<?php

class UsersController
{
  public function login()
  {
    if (isset($_POST['submit'])) {
      $email = stripcslashes(strip_tags($_POST['email']));
      $password = stripcslashes(strip_tags($_POST['password']));
      $data['email'] = $email;
      $result = UserModel::login($data);
    
      if ($result->email === $email && password_verify($password, $result->password)) {
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $result->email;
        $_SESSION['id'] = $result->id;
        Redirect::to('profile');
      } else {
        Session::set('error', 'Your credentials are incorrect');
        Redirect::to('login');
      }
    }
  }

  public function register()
  {
    if (isset($_POST['submit'])) {
      $fname = stripcslashes(strip_tags($_POST['fname']));
      $lname = stripcslashes(strip_tags($_POST['lname']));
      $email = stripcslashes(strip_tags($_POST['email']));
      $phone = stripcslashes(strip_tags($_POST['phone']));
      $dob = stripcslashes(strip_tags($_POST['dob']));
      $password = stripcslashes(strip_tags($_POST['password']));

      $data = array(
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'phone' => $phone,
        'dob' => $dob,
        'password' => password_hash($password, PASSWORD_BCRYPT)
      );

      $response = UserModel::register($data);

      if ($response === 'ok') {
        Session::set('success', 'Account created');
        Redirect::to('login');
      } else {
        echo $response;
      }
    }
  }

  public function getUser()
  {
    if (isset($_SESSION['id'] )) {
      $data = array(
        'id' => $_SESSION['id']
      );
      $user = UserModel::getUser($data);
      return $user;
    }
  }

  public function updateUser()
  {
    if (isset($_POST['submit'])) {
      $data = array(
        'id' => $_POST['id'],
        'fname' => stripcslashes(strip_tags($_POST['fname'])),
        'lname' => stripcslashes(strip_tags($_POST['lname'])),
        'email' => stripcslashes(strip_tags($_POST['email'])),
        'phone' => stripcslashes(strip_tags($_POST['phone'])),
        'dob' => stripcslashes(strip_tags($_POST['dob'])),
        'password' => stripcslashes(strip_tags($_POST['password'])),
      );
      $result = UserModel::updateUser($data);
      if ($result === 'ok') {
        Session::set('success', 'User details updated');
        Redirect::to('profile');
      } else {
        echo $result;
      }
    }
  }

  public function deleteUser()
  {
    if (isset($_POST['id'])) {
      $data['id'] = $_POST['id'];
      $result = UserModel::deleteUser($data);
      if ($result === 'ok') {
        Session::set('success', 'User deleted');
        Redirect::to('logout');
      } else {
        echo $result;
      }
    }
  }

  static public function logout()
  {
    session_destroy();
  }
}
