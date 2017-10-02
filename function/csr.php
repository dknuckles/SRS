<?php

##### Computer System Request #####

function csr($ic_no, $status, $requestor, $crtd_date, $requestor_department, $rqst_date, $prcss_no, $dtls, $prepared, $checker, $approver){
    $dtls = explode(";",$dtls);
    print'
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h3 >Computer System Request</h3>  
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <label class="col-2 col-form-label text-right">Request by:</label>
                <label class="col-4 col-form-label text-left">'.$requestor.'</label>
                <label class="col-2 col-form-label text-right">Request date:</label>
                <label class="col-4 col-form-label text-left">'.$crtd_date.'</label>
            </div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Department:</label>
                <label class="col-4 col-form-label text-left">'.$requestor_department.'</label>
                <label class="col-2 col-form-label text-right">Needed Date:</label>
                <label class="col-4 col-form-label text-left">'.$rqst_date.'</label>
            </div>
            <div class="dropdown-divider"></div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Request:</label>
                <label class="col-4 col-form-label text-left"></label>
                <label class="col-2 col-form-label text-right">Ip address:</label>
                <label class="col-4 col-form-label text-left">'.$dtls[0].'</label>
            </div>
            <div class="row">
                <label class="col-2 col-form-label text-right">Details:</label>
                <textarea class="col-4 col-form-label text-left">'.$dtls[1].'</textarea>
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
    </div>
    ';
}

function csrAssessment($ic_id, $fullname, $sam, $prcss_no, $rqst_date){
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
                <input type="hidden" name="needed_date" value="<?php echo $rqst_date;?>">
                
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
                <label class="col-3 col-form-label text-right">Date Needed change:</label>
                <div class="btn-group">
                    <label class="btn btn-primary">
                        <input type="radio" name="date_change" id="option5" value="Yes"> Yes
                    </label>
                
                    <label class="btn btn-danger">
                        <input type="radio" name="date_change" id="option5" value="No" required> No
                    </label>
                </div>
                <label name="adjust_date" class="col-3 col-form-label text-right">Adjusted date:</label>
                <div name="adjust_date" class="col-3">
                    <input class="form-control text-center" type="date" name="adjusted_date">
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="row">
                <label class="col-3 col-form-label text-right">Purchase Require:</label>

                <div class="btn-group">
                    <label class="btn btn-primary">
                        <input type="radio" name="require_purchase" id="option5" value="Yes"> Yes
                    </label>
                
                    <label class="btn btn-danger">
                        <input type="radio" name="require_purchase" id="option5" value="No" required> No
                    </label>
                </div>
                <label class="col-3 col-form-label text-right">Managers Approval:</label>

                <div class="btn-group">
                    <label class="btn btn-primary">
                        <input type="radio" name="managers_approval" id="option5" value="Yes"> Yes
                    </label>
                    <label class="btn btn-warning">
                        <input type="radio" name="managers_approval" id="option5" value="N/A" required> N/A
                    </label>
                </div>
            </div>
            <div name="purchased_conforms" class="dropdown-divider"></div>
            <div name="purchased_conforms" class="row">
                <label class="col-5 col-md-6 col-form-label text-right">Purchased conforms to Standard for Office PC?</label>

                <div class="btn-group">
                    <label class="btn btn-primary">
                        <input type="radio" name="conforms" id="option5" value="Yes"> Yes
                    </label>
                    <label class="btn btn-danger">
                        <input type="radio" name="conforms" id="option5" value="N/A"> N/A
                    </label>
                    <label class="btn btn-warning">
                        <input type="radio" name="conforms" id="option5" value="No"> No
                    </label>
                </div>
                
            </div>
            <div class="dropdown-divider"></div>
            <div name="conforms_reason" class="row">
                <div class="col-3"></div>
                <div class="col-5">
                    <small id="fileHelp" class="form-text text-muted">(Please explain reason)</small>
                
                    <textarea class="col-form-label text-left" name="conform_reason"></textarea>
                </div>
                
            </div>
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
function detailedCsr($csr_change_date, $csr_adjusted_date, $csr_purchase_require, $csr_managers_approval, $csr_purchase_conforms, $csr_conforms_explain){
?>
<div class="card">
    <div class="card-block">        
        <div class="row">
            <label class="col-3 col-form-label text-right">Date Needed change:</label>
            <label class="col-3 col-form-label "><?php echo $csr_change_date; ?></label>
            <label class="col-3 col-form-label text-right">Adjusted date:</label>
            <label class="col-3 col-form-label "><?php echo $csr_change_date; ?></label>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-3 col-form-label text-right">Purchase Require:</label>
            <label class="col-3 col-form-label "><?php echo $csr_purchase_require; ?></label>
            <label class="col-3 col-form-label text-right">Managers Approval:</label>
            <label class="col-3 col-form-label "><?php echo $csr_managers_approval; ?></label>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
            <label class="col-5 col-md-6 col-form-label text-right">Purchased conforms to Standard for Office PC?</label>
            <label class="col-3 col-form-label "><?php echo $csr_purchase_conforms; ?></label>
        </div>
        <div name="" class="row">
            <div class="col-3"></div>
            <div class="col-5">
                <small id="fileHelp" class="form-text text-muted">(Conform explaination)</small>            
                <textarea class="col-form-label text-left" name="conform_reason"><?php echo $csr_conforms_explain; ?></textarea>
            </div>            
        </div>
    </div>
</div>
<?php
}

?>