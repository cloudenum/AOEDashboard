<!DOCTYPE html>
<html lang="id">
    <?php $this->load->view('template/head', [
        'css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css',
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
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Tambah admin</h6>
                <p class="br-section-text"><span class="tx-danger">*</span> Menunjukan item yang harus diisi.</p>
                <div class="form-layout form-layout-1">
                    <form id="addForm" method="POST" >
                    <div class="row mg-b-25">                       
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">Nama <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="fullname" minlength="4" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">Username <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="username" placeholder="Masukkan username" required>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" data-parsley-trigger="keyup" name="email" placeholder="Masukkan alamat email" required>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">Password <span class="tx-danger">*</span></label>
                            <input class="form-control" id="passwordInput" type="password" minlength="8" name="password" placeholder="Masukkan kata sandi" required>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">                        
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label class="form-control-label">Retype Password <span class="tx-danger">*</span></label>
                            <input class="form-control" type="password" data-parsley-trigger="keyup" data-parsley-check-password-retype minlength="8" name="password_repeat" placeholder="Ketik ulang kata sandi" required>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">
                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Admin role: <span class="tx-danger">*</span></label>
                            <select name="group_id" id="adminGroupSelect" class="form-control select2" data-placeholder="Pilih role" required>
                                <option></option>
                            </select>
                            </div>
                        </div><!-- col-4 -->
                    </div>
                    <input type="text" name="status" style="display: none;" value="1">
                    <div class="form-layout-footer">
                        <button class="btn btn-info" type="submit" id="btnSubmit">Tambah</button>
                        <button class="btn btn-secondary" type="reset" >Cancel</button>    
                    </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <?php $this->load->view('template/js', [
        'js' => [            
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js',
            // 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/remote.js'
        ]
    ]);?>
    <script src="http://192.168.100.9/amikomexam/assets/js/admin.add.js"></script>
    <?php 
        if (isset($alert) && is_array($alert) && !empty($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
