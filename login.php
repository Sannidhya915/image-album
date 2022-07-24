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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<body>
<?php

include 'dbcon.php';


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usr_type = "SELECT user_type FROM user WHERE email='$email'";
    $query = mysqli_query($con,$usr_type);
    $result = mysqli_fetch_assoc($query);
    
    foreach($result as $value)
      {
        $_SESSION["user_type"] = $value;
      }

    $usr_email = "SELECT * FROM user WHERE email='$email'";
    $query = mysqli_query($con,$usr_email);

    $count_email = mysqli_num_rows($query);

    if($count_email)
    {
        $email_pass = mysqli_fetch_assoc($query);

        $usrpass = $email_pass['password'];

        $pass_decode = strcmp($usrpass,$password);

        if($pass_decode == 0)
        {
            echo "Login Successful!";
            ?>
                <script>
                    location.replace("home.php");
                </script>
            <?php

        }
        else
        {
            echo "Incorrect Password!";
            ?>
            <script>
                $('#log_msg1').toggle();
            </script>
          <?php
        }
    }
    else{
        echo "Invalid Email!";
    }
}
?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="email" name="email" class="form-control" />
                      <label class="form-label" for="email">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="password" name="password" class="form-control" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <!-- <button type="submit" class="btn btn-primary btn-lg">Login</button> -->
                    <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Login">
                  </div>
                  <p id="log_msg1">Incorrect Email/Password.</p>
                  <p id="log_msg2">Invalid Email.</p>
                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="login_page_img.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

<script>
    $(document).ready(function(){        
        $('#log_msg1').toggle();
        $('#log_msg2').toggle();
    });     
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</html>