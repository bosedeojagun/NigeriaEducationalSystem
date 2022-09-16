<!DOCTYPE html>
<html>
<head>
	<title>State and LGA</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<?php 
        include_once("common/zone.php");

        // create region object

        $obj = new Zone();

        // reference getStates method
        $states = $obj->getStates();

    ?>
	<form action="" name="form" method="post">
		<h2>State & LGA</h2>
		<section class="section">
			<div class="row">
				<div class="col-md-3">
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
			<div class="col-md-3">
            <label class="form-label">LGA</label>
            <select name="lga" id="lga" class="form-select" disabled>
            <option value="">Select LGA</option>
            </select>
            </div> 
            </div>     
	</form>
	
           <button type="button" name="btnlogin" id="btnlogin" class="btn btn-success">Login</button><br><br>
           <div id="result"></div>
           </div>

            
        </div>
    </div>

    <!-- footer -->
    <footer class="mt-5">
         &copy 2022. Designed by Bose Ojagun
    </footer>
    
    <!-- JS Files -->

    <script src="jquery/jquery.js" type="text/javascript"></script>
                                
    <script type="text/javascript" language="javascript">

        //  Get Local Government based on State Selected
        $(document).ready(function(){
            $("#state").change(function(){
                // get the State ID
                alert('a');
                var stateid =$(this).val();

                // To pick the text from Selected item
                var statename = $('#state option:selected').text();
                alert(statename);

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
</body>
</html>
</body>
</html>