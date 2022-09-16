<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>
	<nav id="navbar" class="navbar" style="background-color: darkgray;">
        <ul>
        	<li><a href="new.php">NEDS</a></li>
        	<li><a href="about.php">About</a></li>
          	<li><a href="registration.php">Registration</a></li>
          	<li><a href="login.php">Login</a></li>
          	<li><a href="signup.php">Sign up</a></li>
      </ul>
    </nav>
      <br>
      <div class="col-md-5">
				<h2 style="color: skyblue">School Admin Signup </h2>
				
				<form method="post" action="insertschadmin.php">
					<div class="mb-3">
						<label for="firstname">Firstname</label>
						<input type="text" name="firstname" id="firstname" class="form-control" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>">
					</div>
					<div class="mb-3">
						<label for="lastname">lastname</label>
						<input type="text" name="lastname" id="lastname" class="form-control" >
					</div>
					<div class="mb-3">
						<label for="email">Email Address</label>
						<input type="email" name="email" id="email" class="form-control">
					</div>
					<div class="mb-3">
						<label for="address">Address</label>
						<input type="address" name="address" id="address" class="form-control">
					</div>
					<div class="mb-3">
						<label for="phone">Phone Number</label>
						<input type="text" name="phone" id="phone" class="form-control">
					</div>
					<div class="mb-3">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<button type="submit" name="btnregister" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>