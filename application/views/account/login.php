<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login </title>
    <link rel="stylesheet" href="account.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form action='login.php'class="login" method="POST">
        <label>Email</label>
        <input type="email" placeholder="" name="username" />
        <label>Password</label>
        <input type="password" placeholder="" name="password" />
        <input type="button" value="Log in" />
      </form>
    </div>
    <p class="para-2">
        <a href="forget_password.html">Forget password?</a> <br>
      Not have an account? <a href="signup.html">Sign Up Here</a>
    </p>
  </body>
</html>

<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['login'])) {
  include('logincontroller.php');
$username = $_POST['username'];
$password = $_POST['password'];

if (!$username || !$password) {
  echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
  exit;
}

$result = mysql_query($sql)

}

