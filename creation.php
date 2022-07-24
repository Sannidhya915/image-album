<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Album</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php

        include 'topnav.php'; 
        include 'albumform.php';

    if(isset($_POST['submit']))
    {
        // Upload Image

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }


        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        
        //Query to insert file into db
        // $sql = "INSERT INTO ";
        // $query = mysqli_query($con,$usr_type);
        // $result = mysqli_fetch_assoc($query);

        } 
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

                    function ins_file()
                    {
                        $con = mysqli_connect("localhost","root","","photoalbum");
                        
                        $img= htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                        // $alname=$_POST['ex-album']; fetching above on this file.
                        
                        $alname = $_POST['existing'];                                                                                                           

                        $sql = "SELECT id FROM album WHERE name='$alname'";
                        $query = mysqli_query($con,$sql);
                        $alId = mysqli_fetch_assoc($query);
                        // var_dump($alId);
                        //Query add image to db.                                
                        $sql = 'INSERT INTO images(image,album_id) VALUES("'.$img.'",'.$alId["id"].')';
                        $query = mysqli_query($con,$sql);
                    }
                    
                    ins_file();

            } 
            else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
        }
        // include 'upload.php';   
    }


?>


<div class="exalbum">
    <div style="margin: 0; position: absolute;top: 70%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%)" >
        <div class="card text-center" style="width: 20rem;background-color:#CFE4FF">
            <br>
                <!-- Upload icon -->
                <div class="text-center" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                    </svg>
                </div>
                        
          
    <div class="card-body">
        <h5 class="card-title">Select image to upload:</h5>
        <p class="card-text">Allowed file formats: "png","jpg","jpeg","gif"</p>
    </div>
        <ul class="list-group list-group-flush">
            
                <form action="#" method="post" enctype="multipart/form-data">
            
                <label>Select Existing Album</label>
                        <select name="existing">
                            <option selected="selected">Album</option>
                                <?php

                                    $sql = "SELECT name FROM album";
                                    $result = mysqli_query($con, $sql);
                                    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    // var_dump($result);
                                    foreach($result as $value)
                                    {
                                        echo "<option value='" . $value['name'] . "'>" . $value['name'] . "</option>";
                                    }
                                ?>
                        </select> 

                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
        </ul>
</div>

</body>
</html>