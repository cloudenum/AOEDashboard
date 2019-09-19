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
        
        <div class="br-pagetitle mg-b-10">
            <i class="icon fad fa-calendar-alt"></i>
            <div>
                <h4>Manajemen Jadwal Ujian</h4>
                <p class="mg-b-0">Untuk tambah jadwal ada di panel kanan</p>
            </div>
        </div><!-- d-flex -->
        <div class="br-pagebody mg-b-20">
            <div class="row row-sm">
                <div class="col-lg-4">
                    <div class="card shadow-base card-body">
                        <form id="scheduleForm" action="#" method="post">
                            <div class="form-group">
                                <label class="form-control-label">Tgl mulai <span class="tx-danger">*</span></label>                            
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon fas fa-calendar-alt tx-16 lh-0 op-6"></i></div>
                                    </div>
                                    <input type="text" class="form-control fc-datepicker" placeholder="DD-MM-YYYY" id="startDate" required>
                                    <input type="text" id="altDate0" name="start_date" style="display: none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Tgl selesai <span class="tx-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon fas fa-calendar-alt tx-16 lh-0 op-6"></i></div>
                                    </div>
                                    <input type="text" class="form-control fc-datepicker" placeholder="DD-MM-YYYY" id="completionDate" required>
                                    <input type="text" id="altDate1" name="completion_date" style="display: none">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 mg-t-20 mg-lg-t-0">
                    <div class="card shadow-base card-body">
                        <div class="table-wrapper">
                            <table id="scheduleTable" class="table display responsive nowrap" style="width: 100%">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div>
                </div>
            </div>
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
                        
                        <form id="addForm" method="POST" action="" enctype="multipart/form-data" data-parsley-validate>
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
            'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.dataTables.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js',
            // 'select2/js/select2.min.js',
            // 'datatables.net/js/jquery.dataTables.min.js',
            // 'datatables.net-dt/js/dataTables.dataTables.min.js',
            'datatables.net-responsive/js/dataTables.responsive.min.js',
            'datatables.net-responsive-dt/js/responsive.dataTables.min.js',
            '../js/schedule.list.js'
        ]
    ]);?>
    <?php 
        if (isset($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
