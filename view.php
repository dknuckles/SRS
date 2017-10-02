<?php

require_once 'function/function.php';
require_once 'function/sidebar.php';
require_once 'function/csr.php';
require_once 'function/cpr.php';
require_once 'function/drr.php'; 
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
            textarea{
                height: 100px;
                width: 300px;
                resize: none;
            }
            .align{
                margin-top: 10px;
            }
            .worklog1{
                height: 520px;
                overflow-y: scroll;
            }
        </style>
        <script>
            $(function () {
              $('[toggle="popover"]').popover({
                  trigger : 'hover'
              })
            });
            $(document).ready(function(){
                $('div[name=purchased_conforms]').hide();
                $('input[type=radio][name=require_purchase]').change(function() {
                    if (this.value == 'Yes') {
                        $('div[name=purchased_conforms]').show();
                        $('input[name=conforms]').prop('required',true);
                    }else{
                        $('div[name=purchased_conforms]').hide();
                        $('input[name=conforms]').prop('required',false);
                    }
                });
                
            });
            $(document).ready(function(){
                $('div[name=conforms_reason]').hide();
                $('input[type=radio][name=conforms]').change(function() {
                    if (this.value == 'No') {
                        $('div[name=conforms_reason]').show();
                        $('div[name=conforms_reason]').prop('required',true);
                    }else{
                        $('div[name=conforms_reason]').hide();
                    }
                });
                
            });
            $(document).ready(function(){
                $('div[name=adjust_date]').hide();
                $('label[name=adjust_date]').hide();
                $('input[type=radio][name=date_change]').change(function() {
                    if (this.value == 'Yes') {
                        $('div[name=adjust_date]').show();
                        $('label[name=adjust_date]').show();
                        $('input[name=adjusted_date]').prop('required',true);
                    }else{
                        $('div[name=adjust_date]').hide();
                        $('label[name=adjust_date]').hide();
                        $('input[name=adjusted_date]').prop('required',false);
                    }
                });
                
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
                    
                    <div class="row">
                    
                        <div class="col-lg-8">
                        <?php
                        
                        $registered_prcss_no = explode("-",$prcss_no);


                        if($prcss_no == "CSR" || $registered_prcss_no[0] == "CSR"){
                            echo csr($ic_no, $status, $requestor, $crtd_date, $requestor_department, $rqst_date, $prcss_no, $dtls, $prepared, $checker, $approver);
                        }elseif($prcss_no == "CPR" || $registered_prcss_no[0] == "CPR"){
                            echo cpr($ic_no, $status, $requestor, $crtd_date, $requestor_department, $rqst_date, $prcss_no, $dtls, $prepared, $checker, $approver);
                        }elseif($prcss_no == "DRR" || $registered_prcss_no[0] == "DRR"){
                            echo drr($ic_no, $status, $requestor, $crtd_date, $requestor_department, $rqst_date, $prcss_no, $dtls, $prepared, $checker, $approver);
                        }

                        switch($status){

                                case "New Request";

                                    if($department == "MIS" || $department == "MIS (Iloilo)"){

                                        if($prcss_no == "CSR" || $registered_prcss_no[0] == "CSR"){

                                            echo csrAssessment($ic_id, $fullname, $sam, $prcss_no, $rqst_date);

                                        }elseif($prcss_no == "CPR" || $registered_prcss_no[0] == "CPR"){

                                            echo cprAssessment($ic_id, $fullname, $sam, $prcss_no, $rqst_date);

                                        }elseif($prcss_no == "DRR" || $registered_prcss_no[0] == "DRR"){

                                            echo drrAssessment($ic_id, $fullname, $sam, $prcss_no, $rqst_date);
                                        }
                                    }else{

                                        echo buttonViewing();
                                        }
                                    break;

                                case "Assigned";

                                    echo misDetails($prcss_no, $status, $received_by, $received_id, $received_date, $assigned_to, $assigned_id, $assigned_date);

                                    switch($registered_prcss_no[0]){

                                            case "CSR";
                                                echo detailedCsr($csr_change_date, $csr_adjusted_date, $csr_purchase_require, $csr_managers_approval, $csr_purchase_conforms, $csr_conforms_explain);
                                            break;
                                            case "CPR";
                                                echo detailedCpr($cpr_prblm_ctgry);
                                            break;
                                            case "DRR";
                                                echo detailedDrr($drr_file_srvr);
                                            break;
                                    }

                                    if($assigned_to == $fullname){
                                        echo buttonAssigned();
                                    }else{
                                        echo buttonViewing();
                                    }
                                    break;

                                case "Work in Progress";
                                    
                                    echo misDetails($prcss_no, $status, $received_by, $received_id, $received_date, $assigned_to, $assigned_id, $assigned_date);

                                    switch($registered_prcss_no[0]){

                                            case "CSR";
                                                echo detailedCsr($csr_change_date, $csr_adjusted_date, $csr_purchase_require, $csr_managers_approval, $csr_purchase_conforms, $csr_conforms_explain);
                                            break;
                                            case "CPR";
                                                echo detailedCpr($cpr_prblm_ctgry);
                                            break;
                                            case "DRR";
                                                echo detailedDrr($drr_file_srvr);
                                            break;
                                    }

                                    if($assigned_to == $fullname){
                                        echo buttonWorkinProgress();
                                    }else{
                                        echo buttonViewing();
                                    }
                                    break;
                        }

                        ?>
                        </div>
                        <!-- Work log -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Work log</h3>
                                </div>
                                <div class="worklog1">
                                    <?php 
                                        $view_wrklg  = new workLog();
                                        echo $view_wrklg->viewWorklog($ic_id);

                                        $wrklgs     = $view_wrklg->worklog;
                                        $wrklg      = array_filter(explode(";",$wrklgs));
                                        $wrklg_no   = count($wrklg);

                                        for($i=0;$i<$wrklg_no;$i++){
                                            $wrklg_dtls = array_filter(explode("~",$wrklg[$i]));
                                    ?>
                                        <div class="card">
                                            <div class="card-block">
                                                <?php echo $wrklg_dtls[2]; ?>
                                            </div>
                                            <div class="card-footer">
                                                <?php echo "<b>".$wrklg_dtls[1]."</b> by ".$wrklg_dtls[3]."<br>".$wrklg_dtls[0]; ?>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
<?php









function misDetails($prcss_no, $status, $received_by, $received_id, $received_date, $assigned_to, $assigned_id, $assigned_date){ 
?>
<div class="card">
    <div class="card-block">
        <div class="row">
            <label class="col-2 col-form-label text-right">Control No:</label>
            <label class="col-3 col-form-label text-left"><?php echo $prcss_no;?></label>
            <label class="col-3 col-form-label text-right">Status:</label>
            <label class="col-3 col-form-label text-left"><?php echo $status;?></label>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">Receive by:</label>
            <label class="col-3 col-md-4 col-form-label text-left"><?php echo $received_by;?></label>
            <label class="col-2 col-form-label text-right">Receive date:</label>
            <label class="col-3 col-md-4 col-form-label text-left"><?php echo $received_date;?></label>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">Assign to:</label>
            <label class="col-3 col-md-4 col-form-label text-left"><?php echo $assigned_to;?></label>
            <label class="col-2 col-form-label text-right">Assign date:</label>
            <label class="col-3 col-md-4 col-form-label text-left"><?php echo $assigned_date;?></label>
            
            <input type="hidden" name="assign_date" value="<?php echo date('Y-m-d');?>">
        </div>
    </div>
</div>
<?php
}





function buttonWorkinProgress(){
?>
<div class="card">
    <div class="card-footer">
        <div class="row">
            <div class="col-1"></div>
            <button type="submit" class="btn btn-success col-3" toggle="popover" data-toggle="modal" data-target="#worklog-form">Add work log</button>
            <div class="col-1"></div>
            <button type="submit" class="btn btn-warning col-3" name="request_done">Request Done</button>
            <div class="col-1"></div>
            <button type="button" class="btn btn-secondary col-2" data-dismiss="modal" onclick="window.history.back()">Back</button>
                
        </div>
    </div>
</div>
<?php
}

function buttonAssigned(){
?>
<div class="card">
    <div class="card-footer">
        <div class="row">
            <div class="col-2"></div>
            <button type="submit" class="btn btn-warning col-3" toggle="popover" data-toggle="modal" data-target="#acknowledge-form">Acknowledge</button>
            <div class="col-3"></div>
            <button type="button" class="btn btn-secondary col-2" data-dismiss="modal" onclick="window.history.back()">Back</button>
                
        </div>
    </div>
</div>
<?php
}
function buttonViewing(){
?>
<div class="card">
    <div class="card-footer">
        <div class="row">
            <div class="col-2"></div>
                    
            <button type="submit" class="btn btn-success col-3" toggle="popover" data-toggle="modal" data-target="#worklog-form">Work log</button>
            <div class="col-2"></div>
            <button type="button" class="btn btn-secondary col-3" data-dismiss="modal" onclick="window.history.back()">Back</button>
                
        </div>
    </div>
</div>
<?php   
}
?>

<div class="modal fade bd-example-modal-md" id="acknowledge-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post">
            <div class="card">
                <div class="card-header">
                    <h5>Acknowledge Request</h5>
                </div>
                <div class="card-block">        
                    <div name="remarks" class="row">
                        <input type="hidden" name="ic_id" value="<?php echo $ic_id;?>">
                        <input type="hidden" name="prcss" value="<?php echo $prcss_no;?>">
                        <input type="hidden" name="personnel" value="<?php echo $fullname;?>">
                        <input type="hidden" name="status" value="Work in Progress">
                        <input type="hidden" name="date_log" value="<?php echo date('Y-m-d');?>">
                        
                        <label class="col-3 col-form-label text-right">Remarks:</label>
                        <div class="col-5">
                            <textarea class="col-form-label text-left" name="acknowledge_message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2"></div>
                        <button type="submit" class="btn btn-success col-3" name="acknowledge">Submit</button>
                        <div class="col-2"></div>
                        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade bd-example-modal-md" id="worklog-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form method="post">
            <div class="card">
                <div class="card-header">
                    <h5>Add work log</h5>
                </div>
                <div class="card-block">        
                    <div name="remarks" class="row">
                        <input type="hidden" name="ic_id" value="<?php echo $ic_id;?>">
                        <input type="hidden" name="prcss" value="<?php echo $prcss_no;?>">
                        <input type="hidden" name="personnel" value="<?php echo $fullname;?>">
                        <input type="hidden" name="status" value="<?php echo $status; ?>">
                        <input type="hidden" name="date_log" value="<?php echo date('Y-m-d');?>">
                        <div class="col-2"></div>
                        <div class="col-5">
                            <textarea class="col-form-label text-left" name="worklog_message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2"></div>
                        <button type="submit" class="btn btn-success col-3" name="submit_worklog">Submit</button>
                        <div class="col-2"></div>
                        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
