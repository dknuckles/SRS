<?php
require_once 'function/function.php';
?>
<html>
    <head>
        <title>
            Request Payment System
        </title>
        <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css"href="css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" type="text/css"href="css/sidebar.css"/>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <style>
            body{
                background-color: #f2f4f8;
            }
            .sidenav {
              background-color: #f1f1f1;
              height: 100%;
            }
            .borderless td, .borderless th {
                border: none;
            }
            textarea{
                height: 50px;
                width: 300px;
                resize: none;
            }
            .nav-top{
                padding-top: 25px;
                padding-bottom: 30px;
            }
            .nav-top-content{
                padding-top: 60px;
                padding-bottom: 30px;
            }
            .centered-login{
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row nav-top">
                <div class="col-4"></div>
                <div class="col-4">
                    <h4>Service Request System</h4>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row centered-login">
                <div class="col-3"></div>
                <div class="col-4">
                    <form method="post">
                        <div class="row form-group">
                            <label class="col-5 col-form-label text-right">
                                Login :
                            </label>
                            <input class="col-6 form-control" type="text" name="username">
                        </div>
                        <div class="row form-group">
                            <label class="col-5 col-form-label text-right">
                                Password :
                            </label>
                            <input class="col-6 form-control" type="password" name="password">
                        </div>
                        <div class="row form-group">
                            <div class="col-5 text-right"></div>
                            <button type="submit" class="col-6 btn btn-success btn-block" name="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </body>
</html>
