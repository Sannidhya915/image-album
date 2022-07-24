<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Album Gallery</title>

    <link href='simplelightbox-master/dist/simple-lightbox.min.css' rel='stylesheet' type='text/css'>

    <style>

        .container .gallery a img {
        float: left;
        width: 20%;
        height: auto;
        border: 2px solid #fff;
        -webkit-transition: -webkit-transform .15s ease;
        -moz-transition: -moz-transform .15s ease;
        -o-transition: -o-transform .15s ease;
        -ms-transition: -ms-transform .15s ease;
        transition: transform .15s ease;
        position: relative;
        }

        .container .gallery a:hover img {
        -webkit-transform: scale(1.05);
        -moz-transform: scale(1.05);
        -o-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05);
        z-index: 5;
        }

        .clear {
        clear: both;
        float: none;
        width: 100%;
        }

    </style>

</head>


<body>
<?php 
    $_POST["user_type"] = $_SESSION["user_type"];
    // var_dump($_POST);
?>

<?php
    include 'topnav.php';
?>


<div class='container'>
 <div class="gallery">
 
  <?php 
  // Image extensions
  $image_extensions = array("png","jpg","jpeg","gif");

  // Target directory
  $dir = 'images/';
  if (is_dir($dir)){
        
        if ($dh = opendir($dir)){
            $count = 1;

            // Read files
            while (($file = readdir($dh)) !== false){

            if($file != '' && $file != '.' && $file != '..'){
        
            // Thumbnail image path
            $thumbnail_path = "images/".$file;

            // Image path
            $image_path = "images/".$file;
        
            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);
            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);

            // Check its not folder and it is image file
            if(!is_dir($image_path) && 
                in_array($thumbnail_ext,$image_extensions) && 
                in_array($image_ext,$image_extensions)){
        ?>

            <!-- Image -->
            <a href="<?php echo $image_path; ?>">
                <img src="<?php echo $thumbnail_path; ?>" alt="" title=""/>
            </a>
            <!-- --- -->
            <?php

            // Break
            if( $count%4 == 0){
            ?>
                <div class="clear"></div>
            <?php 
            }
            $count++;
            }
            }
        
            }
            closedir($dh);
        }
  }
 ?>
 </div>
</div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="simplelightbox-master/dist/simple-lightbox.jquery.min.js"></script>

    <!-- Script -->
    <script type='text/javascript'>
    $(document).ready(function(){

    // Intialize gallery
    var gallery = $('.gallery a').simpleLightbox();

    });
    </script>


</html>