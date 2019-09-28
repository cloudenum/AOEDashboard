<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/head', [
        'css'=> [
            'select2/css/select2.min.css',
            // 'datatables.net-dt/css/jquery.dataTables.min.css',
            'https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css',
            'datatables.net-responsive-dt/css/responsive.dataTables.min.css',
            'spinkit/css/spinkit.css',
            '../css/soal.show.css'
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
              <i class="icon fad fa-search"></i>
              <div>
                  <h4>Preview Soal</h4>
                  <p class="mg-b-0">Soal Ujian Masuk Universitas AMIKOM Yogyakarta</p>
              </div>
          </div><!-- d-flex -->

        <div class="br-pagebody">
          <div class="br-section-wrapper position-relative mb-4">
            <div data-id="<?php echo $id;?>" id="examCarousel" class="exam slide">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="container">
                    <div class="col-md-12">
                      <div class="question-main">
                        <div class="title">
                          <span>2-Lorem ipsum do yo lorem acc actual expoumd bla bla ?</span>
                          <img src="https://via.placeholder.com/300x560.png"/>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="answer check">
                              <div class="radio">
                                <input type="radio" id="radio20" name="text">
                                <label class="a" for="radio20">
                                  <!-- <span>hello</span> -->
                                  <img src="https://via.placeholder.com/360x360.png"/>
                                </label>
                              </div>
                            </div>
                            <!--answer-->
                          </div>
                          <div class="col-md-12">
                            <div class="answer check">
                              <div class="radio">
                                <input type="radio" id="radio21" name="text">
                                <label class="b" for="radio21"><span>hello codepen!</span></label>
                              </div>
                            </div>
                            <!--answer-->
                          </div>

                          <div class="col-md-12">
                            <div class="answer check">
                              <div class="radio">
                                <input type="radio" id="radio22" name="text">
                                <label class="c" for="radio22"><span>hello world</span></label>
                              </div>
                            </div>
                            <!--answer-->
                          </div>
                        </div>
                        <!--./row-->
                      </div>
                      <!--./question-main-->
                    </div>
                  </div>
                  <!-- <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatem rem, voluptatum quo incidunt architecto nobis accusamus adipisci cupiditate nihil odio. Consequatur, quis. Impedit voluptatem modi deserunt iste, dicta veniam?
                  </p>
                  <br/>
                  <ol type="A">  
                    <li>HTML</li>  
                    <li>Java</li>  
                    <li>JavaScript</li>  
                    <li>SQL</li>  
                  </ol>   -->
                </div>
                <div class="carousel-item">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatem rem, voluptatum quo incidunt architecto nobis accusamus adipisci cupiditate nihil odio. Consequatur, quis. Impedit voluptatem modi deserunt iste, dicta veniam?
                  </p>
                  <br/>
                  <ol type="A">  
                    <li>HTML</li>  
                    <li>Java</li>  
                    <li>JavaScript</li>  
                    <li>SQL</li>  
                  </ol>
                </div>
                <div class="carousel-item">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatem rem, voluptatum quo incidunt architecto nobis accusamus adipisci cupiditate nihil odio. Consequatur, quis. Impedit voluptatem modi deserunt iste, dicta veniam?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos voluptatem rem, voluptatum quo incidunt architecto nobis accusamus adipisci cupiditate nihil odio. Consequatur, quis. Impedit voluptatem modi deserunt iste, dicta veniam?
                  </p>
                  <br/>
                  <ol type="A">  
                    <li>HTML</li>  
                    <li>Java</li>  
                    <li>JavaScript</li>  
                    <li>SQL</li>  
                  </ol>
                </div>
              </div>
              
              <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a> -->
            </div>
           
          </div><!-- br-section-wrapper -->
          <ol class="exam-indicators bg-primary">
              <li data-target="#examCarousel" data-slide-to="0" class="active">
                <span>1</span>
              </li>
              <li data-target="#examCarousel" data-slide-to="1">
                <span>2</span>
              </li>
              <li data-target="#examCarousel" data-slide-to="2">
                <span>3</span>
              </li>
            </ol>
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
            'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js',
            // 'datatables.net/js/jquery.dataTables.min.js',
            // 'datatables.net-dt/js/dataTables.dataTables.min.js',
            'datatables.net-responsive/js/dataTables.responsive.min.js',
            'datatables.net-responsive-dt/js/responsive.dataTables.min.js',
            '../js/soal.show.js'
        ]
    ]);?>
    <?php 
        if (isset($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
</html>
