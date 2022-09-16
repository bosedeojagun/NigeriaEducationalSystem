	<?php

		include_once("common/schoolacad.php");

		$stobj = new School();

		// access insertSchool method and pass parameters
		$output = $stobj->insertSchooladmin($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['address'], $_POST['phone'], $_POST['password']);

		if (!$output) {
			echo "There were errors inserting data";
		}
		else {
			echo "Data inserted successfully";
		}
	
?>