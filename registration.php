<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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

      	
	<div class="container" id="con">
		<div class="row">
			<div class="col-md-6">
				<h2 style="color: skyblue">School Registration Form</h2>

				
				<form action="insertsch.php" method="post" class="form-control" border="none">
					<div class="mb-3">
						<label for="school_name" class="form-label">School_name</label>
						<input type="school_name" name="school_name" id="school_name"class="form-control"/>
					</div>
						<p id=form-prompt>School_type</p>
						<input type="radio" name="type" id="private" value="private">
						<label for="private">Private</label>
						<input type="radio" name="type" id="public" value="public">
						<label for="public">Public</label><br><br>
						<p id=form-prompt>School_section</p>
						<input type="radio" name="section" id="primary" value="primary">
						<label for="primary">Primary</label>
						<input type="radio" name="section" id="secondary" value="secondary">
						<label for="secondary">Secondary</label>
						<input type="radio" name="section" id="primary & secondary" value="primary & secondary">
						<label for="primary & secondary">Primary & Secondary</label>


<?php 
        include_once("common/zone.php");

        // create region object

        $obj = new Zone();

        // reference getStates method
        $states = $obj->getStates();

    ?>
		<section class="section">
			<div class="row">
				<div class="col-mb-3">
					<label class="form-label">State</label>
                        <select name="state" id="state" class="form-select" required>
					<option>Select state</option>
					<?php 
       
         // Loop through 
               if (count($states) > 0) {
                	foreach ($states as $key => $value) {
                $stateid = $value['state_id'];
                $statename = $value['state_name'];
    
                 echo "<option value='$stateid'>$statename</option>";
                    }
                }
     ?>      
		</select>	
				</div>
			</div>

			<div class="row">
			<div class="col-mb-3-6">
            <label class="form-label">LGA</label>
            <select name="lga" id="lga" class="form-select" disabled>
            <option value="">Select LGA</option>
            </select>
            </div> 
            </div>     
	<div class="mb-3">
						<label for="school_address" class="form-label">School_address</label>
						<input type="school_address" name="school_address" id="school_address" class="form-control"/>
					</div>

					<div class="mb-3">
						<label for="school_email" class="form-label">School_email</label>
						<input type="school_email" name="school_email" id="school_email" class="form-control"/>
					</div>

					<div class="mb-3">
						<label for="school_phoneno" class="form-label">School_phoneno</label>
						<input type="School_phoneno" name="school_phoneno" id="school_phoneno"class="form-control"/>
					</div>

					<div class="mb-3">
						<label for="school_password" class="form-label">School_password</label>
						<input type="password" name="school_password" id="school_password"class="form-control"/>
					</div>

					<div class="mb-3">
						<label for="school_description" class="form-label">School_description</label>
						<input type="school_description" name="school_description" id="school_description"class="form-control"/>
					</div>

					<div class="mb-3">
						<label for="total_student" class="form-label">Total_student</label>
						<input type="total_student" name="total_student" id="total_student"class="form-control"/>
					</div>

					<button type="submit" id='btnregister' class="btn btn-danger">Register</button>
				</form>
			</div>
		</div>
	</div>

 <script src="jquery/jquery.js" type="text/javascript"></script>
                                
    <script type="text/javascript" language="javascript">

        //  Get Local Government based on State Selected
        $(document).ready(function(){
            $("#state").change(function(){
                // get the State ID
                /*alert('a');*/
                var stateid =$(this).val();

                // To pick the text from Selected item
                var statename = $('#state option:selected').text();
                /*alert(statename);*/

                // fetch LGA using ajax method
                $.ajax({
                    url: "lga_ajax.php",
                    type: "GET",
                    data: {mystateid:stateid},
                    success: function(response){
                        $('#lga').html(response);
                        $('#lga').prop('disabled', false);
                    },
                    error: function(err){
					alert("Oops, something happened. Try again later");
                    }
                });
            });
        });
    </script> 
    <?php 
 include_once("frontfooter.php")

?>
</body>
</html>