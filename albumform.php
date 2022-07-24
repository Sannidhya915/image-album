<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>
<?php    include 'dbcon.php';
?>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            Create New
        </label>
        <div class="newalbum">    
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Album Name</span>
        <input type="text" class="form-control" placeholder="Album Name" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
        <br>
        <div class="input-group mb-3">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">User Type</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Admin</a></li>
            <li><a class="dropdown-item" href="#">Premium User</a></li>
            <li><a class="dropdown-item" href="#">User</a></li>
        </ul>
        </div> 

        </div>
    </div>


    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Add to Existing
        </label>

        <div class="exalbum">
            <label>Select Existing Album</label>
            <select name="Sidenavbar">
            <option selected="selected">Album</option>
        <?php
            // <li><a class="dropdown-item" href="#">Action</a></li>
            // <li><a class="dropdown-item" href="#">Another action</a></li>
            // <li><a class="dropdown-item" href="#">Something else here</a></li>

            $sql = "SELECT name FROM album";
            $query = mysqli_query($con,$sql);
            $result = mysqli_fetch_assoc($query);
            // var_dump($result);
            foreach($result as $value)
                echo '<li><option class="dropdown-item">'.$value.'</option></li>';
                
                ?>
            </select>
        </ul>
        </div> 
    </div>
    </div>


<script>

$(document).ready(function(){        

    $(".newalbum").hide(500);
    $(".exalbum").hide(500);

    $("#flexRadioDefault1").click(function(){
    $(".exalbum").hide(500);
    $(".newalbum").show(500);
    });
    $("#flexRadioDefault2").click(function(){
    $(".newalbum").hide(500);
    $(".exalbum").show(500);
    });

 });  

</script>

</body>

</html>