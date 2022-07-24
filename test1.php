<?php
$con = mysqli_connect("localhost","root","","photoalbum");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} 

$sql = "SELECT name FROM album";
$result = mysqli_query($con, $sql);

// Fetch all
$res=mysqli_fetch_all($result, MYSQLI_ASSOC);

// var_dump($res);
// foreach ($res as $value) {
//     echo $value['name'];
// }
            echo '<label>Select Existing Album</label>';
            echo '<select name="Sidenavbar">';
                echo '<option selected="selected">Album</option>';



foreach($res as $value)
{
    // echo '<li><option class="dropdown-item">'.$value.'</option></li>';
    echo "<option value='" . $value['name'] . "'>" . $value['name'] . "</option>";
}
    
echo '</select>';

// Free result set
$alt=mysqli_free_result($result);
// var_dump($alt);

mysqli_close($con);
?>