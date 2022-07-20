<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="account.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <h4>It's free and only takes a minute</h4>
      <form method="post" action="">
        <label for="username"> Username</label>
        <input id="username" name="username" type="text" required/>
        <label for="email">Email</label>
        <input id="email" name="email" type="email"  required/>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder=""  required/>
        <label for="cpassword" >Confirm Password</label>
        <input id="cpassword" name="cpassword" type="password" placeholder=""  required />
        <input type="button" value="Submit" />
      </form>
    </div>
    <p class="para-2">
      Already have an account? <a href="login.html">Login here</a>
    </p>
  </body>
</html>
