<?php
    session_start();
    require 'dbconfig/config.php';
 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="login.php" method="post">
                <div class="form-group">
                    <input name="username" type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <input name="login" type="submit" class="btn btn-primary block full-width m-b" vale="Login"/>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>

              <?php
              if(isset($_POST['login']))
              {
                 $username=$_POST['username'];
                 $password=$_POST['password'];
                 $name=$_POST['name'];

                 $query ="select * from user WHERE username='$username' AND password='$password' OR name='$name'";

                 $query_run = mysqli_query($con,$query);
                 if(mysqli_num_rows($query_run)>0)
                 {
                   // valid
                   $_SESSION['username']= $username;
                   header('location:index.php');
                 }
                 else
                 {
                   // invalid
                   echo '<script type="text/javascript"> alert("Error wrong password or username") </script>';
                 }
              }


             ?>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
