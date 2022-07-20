<link rel="stylesheet" href="./public/css/account.css" type="text/css">
    <div class="login-box">
      <h1>Login</h1>
      <form action='./login'class="login" method="POST">
        <label>Username</label>
        <input type="text" placeholder="" name="username" />
        <label>Password</label>
        <input type="password" placeholder="" name="password" />
        <input type="button" value="Log in" />
      </form>
    </div>
    <p class="para-2">
        <a href="forget_password.html">Forget password?</a> <br>
      Not have an account? <a href="signup.html">Sign Up Here</a>
    </p>



    <?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: /home/view.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user.user WHERE account_name='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: /home/view.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>


}

