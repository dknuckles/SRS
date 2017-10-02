<?php
require_once 'function/core.php';
if(isset($_POST['login'])){
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = filter_input(INPUT_POST, "username");
		$password = filter_input(INPUT_POST, "password");
        
        $accounts = new login();
        //echo $username;
		echo $accounts->loginAccount($username, $password);
	}else{
		echo "please login";
	}
}


if(isset($_POST['submit_csr'])){
    
    $requestor_id       =   $_POST['requestor_id'];
    $requestor_name     =   $_POST['request_by'];
    $requestor_dpt      =   $_POST['requestor_department'];
    $created_date       =   $_POST['created_date'];
    $request_date       =   $_POST['request_date'];
    $process            =   "CSR";
    $details            =   $_POST['ip_address'].";".$_POST['request_dtls'];
    
    $request_info       = new request();
    
    echo $request_info->createRequest($requestor_id, $requestor_name, $requestor_dpt, $created_date, $request_date, $process, $details);
    
}elseif(isset($_POST['submit_cpr'])){
    
    $requestor_id       =   $_POST['requestor_id'];
    $requestor_name     =   $_POST['request_by'];
    $requestor_dpt      =   $_POST['requestor_department'];
    $created_date       =   $_POST['created_date'];
    $request_date       =   $_POST['request_date'];
    $process            =   "CPR";
    $details            =   $_POST['ip_address'].";".$_POST['request_dtls'];
    
    $request_info       = new request();
    
    echo $request_info->createRequest($requestor_id, $requestor_name, $requestor_dpt, $created_date, $request_date, $process, $details);
    
}elseif(isset($_POST['submit_drr'])){
    
    $requestor_id       =   $_POST['requestor_id'];
    $requestor_name     =   $_POST['request_by'];
    $requestor_dpt      =   $_POST['requestor_department'];
    $created_date       =   $_POST['created_date'];
    $request_date       =   $_POST['request_date'];
    $process            =   "DRR";
    if($_POST['option_directory'] == "Original Directory"){
        $directory_info = $_POST['option_directory'];
    }else{
        $directory_info = $_POST['other_location'];
    }
    
    $details            =   $_POST['filename'].";".$_POST['file_location'].";".$directory_info.";".$_POST['option_overwrite'].";".$_POST['request_dtls'];
    $request_info       = new request();
    
    echo $request_info->createRequest($requestor_id, $requestor_name, $requestor_dpt, $created_date, $request_date, $process, $details);
    
}

if(isset($_GET['ic'])){
    
    $ic_id  =   $_GET['ic'];
    $view_request       = new request();
    echo $view_request->viewRequest($ic_id);
    $ic_no                  = $view_request->ic_no;
    $requestor              = $view_request->requestor;
    $crtd_date              = $view_request->crtd_date;
    
    $requestor_department   = $view_request->requestor_department;
    $rqst_date              = $view_request->rqst_date;
    
    $prcss_no               = $view_request->prcss_no;                 
    $dtls                   = $view_request->dtls;
    $prepared               = $view_request->prepared;
    $checker                = $view_request->checker;
    $approver               = $view_request->approver;
    
    $status                 = $view_request->status;
    $attachement            = $view_request->attachement;
    
    //$prcss_no = explode("-",$prcss_no);
    //echo strlen($prcss_no);
    if(strlen($prcss_no) == 11 ){
        
        $prcss_id = explode("-",$prcss_no);
        $procss     = $prcss_id[0];
        //echo $procss;
        $view_procss = new request();
        echo $view_procss->viewProcess($prcss_no);
        
        $received_by    = $view_procss->received_by;
        $received_id    = $view_procss->received_id;
        $received_date  = $view_procss->received_date;
        $assigned_to    = $view_procss->assigned_to;
        $assigned_id    = $view_procss->assigned_id;
        $assigned_date  = $view_procss->assigned_date;
        
        switch($prcss_id[0]){
                
            case"CSR";
                $csr_change_date        = $view_procss->csr_change_date;
                $csr_adjusted_date      = $view_procss->csr_adjusted_date;
                $csr_purchase_require   = $view_procss->csr_purchase_require;
                $csr_managers_approval  = $view_procss->csr_managers_approval;
                $csr_purchase_conforms  = $view_procss->csr_purchase_conforms;
                $csr_conforms_explain   = $view_procss->csr_conforms_explain;
                break;
            case"CPR";
                $cpr_prblm_ctgry        = $view_procss->cpr_prblm_ctgry;
                break;
            case"DRR";
                $drr_file_srvr          = $view_procss->drr_file_srvr;
                break;
        }
    }
    
}

if(isset($_POST['endorse_request'])){
    
    $ic_status          = "Assigned";
    $ic_id              = $_POST['ic_id'];
    $received_id        = $_POST['received_id'];
    $received_by        = $_POST['received_by'];
    $received_date      = $_POST['received_date'];
    
    $assigned           = array_filter(explode("-",$_POST['assign_to']));
    $assigned_to        = $assigned[0];
    $assigned_id        = $assigned[1];
    $assigned_date      = $_POST['assign_date'];
    
    switch($_POST['prcss']){
            
            case "CSR";
                $needed_date        = $_POST['needed_date'];
                $date_changed       = $_POST['date_change'];
                $adjusted_date      = $_POST['adjusted_date'];
                $require_purchase   = $_POST['require_purchase'];
                $managers_approval  = $_POST['managers_approval'];

                if (empty($_POST['conforms'])){
                    $conforms           = "N/A";
                    $conform_reason     = "N/A";
                }else{
                    $conforms           = $_POST['conforms'];
                    $conform_reason    = $_POST['conform_reason'];
                }

                
                $csr_info      = new request();
                echo $csr_info->createCsr($ic_status, $ic_id, $received_id, $received_by, $received_date, $assigned_to, $assigned_id, $assigned_date, $date_changed, $adjusted_date, $require_purchase, $managers_approval, $conforms, $conform_reason, $needed_date);
                /*
                echo"<script>
                        alert('Yeah ".$ic_status."');
                    </script>";
                */
                break;
                
            case "CPR";
            
                $occured_date       = $_POST['occured_date'];
                $problem_category   = $_POST['problem_category'];
                /*
                echo"<script>
                        alert('Yeah ".$_POST['prcss']."');
                    </script>";
                */
                $cpr_info      = new request();
                echo $cpr_info->createCpr($ic_status, $ic_id, $received_id, $received_by, $received_date, $assigned_to, $assigned_id, $assigned_date, $occured_date, $problem_category);
                
                break;
            
            case "DRR";
            
                $recover_date       = $_POST['recover_date'];
                $file_server         = $_POST['file_server'];
            
                $drr_info       = new request();
                echo $drr_info->createDrr($ic_status, $ic_id, $received_id, $received_by, $received_date, $assigned_to, $assigned_id, $assigned_date, $recover_date, $file_server);
                break;
                
            
    }
    
    $date_log               = date('Y-m-d');
    $acknowledge_message    = $_POST['message_to_incharge'];
    $personnel              = $_POST['received_by'];
    $addWorklog             = new workLog();
    $addWorklog->addWorklog($ic_id, $date_log, $ic_status, $acknowledge_message, $received_by);
    
}

if(isset($_POST['acknowledge'])){
    
    $ic_id                  = $_POST['ic_id'];
    $prcss                  = $_POST['prcss'];
    $personnel              = $_POST['personnel'];
    $status                 = $_POST['status'];
    $date_log               = $_POST['date_log'];
    $acknowledge_message    = $_POST['acknowledge_message'];
    
    $updateStatus           = new request();
    $updateStatus->statusUpdate($ic_id, $prcss, $status, $date_log);
    
    $addWorklog             = new workLog();
    $addWorklog->addWorklog($ic_id, $date_log, $status, $acknowledge_message, $personnel);
    
}

if(isset($_POST['submit_worklog'])){
    
    $ic_id                  = $_POST['ic_id'];
    $prcss                  = $_POST['prcss'];
    $personnel              = $_POST['personnel'];
    $status                 = $_POST['status'];
    $date_log               = $_POST['date_log'];
    $worklog_message        = $_POST['worklog_message'];
    
    $addWorklog             = new workLog();
    $addWorklog->addWorklog($ic_id, $date_log, $status, $worklog_message, $personnel);
}


?>