<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>

.grid-container {
  display: grid;
  grid-template-columns: 70% 15% 15%;
  grid-gap: 2px;
  background-color: black;
  padding: 3px;
}

.grid-container > div {
  background-color: white;
  text-align: center;
  padding: 5px;
  font-size: 20px;
}
</style>
</head>
<body>
<?php 
    include 'dbcon.php'
?>
<h2>&nbsp;Manage Albums</h2>
    <div class="container-fluid">
        <div class="grid-container">
        <!-- <div class="item1">1</div>
        <div class="item2">2</div>
        <div class="item3">3</div>  
        <div class="item4">4</div>
        <div class="item5">5</div>
        <div class="item6">6</div>
        <div class="item7">7</div>
        <div class="item8">8</div> -->
            <?php

                $sql = "SELECT name FROM album";
                $query = mysqli_query($con,$sql);
                $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

            foreach ($result as $value)
            {
                echo '<div class="$value["name"]">'.$value["name"].'</div>';
                echo '<button id="publish" type="button" class="btn btn-success">Publish</button>';
                echo '<button id="unpublish" type="button" class="btn btn-danger">Unpublish</button>';
            }

            ?>

        </div>
    </div>
</body>

<script>

    $("#publish").on('click', function(){

        $.ajax({
        url: 'publishquery.php',
        dataType: 'json',
        // success: function(data){
        //         //data returned from php
        // }
        });
    });

</script>

</html>