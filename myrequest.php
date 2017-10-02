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
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>My Request list</h5>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Referrence No.</th>
                                        <th>Request type</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once 'function/core.php';

                                        $start=0;
                                        $limit=10;

                                        if(isset($_GET['id'])){
                                            $id=$_GET['id'];
                                            $start=($id-1)*$limit;
                                        }else{
                                                $id=1;
                                        }

                                        $rfplist_query = $dbCon->prepare("Select * from ic where ic_rqstr ='$fullname' order by ic_id DESC LIMIT $start, $limit");
                                        $rfplist_query->execute();

                                        if($rfplist_query->rowCount() > 0){
                                            while($row=$rfplist_query->FETCH(PDO::FETCH_ASSOC)){
                                                ?>

                                        <tr>
                                            <td>
                                                <a href="view.php?ic=<?php echo $row['ic_id']; ?>"><?php echo $row['ic_no']; ?></a>
                                            </td>
                                            <td>
                                                <?php echo $row['prcss_no']; ?>
                                            </td>
                                            <td>
                                                <?php 

                                                    $specific_dtl = str_replace(" ","",explode(";",$row['ic_dtls']));
                                                    echo $specific_dtl[0]; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $row['ic_status']; ?>
                                            </td>

                                        </tr>
                                                <?php
                                            }
                                        }

                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
