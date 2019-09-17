<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/head.php');?>
<body>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center mg-b-60">
                <!-- <span class="tx-normal">[</span> bracket <span class="tx-info">plus</span><span class="tx-normal">]</span> -->
                <img class="img-fluid mx-auto" src="http://amikom.ac.id/theme/material/custom/images/logos/icon_text/icontext_amikom_100p.png" alt="Amikom logo"/>
            </div>
            <!-- <div class="tx-center mg-b-60">The Admin Template For Perfectionist</div> -->
            
            <form id="loginForm" action=<?php echo site_url('/login/auth')?> method="post">
                <div class="form-group">
                    <input type="text" name="login" class="form-control" placeholder="Enter your username" required>
                </div><!-- form-group -->

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                
                <button id="loginBtn" type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>
            <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> -->
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <?php 
    // var_dump($alert);
        if (isset($alert)) {
            $this->load->view('alert', $alert);
        }
    ?>
    <script src=<?php echo base_url('assets/js/main.js') ?>></script>
    <script src=<?php echo base_url("assets/js/login.js")?>></script>
</body>
</html>
