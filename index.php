<?php

require_once 'function/function.php';
require_once 'function/sidebar.php';
                            
##require_once 'restriction.php';
?>
<html>
    <head>
        <title>
            Service Request
        </title>
        <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css"href="css/bootstrap-datetimepicker.min.css"/>
        <script src="js/jquery-3.1.1.slim.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aui-min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <style>
            body{
                background-color: #f2f4f8;
            }
            .nav-top{
                padding-top: 55px;
            }
            .sidenav {
              background-color: #B2DBBF;
              height: 100%;
            }
        </style>
        <script>
            $(function () {
              $('[toggle="popover"]').popover({
                  trigger : 'hover'
              })
            });
             
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="nav-top">
                    
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-xl-2">
                    <div class="row">
                        <?php
                            echo sideBar($department, $position);
                        ?>
                    </div>
                </div>
                <div class="col-lg-10 col-xl-10">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2>Hi! <?php echo $firstname; ?></h2>
                                    <h4 class="ml-5 mt-3">Welcome to MIS Service Request System</h4>
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
