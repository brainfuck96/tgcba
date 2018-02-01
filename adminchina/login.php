<?php
session_start();
if ( isset($_SESSION['login']) && $_SESSION['login'] === true)
    header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script type="text/javascript" src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.bundle.js" type="text/javascript"></script>
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Login</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <span class="anchor" id="formLogin"></span>
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" method="POST" action="php/Login.php" autocomplete="off" id="formLogin">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="user"
                                           id="uname1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="pwd1">Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="pass"
                                           id="pwd1" required="" autocomplete="new-password">
                                </div>
                                <input type="submit" value="Login" class="btn btn-dark btn-lg float-right">
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
</body>
</html>