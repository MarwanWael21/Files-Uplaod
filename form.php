<?php
include ("connect.php");

    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') ) {
        $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['type'];

    $allowedExtensions = ['jpeg', 'jpg', 'gif', 'png'];
    $userExtention = explode(".", $fileName);
    $dump = strtolower(end($userExtention));
    if (in_array($dump, $allowedExtensions)) {
        $uploadedFile = rand(0, 1000000) . "_" . $fileName;
        move_uploaded_file("$fileTmp", "uploads\\" . $uploadedFile);
            $stmt = $con->prepare("INSERT INTO file(file) VALUES(:zavatar) ");
						$stmt->execute(array(
							'zavatar'	=> $uploadedFile
						));
    }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Upload File</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="signup-form">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <form class="border shadow p-3 rounded" style="width: 450px;" method="POST" action = "<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <h1 class="text-center p-3">Upload File</h1>
                </div>
                <div class="mb-3 form-group">
                    <label class="form-label text-center">File</label>
                    <input type="file" class="form-control" name="file" >
                </div>
                <div class="mb-3 form-group">
                    <input type="submit" class="form-control btn btn-success" value = "upload">
                    <a href="imgs.php">See Images</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>