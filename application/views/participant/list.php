<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/head', [
        'css'=> [
            // 'select2/css/select2.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css',
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
        
        <div class="br-pagetitle">
            <i class="icon fad fa-user-graduate"></i>
            <div>
                <h4>Daftar Peserta Ujian</h4>
                <p class="mg-b-0">Edit atau hapus data peserta</p>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">

            <div class="br-section-wrapper">
                <div class="table-wrapper">
                    <table id="participantTable" class="table display nowrap">
                        <thead>
                            
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
                
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <?php $this->load->view('template/footer');?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- LARGE MODAL -->
    <div id="modal-info" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold modal-title">Detail Info</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body pd-10">
                    <div class="form-layout form-layout-4">
                        <button id="btnModalEdit" type="button" class="btn btn-warning tx-size-xs" style="display: none;">Edit</button>
                        <button id="btnModalDelete" type="button" class="btn btn-danger tx-size-xs" style="display: none;">Delete</button>
                        
                        <form id="editForm" method="POST" action="" enctype="multipart/form-data" data-parsley-validate>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Ref. Number: </label>
                                    <input class="form-control input-edit" type="text" name="reference_number" placeholder="Enter reference number">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">ID. Number: </label>
                                    <input class="form-control input-edit" type="text" name="identity_number" placeholder="Enter identity number">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Fullname <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="text" name="fullname" placeholder="Enter fullname" required>
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Password <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="password" name="password" placeholder="Enter password" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Retype Password <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="password" name="password_repeat" placeholder="Retype password" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Birth <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="text" name="place_of_birth" placeholder="Place of birth" required>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control fc-datepicker input-edit" placeholder="DD-MM-YYYY" id="birthDate" required>
                                        <input type="text" id="altDate" name="date_of_birth" style="display: none">
                                    </div>
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Gender <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="gender" type="radio" value="L" required data-parsley-required>
                                        <span>Male</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="gender" type="radio" value="P" required data-parsley-required>
                                        <span>Female</span>
                                    </label>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Gol. darah</label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="blood_type" type="radio" value="a">
                                        <span>A</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="blood_type" type="radio" value="b">
                                        <span>B</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="blood_type" type="radio" value="ab">
                                        <span>AB</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input class="input-edit" name="blood_type" type="radio" value="o">
                                        <span>O</span>
                                    </label>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Religion:</label>
                                    <select name="religion" class="form-control input-edit select2" data-placeholder="Choose religion">
                                        <option label="Choose religion"></option>
                                        <option value="5">Buddha</option>
                                        <option value="4">Hindu</option>
                                        <option value="6">Konghuchu</option>
                                        <option value="2">Protestant</option>
                                        <option value="3">Catholic</option>
                                        <option value="1">Islam</option>
                                        <option value="7">Lainnya</option>
                                    </select>
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">NEM: <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="number" step="0.01" min="0" name="nem" placeholder="Enter NEM" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">School</label>
                                    <input class="form-control input-edit" type="text" name="school" placeholder="Enter school">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Department</label>
                                    <input class="form-control input-edit" type="text" name="department" placeholder="Enter department">
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Address</label>
                                    <input class="form-control input-edit" type="text" name="address" placeholder="Enter address">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Regency/District</label>
                                    <input class="form-control input-edit" type="text" name="regency" placeholder="Enter regency">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Province/State</label>
                                    <input class="form-control input-edit" type="text" name="province" placeholder="Enter province">
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Citizenship</label>
                                    <input class="form-control input-edit" type="text" name="citizen" placeholder="Enter your country">
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">ZIP Code </label>
                                    <input class="form-control input-edit" type="text" name="postal_code" placeholder="Enter ZIP code" >
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Telephone </label>
                                    <input class="form-control input-edit" type="text" name="telephone" placeholder="Enter phone number">
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group">
                                    <label class="form-control-label">Email address <span class="tx-danger">*</span></label>
                                    <input class="form-control input-edit" type="email" name="email" placeholder="Enter email address" required>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Pilihan 1:</label>
                                    <select name="choice1" class="form-control input-edit select2" data-placeholder="Pilih prodi 1">
                                        <option label="Pilihan anda ..." data-select2-id="3"></option>
                                        <option value="S1-IF">S1 - Informatika</option>
                                        <option value="S1-SI">S1 - Sistem Informasi</option>
                                        <option value="S1-TI">S1 - Teknologi Informasi</option>
                                        <option value="D3-IF">D3 - Teknik Informatika</option>
                                    </select>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Pilihan 2:</label>
                                    <select name="choice2" class="form-control input-edit select2" data-placeholder="Pilih prodi 2">
                                        <option label="Pilihan anda ..." data-select2-id="3"></option>
                                        <option value="S1-IF">S1 - Informatika</option>
                                        <option value="S1-SI">S1 - Sistem Informasi</option>
                                        <option value="S1-TI">S1 - Teknologi Informasi</option>
                                        <option value="D3-IF">D3 - Teknik Informatika</option>
                                    </select>
                                    </select>
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-b-25">                       
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Soal yang dikerjakan: <span class="tx-danger">*</span></label>
                                    <select name="question_group_id" id="question-group-select" class="form-control input-edit select2" data-placeholder="Pilih soal" required>
                                        <option label="Choose religion"></option>
                                    </select>
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Foto KTP <span class="tx-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" name="ktp" id="ktp" class="custom-file-input input-edit" required>
                                            <label class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Foto Capture <span class="tx-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" name="capture" id="capture" class="custom-file-input input-edit" required>
                                            <label class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- row -->
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
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js',
            // 'select2/js/select2.min.js',
            // 'datatables.net/js/jquery.dataTables.min.js',
            // 'datatables.net-dt/js/dataTables.dataTables.min.js',
            'datatables.net-responsive/js/dataTables.responsive.min.js',
            'datatables.net-responsive-dt/js/responsive.dataTables.min.js',
            '../js/participant.list.js'
        ]
    ]);?>
    <?php 
        if (isset($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
