<?php

$server = "localhost";
$user = "root";
$password="";
$db = "photoalbum";

$con = mysqli_connect($server,$user,$password,$db);

// $con = mysqli_connect("localhost","root","","photoalbum");

if($con)
{
    ?>
    <script>
        alert("Connection Successful!");
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("Connection Error!");
    </script>
    <?php
}

?>