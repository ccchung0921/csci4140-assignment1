<?php 
include('config/db.php');
session_start();
$photos_per_page = 8;
if (! isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
if (isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
    $userID = $_COOKIE['userid'];
    $auth = true;
    $sql = "SELECT * from photo WHERE public = 1 OR (public = 0 AND author_id = $userID) ORDER BY timestamp DESC";
    $result = pg_query($conn,$sql);
    $total_photos = pg_num_rows($result);
    pg_free_result($result);
    if ($total_photos > 0 ){
    $sql = "SELECT * from photo WHERE public = 1 OR (public = 0 AND author_id = $userID) ORDER BY timestamp DESC OFFSET ($page-1)*$photos_per_page LIMIT $photos_per_page";
    $result = pg_query($conn,$sql);
    $photos = pg_fetch_all($result,PGSQL_ASSOC);
    $number_of_pages = ceil($total_photos/$photos_per_page);
    pg_free_result($result);
    }else{
        $photos = [];
        $total_photos = 0;
        $number_of_pages = 1;
    }
}else{
    $auth = false;
    $sql = "SELECT * from photo WHERE public = 1 ORDER BY timestamp DESC ";
    $result = pg_query($conn,$sql);
    $total_photos = pg_num_rows($result);
    if ($total_photos > 0 ){
        $sql = "SELECT * from photo WHERE public = 1 ORDER BY timestamp DESC OFFSET ($page-1)*$photos_per_page LIMIT $photos_per_page";
        $result = pg_query($conn,$sql);
        $photos = pg_fetch_all($result,PGSQL_ASSOC);
        $number_of_pages = ceil($total_photos/$photos_per_page);
        }else{
            $photos = [];
            $total_photos = 0;
            $number_of_pages = 1;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>UPLOAD PHOTO</title>
    <style>
        .user-section{
            display:flex;
            justify-content: space-between;
            align-items:center;
        }
        .photo-section{
            display:grid;
            grid-template-rows: repeat(2,220px);
            grid-template-columns:repeat(4,1fr);
        }
        .page{
            display:flex;
            justify-content: space-around;
            margin-top:30px;
        }
        .error p{
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="user-section">
        <a href=<?php echo $auth?'logout.php':'login.php' ;?>><?php echo htmlspecialchars($auth ? 'Logout':'Login'); ?></a>
        <?php if($auth){ ?>
            <p>Welcome, <?php echo htmlspecialchars($username); ?></p>
        <?php } ?>  
    </div>
    <div class="photo-section">
    <?php foreach($photos as $photo){ ?>
             <img src="data:image/png;base64,<?php echo base64_encode(pg_unescape_bytea($photo['image'])); ?>" alt="image" height="200" width="200"/> 
    <?php } ?>  
    </div>
    <div class="page">
    <button <?php echo $page == 1 ?'disabled':''; ?> onclick="location.href='index.php?page=<?php echo $page-1; ?>'">
        Previous Page
    </button>
    <p>Page <b><?php echo $page; ?></b> of <?php echo $number_of_pages; ?></p>
    <button <?php echo $page == $number_of_pages ? 'disabled':'';?> onclick="location.href='index.php?page=<?php echo $page+1; ?>'">
        Next Page
    </button>
    </div>
    <?php if($auth){ ?>
    <div class="upload-section">
        <hr class="solid">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="file">Upload Photo</label>
            <input type="file" id="file" name="file">
            <button type="submit" name="submit">UPLOAD </button>
            <select name="publicity" id="publicity">
                <option value="public">public</option>
                <option value="private">private</option>
            </select>
        </form>
    </div> <?php } ?>
    <div class="error">
        <?php if(isset($_SESSION['error'])){  
            echo $_SESSION['error'];
            unset($_SESSION['error']);
         } ?>
    </div>
</body>
</html>