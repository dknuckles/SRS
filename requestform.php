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
            textarea{
              width: 80%;
              height: 100px;
              background-color: #ecf0f1;
              border: none;
              resize: none;
            }
            textarea.floc{
              width: 80%;
              height: 100px;
              background-color: #ecf0f1;
              border: none;
              resize: none;
            }
        </style>
        <script>
            $(function () {
              $('[toggle="popover"]').popover({
                  trigger : 'hover'
              })
            });
             $(document).ready(function(){
                $('textarea[name=other_location]').hide();
                $('input[type=radio][name=option_directory]').change(function() {
                    if (this.value == 'Other') {
                        $('textarea[name=other_location]').show();
                    }else{
                        $('textarea[name=other_location]').hide();
                    }
                });
                
            });
            
            $(document).ready(function(){
                $("input[name='file[]']").change(function() {
                    var names = [];
                    for (var i = 0; i < $(this).get(0).files.length; ++i) {
                        names.push($(this).get(0).files[i].name);
                    }
                    var file = console.log(names);
                    var n = names.length;
                    alert(names);
                    $(".filename").text(names);
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
                        <div class="col-md-4 text-center">
                            <button type="submit" class="btn btn-default" name="CSRF" toggle="popover" data-placement="bottom" title="Computer System Request Form" data-content="Form to request Acquisition of IT related items,modification and installation " data-toggle="modal" data-target="#csrf-form">CSRF</button>
                        </div>
                        <div class="col-md-4 text-center">
                            <button type="submit" class="btn btn-default" name="CPRF" toggle="popover" data-placement="bottom" title="Computer Problem Report Form" data-content="Form to request problem pc for troubleshooting" data-toggle="modal" data-target="#cprf-form">CPRF</button>
                        </div>
                        <div class="col-md-4 text-center">
                            <button type="submit" class="btn btn-default" name="DRRF" toggle="popover" data-placement="bottom" title="Data Recovery Request Form" data-content="Form to request recovery of specific file" data-toggle="modal" data-target="#drrf-form">DRRF</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- CSR form -->
                <div class="modal fade bd-example-modal-lg" id="csrf-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <form method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Computer System Request Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <div class="">
                                      <div class="row">
                                          <div class="col-2 text-right">
                                              <label class="col-form-label ">Name :</label>
                                              <input type="hidden" name="requestor_id" value="<?php echo $sam;?>" >
                                          </div>
                                          <div class="col-5">
                                              <label class="col-form-label "><?php echo $fullname; ?></label>
                                              <input type="hidden" name="request_by" value="<?php echo $fullname; ?>">
                                          </div>
                                          <div class="col-2">
                                              <label class="col-form-label ">Date Request</label>
                                          </div>
                                          <div class="col-3">
                                              <label class="col-form-label "><?php echo date("m/d/Y"); ?></label>
                                              <input type="hidden" name="created_date" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-2 text-right">
                                              <label class="col-form-label ">Department :</labe>
                                          </div>
                                          <div class="col-5">
                                              <label class="col-form-label "><?php echo $department; ?></label>
                                              <input type="hidden" name="requestor_department" value="<?php echo $department; ?>">
                                          </div>
                                          <div class="col-2">
                                              <label class="col-form-label ">Date Needed</label>
                                          </div>
                                          <div class="col-3">
                                              <input type="date" name="request_date" class="form-control" required>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <!--
                                          <div class="col-2 text-right">
                                              <label class="col-form-label ">Request :</label>
                                          </div>
                                          <div class="col-5">
                                              <select name="request" class="custom-select" required>
                                                  <option value=""> </option>
                                                  <option value="Borrowing Laptop/Desktop">Borrowing Laptop/Desktop</option>
                                                  <option value="Business Trip Laptop">Business Trip Laptop</option>
                                                  <option value="Installation Hardware">Installation Hardware</option>
                                                  <option value="Installation Software">Installation Software</option>
                                                  <option value="Installation Non-Standard Software">Installation Non-Standard Software</option>
                                                  <option value="Installation Standard Software">Installation Standard Software</option>
                                                  <option value="MS Office Configuration">MS Office Configuratio</option>
                                                  <option value="New Account">New Account</option>
                                                  <option value="Purchase Hardware">Purchase Hardware</option>
                                                  <option value="Purchase Software">Purchase Software</option>
                                                  <option value="Renewal Hardware">Renewal Hardware</option>
                                                  <option value="Renewal Software">Renewal Software</option>
                                                  <option value="Update Hardware">Installation Hardware</option>
                                                  <option value="Update Software">Installation Software</option>
                                              </select>
                                          </div>
                                          -->
                                          <div class="col-2">
                                              <label class="col-form-label ">Ip Address :</label>
                                          </div>
                                          <div class="col-3">
                                              <input type="text" name="ip_address" class="form-control" >
                                          </div>
                                      </div>
                                      <div class="dropdown-divider"></div>
                                      <div class="row">
                                          <div class="col-2 text-right">
                                          </div>
                                          <div class="col-10">
                                              <small id="fileHelp" class="form-text text-muted">(What need & Why need)</small>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-2 text-right">
                                              <label class="col-form-label ">Details :</label>
                                          </div>
                                          <div class="col-10">
                                              <textarea name="request_dtls" class="form-control" required></textarea>
                                          </div>
                                      </div>
                                      <div class="dropdown-divider"></div>
                                      <div class="row">
                                          <div class="col-2 text-right">
                                              <labe>Attachment :</labe>
                                          </div>
                                          <input class="form-control-file col-2" type="file" name="file[]" multiple="" multiple>
                                      </div>
                                      <div class="row">
                                          <div class="col-2 text-right">
                                          </div>
                                          <div class="col-8 ">
                                              <div class="filename">Nothing selected</div>
                                          </div>
                                      </div>
                                  </div> 
                              </div>
                          </div>
                          <div class="modal-footer">
                              <div class="col-5">
                                  <button type="submit" class="btn btn-primary" name="submit_csr">Send Request</button>
                              </div>
                              <div class="col-5">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>

                <!-- CPR form -->
                <div class="modal fade" id="cprf-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <form method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Computer Problem Report Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label class="col-form-label ">Name :</label>
                                          <input type="hidden" name="requestor_id" value="<?php echo $sam;?>" >
                                      </div>
                                      <div class="col-5">
                                          <label class="col-form-label "><?php echo $fullname; ?></label>
                                          <input type="hidden" name="request_by" value="<?php echo $fullname; ?>">
                                      </div>
                                      <div class="col-2">
                                          <label class="col-form-label ">Date Request</label>
                                      </div>
                                      <div class="col-3">
                                          <label class="col-form-label "><?php echo date("m/d/Y"); ?></label>
                                          <input type="hidden" name="created_date" value="<?php echo date("Y-m-d"); ?>">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label>Department :</label>
                                      </div>
                                      <div class="col-5">
                                          <label class="col-form-label "><?php echo $department; ?></label>
                                          <input type="hidden" name="requestor_department" value="<?php echo $department; ?>">
                                      </div>
                                      <div class="col-2">
                                          <label>Date Occur</label>
                                      </div>
                                      <div class="col-3">
                                          <input type="date" class="form-control" name="request_date" required>
                                      </div>
                                  </div>
                                  <div class="row">
                                      
                                      <div class="col-2">
                                          <label>Ip Address :</label>
                                      </div>
                                      <div class="col-3">
                                          <input type="text" class="form-control" name="ip_address">
                                      </div>
                                  </div>
                                  
                                  <div class="dropdown-divider"></div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                      </div>
                                      <div class="col-10">
                                          <small id="fileHelp" class="form-text text-muted">(Explanation of problem: state operations before/after problem occured)</small>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <labe>Problem :</labe>
                                      </div>
                                      <div class="col-10">
                                          <textarea name="request_dtls" class="form-control" required></textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <div class="col-5">
                                      <button type="submit" class="btn btn-primary" name="submit_cpr">Send Request</button>
                                  </div>
                                  <div class="col-5">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                     </form>
                  </div>
                </div>

                <!-- DRR form -->
                <div class="modal fade" id="drrf-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <form method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data Recovery Report Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                <div class="row">
                                      <div class="col-2 text-right">
                                          <label class="col-form-label ">Name :</label>
                                          <input type="hidden" name="requestor_id" value="<?php echo $sam;?>" >
                                      </div>
                                      <div class="col-5">
                                          <label class="col-form-label "><?php echo $fullname; ?></label>
                                          <input type="hidden" name="request_by" value="<?php echo $fullname; ?>">
                                      </div>
                                      <div class="col-2  text-right">
                                          <label class="col-form-label ">Date Request</label>
                                      </div>
                                      <div class="col-3 text-center">
                                          <label class="col-form-label "><?php echo date("m/d/Y"); ?></label>
                                          <input type="hidden" name="created_date" value="<?php echo date("Y-m-d"); ?>">
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label class="col-form-label ">Department :</label>
                                      </div>
                                      <div class="col-4">
                                          <label class="col-form-label "><?php echo $department; ?></label>
                                          <input type="hidden" name="requestor_department" value="<?php echo $department; ?>">
                                      </div>
                                      <div class="col-3 text-right">
                                          <label class="col-form-label ">Date to be recovered</label>
                                      </div>
                                      <div class="col-3">
                                          <input class="form-control text-center" type="date" name="request_date" required>
                                      </div>
                                  </div>
                                  
                                  <div class="dropdown-divider"></div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <labe>Filename:</labe>
                                      </div>
                                      <div class="col-10 text-right">
                                      <textarea name="filename" class="form-control" required></textarea>
                                      </div>
                                  </div>
                                  <div class="dropdown-divider"></div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label>File Location :</label>
                                      </div>
                                      <div class="col-10 text-right">
                                        <textarea name="file_location" class="form-control" required></textarea>
                                      </div>
                                  </div>
                                  <div class="dropdown-divider"></div>

                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label>Restore file :</label>
                                      </div>
                                      <div class="col-3">
                                        <label class="btn btn-primary">
                                            <input type="radio" name="option_directory" id="option2" value="Original Directory"> Original Directory
                                        </label>
                                      </div>
                                      <div class="col-5">
                                          <label class="btn btn-primary">
                                              <input type="radio" name="option_directory" id="option3" value="Other"> Other
                                          </label>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                      </div>
                                      <div class="col-10">
                                        <textarea name="other_location" class="form-control"></textarea>
                                      </div>
                                  </div>
                                  <div class="dropdown-divider"></div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label>Overwrite file:</label>
                                      </div>
                                      <div class="col-2">
                                          <label class="btn btn-primary">
                                              <input type="radio" name="option_overwrite" id="option4" value="Yes"> Yes
                                          </label>
                                      </div>
                                      <div class="col-5">
                                          <label class="btn btn-primary">
                                              <input type="radio" name="option_overwrite" id="option5" value="No"> No
                                          </label>
                                      </div>
                                  </div>
                                  <div class="dropdown-divider"></div>
                                  <div class="row">
                                      <div class="col-2 text-right">
                                          <label>Reason :</label>
                                      </div>
                                      <div class="col-10 text-right">
                                        <textarea name="request_dtls" class="form-control" required></textarea>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <div class="modal-footer">
                              <div class="col-5">
                                  <button type="submit" class="btn btn-primary" name="submit_drr">Send Request</button>
                              </div>
                              <div class="col-5">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
