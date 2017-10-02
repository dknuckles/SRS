<?php

#### Side Bar ####

function sideBar($department, $position){
    
    switch($department){
            
            case "MIS";
            
                switch($position){
                        
                    case "Member";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="#">Endorsement</a>
                            <a class="list-group-item list-group-item-action" href="#">My Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">Search</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>

                        <?php;
                    break;
                        
                    case "Service Desk";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="#">MIS Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">Endorsement</a>
                            <a class="list-group-item list-group-item-action" href="#">My Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">Report</a>
                            <a class="list-group-item list-group-item-action" href="#">Search</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>

                        <?php
                    break;
                        
                    case "Checker";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="#">MIS Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">Endorsement</a>
                            <a class="list-group-item list-group-item-action" href="#">My Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">Request for Checking</a>
                            <a class="list-group-item list-group-item-action" href="#">Report</a>
                            <a class="list-group-item list-group-item-action" href="#">Search</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>

                        <?php
                    break;
                        
                    case "Approver";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="#">MIS Request Pool</a>
                            <a class="list-group-item list-group-item-action" href="#">For Approval</a>
                            <a class="list-group-item list-group-item-action" href="#">Report</a>
                            <a class="list-group-item list-group-item-action" href="#">Search</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>

                        <?php
                    break;
                        
                }
            
            break;
            
            default:
            
                switch($position){
                        
                    case "Member";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="myrequest.php">My Request</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>  
                        <?php
                    break;
                        
                    case "Checker";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="myrequest.php">My Request</a>
                            <a class="list-group-item list-group-item-action" href="#">Endorsement</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>  
                        <?php
                    break;
                        
                    case "Approver";
                        ?>
                        <div class="list-group col-12">
                            <a class="list-group-item list-group-item-action" href="index.php">Home</a>
                            <a class="list-group-item list-group-item-action" href="requestform.php">Create Request</a>
                            <a class="list-group-item list-group-item-action" href="myrequest.php">My Request</a>
                            <a class="list-group-item list-group-item-action" href="#">Endorsement</a>
                            <a class="list-group-item list-group-item-action btn-danger" href="logout.php">Log Out</a>
                        </div>  
                        <?php
                    break;
                        
                }
            
    }
}

?>