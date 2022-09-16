	<?php

		include_once("common/schoolacad.php");

		$stobj = new School();

 		$school_password = password_hash($_POST['school_password'], PASSWORD_DEFAULT);

		// access insertSchool method and pass parameters
		$output = $stobj->insertSchool($_POST['type'],$_POST['section'], $_POST['school_name'], $_POST['state'], $_POST['lga'], $_POST['school_address'], $_POST['school_email'],$_POST['school_phoneno'], $school_password, $_POST['school_description'], $_POST['total_student']);


		



		echo $output;
	
?>