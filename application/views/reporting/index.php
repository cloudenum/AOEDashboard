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
                <h6 class="br-section-label">Download File Pengumuman</h6>
                <p class="br-section-text"> </p>
                <!-- <div class="form-layout form-layout-1"> -->
                    <!-- <form id="uploadForm" method="POST" action="" enctype="multipart/form-data" data-parsley-validate> -->
                    <div class="row mg-b-25">                       
                      <div class="col-lg-12">
                          <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Jenis Pengumuman: <span class="tx-danger">*</span></label>
                              <select name="question_group" id="question-group-select" class="form-control select2" data-placeholder="Pilih soal" required>
                                <option>Pillih ...</option>  
                                <option>Pengumuman hasil ujian</option>
                              </select>
                          </div>
                      </div><!-- col-4 -->
                    </div>
                    <div class="row mg-b-25">
                      <div class="col-lg-12">
                        <button class="btn btn-success btn-block mg-b-10"><i class="fa fa-download mg-r-10"></i> Download</button>
                      </div>
                    </div><!-- row -->
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <?php $this->load->view('template/footer');?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <?php $this->load->view('template/js', [
        'js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js',
            // 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js'
        ]
    ]);?>
    <!-- <script src="http://localhost/amikomexam/assets/js/soal.upload.js"></script> -->
    <?php 
        if (isset($alert) && is_array($alert) && !empty($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
