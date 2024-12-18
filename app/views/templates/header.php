<?php
  // session_start();

  // if(isset($_SESSION['login'])){
  //   header("Location: ".BASEURL);
  //   exit;
  // }else{
  //   header("Location: ".BASEURL."/login");
  //   exit;
  // }
  // if(isset($_POST['submit'])){
  //   $email = $_POST['email'];
  //   $password = $_POST['password'];
  //   $user = $this->model('user_model')->getUserByEmail($email);

  //   if(mysqli_num_rows($user) ===1){
  //     if(password_verify($password, $user['password'])){
  //       $_SESSION['login'] = true;

  //       header("Location: " .BASEURL);
  //       exit;
  //     }
  //   }
  //   $error = true;
  // }
// ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link href="<?=BASEURL;?>/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  </head>
  <body>
   