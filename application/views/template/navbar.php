<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
    <div class="br-header-left">
        
        <div class="navicon-left hidden-md-down">
            <a id="btnLeftMenu" href="">
                <i class="icon ion-navicon-round"></i>
            </a>
        </div>
        
        <div class="navicon-left hidden-lg-up">
            <a id="btnLeftMenuMobile" href="">
                <i class="icon ion-navicon-round"></i>
            </a>
        </div>
<!-- 
        <div class="input-group hidden-xs-down wd-170 transition">
            <input id="searchbox" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>input-group -->

    </div><!-- br-header-left -->

    <div class="br-header-right">
        <div class="logout-section">
            <a id="btnLogout" href="" class="pos-relative">
            <!-- <i class="icon ion-ios-chatboxes-outline"></i> -->
            <!-- start: if statement -->
            <a href="<?php echo base_url('logout');?>"><button class="btn btn-danger">LOGOUT</button></a>
            <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->

    </div><!-- br-header-right -->
</div><!-- br-header -->
<!-- ########## END: HEAD PANEL ########## -->
