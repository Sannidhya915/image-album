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
<?php    
    include 'dbcon.php';

    if (isset($_POST['create'])) {
        include 'dbcon.php';
        function create_album()
        {
            $name=$_POST['albumname'];
            $desc=$_POST['description'];
            $type=$_POST['user_type'];

            //Query add created album to db
            $con = mysqli_connect("localhost","root","","photoalbum");
            $sql = "INSERT INTO album(name,description,user_type) VALUES('$name','$desc','$type')";
            $query = mysqli_query($con,$sql);
        }
        create_album();
    }
        

?>
    <form action="#" method="post">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            Create New
        </label>
        <div class="newalbum">    
        <div class="input-group mb-3">
        <span class="input-group-text" id="adbumname">Album Name</span>
        <input type="text" name="albumname" class="form-control" placeholder="Album Name" aria-label="Username" aria-describedby="adbumname">
        </div>

        <div class="input-group">
        <span class="input-group-text">Description</span>
        <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
        </div>
        <br>
            <label>User Type</label>
        <select name="user_type">
            <option selected="selected">Album</option>
            <li><option class="dropdown-item">Admin</option></li>
            <li><option class="dropdown-item">Premium User</option></li>
            <li><option class="dropdown-item">User</option></li>        
        </select>
        </ul>


        <input type="submit" class="btn-sm btn-primary btn-lg" name="create" value="Create">

        <!-- <button class="btn-sm btn-primary btn-lg" onclick="create()"> Create </button> -->

        </div>
    </div>



    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Select Album
        </label>

    </div>
    </div>
</form>

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