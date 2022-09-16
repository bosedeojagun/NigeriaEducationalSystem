<?php 
	// variables display
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";

	$filename = $_FILES['photo']['name'];
    $filesize = $_FILES['photo']['size'];
    $fileerror = $_FILES['photo']['error'];
    $filetype = $_FILES['photo']['type'];
    $tmpname = $_FILES['photo']['tmp_name'];

    // destination
    $destination = "uploads/$filename";

    if(move_uploaded_file($tmpname, $destination)){
        echo "File was successfully uploaded";
    }
 ?>