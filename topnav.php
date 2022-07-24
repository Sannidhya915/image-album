<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <title>Bootstrap Static Navbar</title> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php 
    $_POST["user_type"] = $_SESSION["user_type"];
    // var_dump($_POST);
    $usr_type=$_POST["user_type"];
    // var_dump($usr_type);
?>
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ddeeff">
        <div class="container-fluid">

        <!-- Just a bootstrap icon -->
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
  <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
  <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
</svg>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                    <?php
                    if($usr_type=='Admin')
                    {
                        echo '<a href="creation.php" class="nav-item nav-link">Create Album</a>';
                        echo '<a href="#" class="nav-item nav-link">Manage Albums</a>';
                    }
                    if($usr_type=='User')
                    {
                        echo '<a href="buypremium.php" class="nav-item nav-link">Premium</a>';
                    }
                    ?>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="login.php" class="nav-item nav-link">Log out</a>
                </div>
            </div>
        </div>
    </nav>
</div>
</body>
</html>