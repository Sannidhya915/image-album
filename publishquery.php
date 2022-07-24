<?php

$server = "localhost";
$user = "root";
$password="";
$db = "photoalbum";

$con = mysqli_connect($server,$user,$password,$db);

$sql = "UPDATE adbum SET status=1 WHERE name='".$value['name']."'";
$result = mysqli_query($con, $sql);

?>