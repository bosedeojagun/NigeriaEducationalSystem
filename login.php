<?php 
    // start session
    session_start();
    
    include_once("frontheader.php");

    // check if the user click on login button
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // include class file
        include_once("common/schoolacad.php");

        // create object of user's class
        $schooacadlobj = new School();


        $output = $schooacadlobj->login($_POST['email'], $_POST['password']);

        // echo "<pre>";
        // print_r($output);
        // echo "</pre>";
        
        if($output==true){
            echo "<div class='alert alert-danger'>Your login details is not correct please check and try again</div>";
        }else{
          header("location:signup.php");
          exit();
        }
    }
?>

<!-- Page heading -->
<h1 class="mt-4 mb-3 text-center">
  <small>Login</small>
</h1>

<?php 
    if(isset($error)){
        echo ($error);
    }


    if (isset($_GET['m'])) {
        echo "<div class='alert alert-danger'>".$_GET['m']."</div>";
?>
    <script type="text/javascript">
        alert('<?php echo $_GET['m'] ?>');
    </script>
<?php
    }
?>
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<nav id="navbar" class="navbar" style="background-color: darkgray;">
       <ul>
        	<li><a href="new.php">NEDS</a></li>
        	<li><a href="about.php">About</a></li>
          	<li><a href="registration.php">Registration</a></li>
          	<li><a href="login.php">Login</a></li>
          	<li><a href="signup.php">Sign up</a></li>
      </ul>
    </nav>
	<div class="container">
		<div class="row">
			<div col-md-6>
			<!--	<h2 style="color: brown">Login</h2> -->
		
				<form method="post" action="">
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" name="email" class="form-control" id="email">
					</div>

					<div class="mb-3">
						<label for="password" id="pwd" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" id="pwd">
					</div>

				<button type="submit" id='btnlogin' class="btn btn-success">Login</button>
				
				</form>
			</div>
		</div>
	</div>
<?php 
    include_once("frontfooter.php");
?>