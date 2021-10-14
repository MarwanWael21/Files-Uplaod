<?php 
    include("connect.php");
    $stmt = $con->prepare("SELECT * FROM file");
	$stmt->execute();
	$rows = $stmt->fetchAll(); 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<body>
    <div class="row">
        <div class="col-md-3">
            <?php 
                foreach($rows as $row) {
                    echo "<img src='uploads/" . $row['file'] . "' alt='' />";
                }
            ?>
        </div>
    </div>
</body>
</html>