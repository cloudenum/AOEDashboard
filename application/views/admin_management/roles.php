<!DOCTYPE html>
<html lang="id">
    <?php $this->load->view('template/head', [
        'css' => [
          'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css',
          // 'datatables.net-dt/css/jquery.dataTables.min.css',
          'datatables.net-responsive-dt/css/responsive.dataTables.min.css',
          'https://cdnjs.cloudflare.com/ajax/libs/spinkit/1.2.5/spinkit.min.css'
        ]
    ]);?>
<body>
    <?php $this->load->view('template/sidebar');?>
    <?php $this->load->view('template/navbar');?>
    <?php $this->load->view('template/right_panel');?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <?php $this->load->view('template/breadcrumb');?>
        
        <div class="br-pagebody">
          <div class="row">
            <div class="col-lg-6">
              <div class="br-section-wrapper">
                  <h6 class="br-section-label">Tambah roles</h6>
                  <p class="br-section-text"><span class="tx-danger">*</span> Menunjukan item yang harus diisi.</p>
                  <form id="addForm" method="POST" >
                    <div class="row mg-b-25">                       
                      <div class="col-lg-12">
                          <div class="form-group">
                          <label class="form-control-label">Nama role <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="name" minlength="4" placeholder="Masukkan nama role" required>
                          </div>
                      </div><!-- col-12 -->
                    </div>
                    <div class="row mg-b-25">
                      <div class="col-lg-4">
                        <p class="mg-b-10">Admin management access</p>
                        <div id="adminCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="admin[index]"
                              data-parsley-class-handler="#adminCbWrapper"
                              data-parsley-errors-container="#adminCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="adminCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Admin role management access</p>
                        <div id="adminRoleCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="admin_group[index]"
                            data-parsley-class-handler="#adminRoleCbWrapper"
                            data-parsley-errors-container="#adminRoleCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin_group[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin_group[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="admin_group[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="adminRoleCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Participant management access</p>
                        <div id="participantCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="participant[index]"
                            data-parsley-class-handler="#participantCbWrapper"
                            data-parsley-errors-container="#participantCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="participant[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="participant[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="participant[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="participantCbErrorContainer"></div>
                      </div>  
                    </div>
                    <div class="row mg-b-25">
                      <div class="col-lg-12">
                        <label class="ckbox">
                          <input type="checkbox" name="exam[index]"><span>Exam access</span>
                        </label>
                      </div>
                    </div>
                    <div class="row mg-b-25">
                      <div class="col-lg-4">
                        <p class="mg-b-10">Exam schedule management access</p>
                        <div id="examScheduleCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="exam_schedule[index]"
                            data-parsley-class-handler="#examScheduleCbWrapper"
                            data-parsley-errors-container="#examScheduleCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_schedule[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_schedule[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_schedule[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="examScheduleCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Exam status management access</p>
                        <div id="examStatusCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="exam_status[index]"
                            data-parsley-class-handler="#examStatusCbWrapper"
                            data-parsley-errors-container="#examStatusCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_status[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_status[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="exam_status[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="examStatusCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Answer management access</p>
                        <div id="answerCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="answer[index]"
                            data-parsley-class-handler="#answerCbWrapper"
                            data-parsley-errors-container="#answerCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="answer[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="answer[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="answer[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="answerCbErrorContainer"></div>
                      </div>
                    </div>
                    <div class="row mg-b-25">                      
                      <div class="col-lg-4">
                        <p class="mg-b-10">Question management access</p>
                        <div id="questionCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="question[index]"
                            data-parsley-class-handler="#questionCbWrapper"
                            data-parsley-errors-container="#questionCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="questionCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Question type management access</p>
                        <div id="questionTypeCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="question_type[index]"
                            data-parsley-class-handler="#questionTypeCbWrapper"
                            data-parsley-errors-container="#questionTypeCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_type[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_type[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_type[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="questionTypeCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mg-b-10">Question group management access</p>
                        <div id="questionGroupCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="question_group[index]"
                            data-parsley-class-handler="#questionGroupCbWrapper"
                            data-parsley-errors-container="#questionGroupCbErrorContainer" required><span>List</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_group[detail]"><span>Detail</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_group[add]"><span>Add</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="question_group[update]"><span>Update</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="questionGroupCbErrorContainer"></div>
                      </div>
                    </div>
                    <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <p class="mg-b-10">Upload access</p>
                        <div id="uploadCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="upload[exam]"
                            data-parsley-class-handler="#uploadCbWrapper"
                            data-parsley-errors-container="#uploadCbErrorContainer" required><span>Exam upload access</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="upload[answer]"><span>Answer upload access</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="upload[ktp]"><span>KTP upload access</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="uploadCbErrorContainer"></div>
                      </div>
                      <div class="col-lg-6">
                        <p class="mg-b-10">Misc. access</p>
                        <div id="miscCbWrapper" class="parsley-checkbox mg-b-0">
                          <label class="ckbox">
                            <input type="checkbox" name="helper[province]"
                            data-parsley-class-handler="#miscCbWrapper"
                            data-parsley-errors-container="#miscCbErrorContainer" required><span>Province list</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="helper[regencie]"><span>Regencies list</span>
                          </label>
                          <label class="ckbox">
                            <input type="checkbox" name="change_log[index]"><span>Change log access</span>
                          </label>
                        </div><!-- parsley-checkbox -->
                        <div id="miscCbErrorContainer"></div>
                      </div>
                    </div>
                    
                  <input type="text" name="status" style="display: none;" value="1">
                  <div class="form-layout-footer">
                      <button class="btn btn-info" type="submit" id="btnSubmit">Tambah</button>
                      <button class="btn btn-secondary" type="reset" >Cancel</button>    
                  </div><!-- form-layout-footer -->
                  </form>
              
              </div><!-- br-section-wrapper -->
            </div>
            <div class="col-lg-6">
              <div class="br-section-wrapper">
                  <h6 class="br-section-label">List Roles</h6>
                  <p class="br-section-text">admin roles.</p>
                  <div class="table-wrapper">
                    <table id="adminGroupTable" class="table display responsive nowrap">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
              </div><!-- br-section-wrapper -->
            </div>
            </div>
        </div><!-- br-pagebody -->
        <?php $this->load->view('template/footer')?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
     <!-- LARGE MODAL -->
     <div id="modal-edit" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold modal-title">Detail Info</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body pd-10">
                    <div class="form-layout form-layout-4">
                        <button id="btnModalEdit" type="button" class="btn btn-warning tx-size-xs" style="display: none;">Edit</button>
                        <button id="btnModalDelete" type="button" class="btn btn-danger tx-size-xs" style="display: none;">Delete</button>
                        
                        <form id="editForm" method="POST" action="" enctype="multipart/form-data" data-parsley-validate>
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Ref. Number: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input readonly id="ref-number-edit" class="form-control input-edit" type="text" name="reference_number" placeholder="Enter reference number">
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Nomor Identitas: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input readonly id="id-number-edit" class="form-control input-edit" type="text" name="identity_number" placeholder="Enter identity number">
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Nama: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input readonly id="fullname-edit" class="form-control input-edit" type="text" name="fullname" placeholder="Enter fullname">
                                </div>
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <textarea readonly rows="2" class="form-control input-edit" placeholder="Enter your address"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button id="btnSaveChanges" type="button" class="btn btn-primary tx-size-xs" disabled>Save Changes</button>
                    <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <?php $this->load->view('template/js', [
        'js' => [            
          'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js',
          'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.dataTables.min.js',
          'datatables.net-responsive/js/dataTables.responsive.min.js',
          'datatables.net-responsive-dt/js/responsive.dataTables.min.js',
          'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js',
          // 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/remote.js'
        ]
    ]);?>
    <script src="http://192.168.100.9/amikomexam/assets/js/admin.roles.js"></script>
    <?php 
        if (isset($alert) && is_array($alert) && !empty($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
