<?php
session_start();
include('config/db.php');

$image = $_SESSION['image'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editor</title>
</head>
<body>
    <div>
    <img src="data:image/png;base64,<?php echo $image; ?>" alt="image" height="300" width="300"/>
    <p>Filters</p>
    <form action="filter/filter.php" method="GET" enctype="multipart/form-data">
    <button type="submit" name="filter1">Filter1</button>
    <button type="submit" name="filter2">Filter2</button>
    </form>
    </div>
    <p> Uploaded Image </p>
    <hr class="solid">
    <div>
    <form action="discard.php" method="GET">
    <button type="submit" name="discard">Discard</button>
    </form>
    <form action="finish.php" method="POST" enctype="multipart/form-data">
    <button type="submit" name="finish">Finish</button>
    </form>
    </div>
</body>
</html>