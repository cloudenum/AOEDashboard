<!DOCTYPE html>
<html lang="id">
    <?php $this->load->view('template/head', [
        'css' => [
            // 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css'
        ]
    ]);?>
<body>
    <?php $this->load->view('template/sidebar');?>
    <?php $this->load->view('template/navbar');?>
    <?php $this->load->view('template/right_panel');?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel br-profile-page">

        <div class="card shadow-base bd-0 rounded-0 widget-4">
            <div class="card-header ht-75">
                <div class="hidden-xs-down">
                <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
                <a href=""><span class="tx-medium">498</span> Following</a>
                </div>
                <div class="tx-24 hidden-xs-down">
                <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                <a href=""><i class="icon ion-more"></i></a>
                </div>
            </div>card-header
            <div class="card-body">
                <div class="card-profile-img">
                    <img src="https://via.placeholder.com/500" alt="Photo Profile">
                </div><!-- card-profile-img -->
                <h4 class="tx-normal tx-roboto tx-white">...</h4>
                <p class="mg-b-25">...</p>

                <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">Singer, Lawyer, Achiever, Wearer of unrelated hats, Data Visualizer, Mayonaise Tester. I don't know what alt-tab does. Storyteller.</p>

                <p class="mg-b-0 tx-24">
                <!-- <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-facebook-official"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-twitter"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-pinterest"></i></a>
                <a href="" class="tx-white-8"><i class="fab fa-instagram"></i></a> -->
                </p>
            </div><!-- card-body -->
        </div><!-- card -->

        <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab">Dashboard</a></li>
                <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photos" role="tab">Profil</a></li> -->
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#nilai" role="tab">Nilai</a></li>
                <li class="nav-item hidden-xs-down"><a class="nav-link" data-toggle="tab" href="#" role="tab">Settings</a></li>
            </ul>
        </div>

        <div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="dashboard">
                <div class="row">
                    <div class="col-lg-8">
                    </div><!-- col-lg-8 -->
                    <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                        <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Contact Information</h6>

                            
                        </div><!-- card -->
                    </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- tab-pane -->
            <div class="tab-pane fade" id="nilai">
                <div class="row">
                <div class="col-lg-8">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    
                    </div><!-- card -->
                </div><!-- col-lg-8 -->
                <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    
                    </div><!-- card -->
                </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- tab-pane -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->

    
    <?php $this->load->view('template/js', [
        'js' => [
            // 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js',
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
