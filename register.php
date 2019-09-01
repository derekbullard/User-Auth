<?php
  require 'dbconfig/config.php';

 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="register.php" method="post">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input name="cpassword" type="password" class="form-control" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button name="submit_btn" type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>

            <?php
                if(isset($_POST['submit_btn']))
                {
                  //echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';

                  $name = $_POST['name'];
                  $username = $_POST['email'];
                  $password = $_POST['password'];
                  $cpassword = $_POST['cpassword'];

                  if($password==$cpassword)
                  {
                    $query= "select * from user WHERE username='$username'";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                      // there is alrady a user with the same username
                       echo '<script type="text/javascript"> alert("User already exists... try another email") </script>';
                    }
                    else
                    {
                      $query= "insert into user values('$username','$password','$name')";
                      $query_run = mysqli_query($con,$query);

                      if($query_run)
                      {
                         echo '<script type="text/javascript"> alert("User Registered... go to login page") </script>';
                      }
                      else
                      {
                         echo '<script type="text/javascript"> alert("Error") </script>';
                      }
                    }

                  }


                }

             ?>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
