<?php include('mysqli_connect_Register.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		form {border: 3px solid #f1f1f1; transform: translate(0%,5%); border-radius: 15px 15px 15px 15px;}

		input[type=text], input[type=password], input[type=email] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}

		button {
		  background-color: #4CAF50;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		}

		button:hover {
		  opacity: 0.8;
		}

		.imgcontainer {
		  text-align: center;
		  margin: 24px 0 12px 0;
		}

		img.avatar {
		  width: 100%;
		  border-radius: 50%;
		}

		.container {
		  padding: 5px;
		}

		span.Signin {
		  float: right;
		  padding-top: 7px;
		  padding-bottom: 100px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
		  span.psw {
			 display: block;
			 float: none;
		  }
		  
		  span.email {
			 display: block;
			 float: none;
		  }
		}
		</style>
</head>
<body>


<form action="register.php" method="post">
<?php include('errors.php'); ?>
  <div class="register">
    <img src="images/avatar1.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" pattern="^[a-z0-9_-]{3,15}$" title="Three to fifteen lowercase letters, numbers, underscores or hyphens" name="username" value="<?php echo $username; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" required>
	
	<label for="psw"><b>Password</b></label>
    <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter and one number"  placeholder="Enter Password" name="password_1" required>
	
	<label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password Again" name="password_2" required>
        
    <button type="submit" class="btn" name="reg_user">Register</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="reset" class="clear">Clear</button>
    <span class="Signin">Already a member? &nbsp <a href="login.php"> Sign in</a></span>
  </div>
</form>

</body>
</html>

