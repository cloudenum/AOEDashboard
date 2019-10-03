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
                <a href="" class="mg-r-10"><span class="tx-medium">#</span> <?php echo $user_id?></a>
                </div>
                <div class="tx-24 hidden-xs-down">
                <a href="mailto:" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                </div>
            </div><!-- card-header -->
            <div class="card-body">
                <div class="card-profile-img">
                    <img src="https://via.placeholder.com/500" alt="Photo Profile">
                </div><!-- card-profile-img -->
                <h4 id="profileName" class="tx-normal tx-roboto tx-white">...</h4>
                <p id="schoolHeader" class="mg-b-25">...</p>

                <p id="addressHeader" class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, unde officiis, ullam totam mollitia repellendus quasi maiores, rerum possimus suscipit repudiandae voluptatum! Repellendus possimus nobis est quaerat, fugit placeat dicta!
                </p>
            </div><!-- card-body -->
        </div><!-- card -->

        <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab">Dashboard</a></li>
                <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photos" role="tab">Profil</a></li> -->
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#nilai" role="tab">Nilai</a></li>
                <li class="nav-item hidden-xs-down"><a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a></li>
            </ul>
        </div>

        <div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="dashboard">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Ujian yang akan datang</h6>
                            <p id="textExamName"></p>
                            <p id="textSchedule"></p>
                            <button id="btnStartExam" class="btn btn-disabled" disabled>
                                Start Exam
                            </button>
                            
                        </div><!-- card -->
                    </div><!-- col-lg-4 -->
                    <div class="col-lg-8 mg-t-30 mg-lg-t-0">
                        <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Jadwal Ujian</h6>
                            <div class="bd bd-gray-300 rounded table-responsive skeleton">
                                <table id="scheduleTable" class="table table-striped">
                                    <thead class="thead-colored thead-teal">
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Nama Ujian</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div><!-- card -->
                    </div><!-- col-lg-8 -->
                    
                </div><!-- row -->
            </div><!-- tab-pane -->
            <div class="tab-pane fade" id="nilai">
                <div class="row">
                <div class="col-sm-12 ">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                        <ul class="list-group">
                            <li class="list-group-item rounded-top-0">
                                <p class="mg-b-0">
                                    <i class="fad fa-book tx-info mg-r-8"></i>
                                    <span class="text-muted">Ujian </span>
                                    <strong id="nilaiNamaUjian" class="tx-inverse tx-medium">...</strong>
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p class="mg-b-0">
                                    <i class="fad fa-cube tx-info mg-r-8"></i>
                                    <span class="text-muted">Soal terjawab </span>
                                    <strong id="nilaiExamDetail" class="tx-inverse tx-medium">...</strong>
                                </p>
                            </li>
                            <li class="list-group-item">
                                <p class="mg-b-0">
                                    <i class="fad fa-cube tx-info mg-r-8"></i>
                                    <span class="text-muted">Nilai </span>
                                    <strong id="nilaiGrade" class="tx-inverse tx-medium">...</strong>
                                </p>
                            </li>
                        </ul>
                    </div><!-- card -->
                </div><!-- col-lg-4 -->
                </div><!-- row -->
            </div><!-- tab-pane -->
            <div class="tab-pane fade" id="setting">
                <div class="row">
                <div class="col-sm-12">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                        <form id="editProfileForm" action="#" method="post">
                        <div class="form-layout form-layout-5">
                            <h6 class="br-section-label">Ubah profil</h6>
                            <p class="br-section-text"></p>
                            
                            <div class="row">
                                <label class="col-sm-4 form-control-label">Nama Lengkap:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" class="form-control" name="fullname" placeholder="Masukkan nama lengkap">
                                </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Tempat Lahir</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" type="text" name="place_of_birth" placeholder="Place of birth">
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Tanggal Lahir</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            <i class="icon fas fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control fc-datepicker" placeholder="DD-MM-YYYY" id="birthDate">
                                        <input type="text" class="form-control" id="altDate" name="date_of_birth" style="display: none">
                                    </div>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">
                                <label class="col-sm-4 form-control-label">Gol. darah</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <ul class="list-group list-group-horizontal" style="flex-direction: row;">
                                        <li class="list-group-item">
                                            <label class="rdiobox">
                                                <input class="form-control" name="blood_type" type="radio" value="a">
                                                <span>A</span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="rdiobox">
                                                <input class="form-control" name="blood_type" type="radio" value="b">
                                                <span>B</span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="rdiobox">
                                                <input class="form-control" name="blood_type" type="radio" value="ab">
                                                <span>AB</span>
                                            </label>
                                        </li>
                                        <li class="list-group-item">
                                            <label class="rdiobox">
                                                <input class="form-control" name="blood_type" type="radio" value="o">
                                                <span>O</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Alamat</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <textarea class="form-control" name="address" placeholder="Enter address"></textarea>
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Kewarganegaraan</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" type="text" name="citizen" placeholder="Enter your country">
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Kode Pos</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" type="text" name="postal_code" placeholder="Enter ZIP code" >
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Telepon</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" type="text" name="telephone" placeholder="Enter phone number">
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-20">                                
                                <label class="col-sm-4 form-control-label">Alamat e-mail</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" type="email" name="email" placeholder="Enter email address">
                                </div><!-- col-4 -->
                            </div>
                            <div class="row mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <button type="submit" id="btnSave" class="btn btn-disabled" disabled>Simpan</button>
                                        <button id="btnReset" class="btn btn-secondary" disabled>Cancel</button>
                                    </div><!-- form-layout-footer -->
                                </div><!-- col-8 -->
                            </div>
                        </div>
                        </form>
                    </div><!-- card -->
                </div><!-- col-lg-12 -->
                </div><!-- row -->
            </div><!-- tab-pane -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->

    
    <?php $this->load->view('template/js', [
        'js' => [
            // 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js',
            // 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js',
            '../js/participant.profile.js',
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
