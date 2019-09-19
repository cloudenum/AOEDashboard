<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/head', [
        'css' => [
            'rickshaw/rickshaw.min.css'
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
            <i class="icon fad fa-home"></i>
            <div>
                <h4>Welcome, <?php echo $this->session->username;?></h4>
                <p class="mg-b-0">Great power comes with great responsibility.</p>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">

        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-info rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-person tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Peserta Ujian</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">6</p>
                  <!-- <span class="tx-11 tx-roboto tx-white-8">24% higher yesterday</span> -->
                </div>
              </div>
              <div id="ch1" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-purple rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-scroll tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Soal</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">2</p>
                  <!-- <span class="tx-11 tx-roboto tx-white-8">$390,212 before tax</span> -->
                </div>
              </div>
              <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-users-cog tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Admin</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">8</p>
                  <!-- <span class="tx-11 tx-roboto tx-white-8">23% average duration</span> -->
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-frown tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Presentase Kecurangan</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">10.16%</p>
                  <!-- <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span> -->
                </div>
              </div>
              <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
          <div class="col-lg-12 mg-t-20 mg-lg-t-0 mg-b-20">

            <div class="card shadow-base bd-0 overflow-hidden">
              <div class="pd-x-25 pd-t-25">
                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1 mg-b-20">Grafik Kecurangan</h6>
                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase mg-b-0">Rata rata dalam 1 bulan</p>
                <h1 class="tx-56 tx-light tx-inverse mg-b-0">10<span class="tx-teal tx-24">%</span></h1>
                <!-- <p><span class="tx-primary">80%</span> of free space remaining</p> -->
              </div><!-- pd-x-25 -->
              <div id="ch6" class="ht-115 mg-r--1"></div>
              <div class="bg-teal pd-x-25 pd-b-25 d-flex justify-content-between">
                <div class="tx-center">
                  <h3 class="tx-lato tx-white mg-b-5">6<span class="tx-light op-8 tx-20">orang</span></h3>
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Total Peserta</p>
                </div>
                <div class="tx-center">
                  <h3 class="tx-lato tx-white mg-b-5">10.16<span class="tx-light op-8 tx-20">%</span></h3>
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Tingkat kecurangan hari ini</p>
                </div>
                <div class="tx-center">
                  <h3 class="tx-lato tx-white mg-b-5">4<span class="tx-light op-8 tx-20">lulus</span></h3>
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-0 tx-white-8">Peserta Lulus</p>
                </div>
              </div>
            </div><!-- card -->


          </div><!-- col-4 -->
        </div><!-- row -->
        </div><!-- br-pagebody -->
        <?php $this->load->view('template/footer');?>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php $this->load->view('template/js', [
        'js' => [
            'rickshaw/vendor/d3.min.js',
            'rickshaw/vendor/d3.layout.min.js',
            'rickshaw/rickshaw.min.js',
            '../js/ResizeSensor.js',
            // '../js/dashboard.js',
        ]
    ]);?>
    <?php 
        if (isset($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
</body>
    <script>
        var ch6 = new Rickshaw.Graph({
    element: document.querySelector('#ch6'),
    renderer: 'area',
    max: 50,
    series: [{
      data: [
        { x: 0, y: 40 },
        { x: 1, y: 49 },
        { x: 2, y: 38 },
        { x: 3, y: 30 },
        { x: 4, y: 32 },
        { x: 5, y: 40 },
        { x: 6, y: 20 },
        { x: 7, y: 10 },
        { x: 8, y: 20 },
        { x: 9, y: 25 },
        { x: 10, y: 35 },
        { x: 11, y: 20 },
        { x: 12, y: 40 }
      ],
      color: '#1CAF9A'
    }]
  });
  ch6.render();

  // Responsive Mode
  new ResizeSensor($('.br-mainpanel'), function(){
    ch6.configure({
      width: $('#ch6').width(),
      height: $('#ch6').height()
    });
    ch6.render();
  });
    </script>

</html>
