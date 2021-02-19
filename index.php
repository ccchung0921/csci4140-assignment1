<?php 
include('config/db.php');
session_start();
if (isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
    $userID = $_COOKIE['userid'];
    $auth = true;
    $page = 1;
    $sql = "SELECT * from photo WHERE public = 1 OR (public = 0 AND author_id = $userID) ORDER BY timestamp";
    $result = mysqli_query($conn,$sql);
    $photos = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $total_photos = mysqli_num_rows($result);
    $photos_per_page = 8;
    $number_of_pages = ceil($total_photos/$photos_per_page);
}else{
    $auth = false;
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>UPLOAD PHOTO</title>
 <link rel="stylesheet" href="style.php" media="screen">
</head>
<body>
    <div class="user-section">
        <a href=<?php echo $auth?'logout.php':'login.php' ;?>><?php echo htmlspecialchars($auth ? 'Logout':'Login'); ?></a>
        <p>Hi, <?php echo htmlspecialchars($username); ?></p>
    </div>
    <div class="photo-section">
    <?php foreach($photos as $photo){ ?>
             <img src="data:image/png;base64,<?php echo base64_encode($photo['image']); ?>" alt="image" height="200" width="200"/> 
    <?php } ?>  
    <div class="page">
    <button>Previous Page</button>
    <p>Page 1 of <?php echo $number_of_pages; ?></p>
    <button>
    <a  href="index.php?page=<?php echo $page+1; ?>">Next Page</a>
    </button>
    </div>
    </div>
    <hr class="solid">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Upload Photo</label>
        <input type="file" id="file" name="file" accept="image/png,image/jpeg,image/gif">
        <button type="submit" name="submit">UPLOAD </button>
        <select name="publicity" id="publicity">
            <option value="public">public</option>
            <option value="private">private</option>
        </select>
    </form>
</body>
</html>