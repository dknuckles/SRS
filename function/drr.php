<?php

##### Date Recovery Request ######

function drr($ic_no, $status, $requestor, $crtd_date, $requestor_department, $rqst_date, $prcss_no, $dtls, $prepared, $checker, $approver){
    $dtls = explode(";",$dtls);
    print'
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8"> 
                    <h3>Data Recovery Request</h3>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <label class="col-2 col-form-label text-right">Report by:</label>
                <label class="col-4 col-form-label text-left">Wil Francis Dylan G. Leonardo</label>
                <label class="col-2 col-form-label text-right">Request date:</label>
                <label class="col-4 col-form-label text-left">'.$crtd_date.'</label>
            </div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Department:</label>
                <label class="col-4 col-form-label text-left">'.$requestor_department.'</label>
                <label class="col-2 col-form-label text-right">Recover Date:</label>
                <label class="col-4 col-form-label text-left">'.$rqst_date.'</label>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">Filename/s:</label>
            <textarea class="col-8 col-form-label text-left">'.$dtls[0].'</textarea>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">File Location:</label>
            <textarea class="col-8 col-form-label text-left">'.$dtls[1].'</textarea>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">Retore to:</label>
            <label class="col-4 col-form-label text-left">'.$dtls[2].'</label>
            <label class="col-2 col-form-label text-right">Overwrite file:</label>
            <label class="col-4 col-form-label text-left">'.$dtls[3].'</label>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-2 col-form-label text-right">Reason/s:</label>
            <textarea class="col-5 col-form-label text-left">'.$dtls[4].'</textarea>
            <div class="col-5 text-center">
                <label class="col-form-label text-right">Prepared:</label>
                <label class="col-form-label text-left">'.$requestor.'</label><br>
                <label class="col-form-label text-right">Checker:</label>
                <label class="col-form-label text-left">'.$requestor.'</label><br>
                <label class="col-form-label ">Approver:</label>
                <label class="col-form-label text-left">Wil Francis Dylan G. Leonardo</label>
            </div>
        </div>
    </div>
    ';
}

function drrAssessment($ic_id, $fullname, $sam, $prcss_no, $rqst_date){
    global $dbCon;
    
    $mis_member = new request();
    echo $mis_member->misMember();
    
    $members = $mis_member->member;
    $member = array_filter(explode(";",$members));
    $member_no = count($member);
?>
<form method="post">
    <div class="card">
        <div class="card-block">
            <div class="row">
                <input type="hidden" name="ic_id" value="<?php echo $ic_id;?>">
                <input type="hidden" name="prcss" value="<?php echo $prcss_no;?>">
                <input type="hidden" name="recover_date" value="<?php echo $rqst_date;?>">
                
                <label class="col-2 col-form-label text-right">Control No:</label>
                <label class="col-2 col-form-label text-left"><?php echo $prcss_no;?></label>
            </div>
            <div class="dropdown-divider"></div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Receive by:</label>
                <label class="col-3 col-md-4 col-form-label text-left"><?php echo $fullname;?></label>
                <label class="col-2 col-form-label text-right">Receive date:</label>
                <label class="col-3 col-md-4 col-form-label text-left"><?php echo date('m/d/Y');?></label>
                
                <input type="hidden" name="received_by" value="<?php echo $fullname;?>">
                <input type="hidden" name="received_id" value="<?php echo $sam;?>">
                <input type="hidden" name="received_date" value="<?php echo date('Y-m-d');?>">
            </div>
            <div class="dropdown-divider"></div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Assign to:</label>
                <select name="assign_to" class="col-3 col-md-4 custom-select" required>
                    <option value=""> </option>
                    <?php
                    for($i=0;$i<$member_no;$i++){
                        $member_details = array_filter(explode("-",$member[$i]));
                        echo "<option value='".$member_details[0]."-".$member_details[1]."'>".$member_details[0]."</option>";
                    }
                    ?>
                </select>
                <label class="col-2 col-form-label text-right">Assign date:</label>
                <label class="col-3 col-md-4 col-form-label text-left"><?php echo date('m/d/Y');?></label>
                
                <input type="hidden" name="assign_date" value="<?php echo date('Y-m-d');?>">
            </div>
            <div class="dropdown-divider"></div>
            <div class="row">
                <label class="col-3 col-form-label text-right">Fileserver:</label>
                <div class="col-3 col-md-4">
                    <select class="custom-select" name="file_server" required>
                        <option ></option>
                        <option value="Cae">Cae</option>
                        <option value="Windows">Windows </option>
                    </select>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div name="remarks" class="row">
                <label class="col-3 col-form-label text-right">Remarks:</label>
                <div class="col-5">
                    <small id="fileHelp" class="form-text text-muted">(Message to assign in charge)</small>
                
                    <textarea class="col-form-label text-left" name="message_to_incharge" required></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-1"></div>
                
                <button type="submit" class="btn btn-success col-3" name="endorse_request">Endorse Request</button>
                <div class="col-1"></div>
                <button type="submit" class="btn btn-warning col-3" name="return_request">Return Request</button>
                <div class="col-1"></div>
                <button type="button" class="btn btn-secondary col-2" data-dismiss="modal" onclick="window.history.back()">Back</button>
                
            </div>
        </div>
    </div>
</form>
<?php
}
function detailedDrr($drr_file_srvr){
?>
<div class="card">
    <div class="card-block">        
        <div class="row">
            <label class="col-3 col-form-label text-right">Fileserver:</label>
            <label class="col-3 col-form-label "><?php echo $drr_file_srvr; ?></label>
        </div>
    </div>
</div>
<?php  
}

?>