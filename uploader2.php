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

    //  uploading a file
    if ($fileerror > 0){
        die("File not yet uploaded");
    }

    // file size
    if ($filesize > 1048576) {
        die("Profile photo cannot be more than 1mb");
    }

    // file type
    $extensions = array("jpeg", "gif", "png", "jpeg");

    $filename_arr = explode(".", $filename);
    $file_ext = end($filename_arr);

    // check if the file_ext is in array extensions
    if (!in_array(strtolower($file_ext), $extensions)) {
        die("File type not allowed!");
    }  

    // destination
    $destination = "uploads/$filename";

    if(move_uploaded_file($tmpname, $destination)){
        echo "File was successfully uploaded";
    }
 ?>