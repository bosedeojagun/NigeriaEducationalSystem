<!DOCTYPE html>
<html>
<head>
	<title>Uploading A File</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
		<div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>File Upload</h2>
                <form action="uploader2.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Passport Page</label>
                        <input type="file" name="photo" />
                    </div> 

                    <button type="submit" name="btnupload" class="btn btn-success">Upload Photo </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>