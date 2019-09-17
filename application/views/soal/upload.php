<!DOCTYPE html>
<html lang="id">
    <?php $this->load->view('template/head', [
        'css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css'
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
                <h6 class="br-section-label">Upload Soal</h6>
                <p class="br-section-text"><span class="tx-danger">*</span> Upload file dengan format yang sesuai. <a href="">Download format file.</a></p>
                <div class="form-layout form-layout-1">
                    <form id="uploadForm" method="POST" action="" enctype="multipart/form-data" data-parsley-validate>
                    <div class="row mg-b-25">                       
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Nama Soal: <span class="tx-danger">*</span></label>
                                <select name="question_group" id="question-group-select" class="form-control select2" data-placeholder="Pilih soal" required>
                                    <option label="Pilih soal"></option>
                                </select>
                                <div> Soal tidak ada? <a href=""><span>Tambah disini.</span></a></div>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">File Excel <span class="tx-danger">*</span></label>
                                <div class="custom-file">
                                    <input data-placeholder="Pilih file ..." type="file" name="capture" id="capture" class="custom-file-input" required>
                                    <label class="custom-file-label"></label>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                    <div class="form-layout-footer">
                        <button class="btn btn-info" type="submit" id="btnSubmit">Upload Soal</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div><!-- form-layout-footer -->
                    </form>
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <?php $this->load->view('template/js', [
        'js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js'
        ]
    ]);?>
    <script src="http://localhost/amikomexam/assets/js/soal.upload.js"></script>
    <?php 
        if (isset($alert) && is_array($alert) && !empty($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
