<?php
 if ($this->config->load('navlinks')) {
    $navlinks = $this->session->is_admin ? $this->config->item('admin_navlinks') : $this->config->item('participants_navlinks');
    $active_navlinks = $this->config->item('active_navlinks');
    $active_child_navlinks = $this->config->item('active_child_navlinks');
    // echo '<pre>';print_r($navlinks);echo '</pre>';
?>
<!-- ########## START: LEFT PANEL ########## -->
 <div class="br-logo"><a href=""><img class="img-fluid p-4 mx-auto" src="http://amikom.ac.id/theme/material/custom/images/logos/icon_text/icontext_amikom_100p.png" alt="Amikom logo"/></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <?php 
        foreach ($navlinks as $index => $value) {
            if (!empty($value['child'])) {
        ?>
                <li class="br-menu-item">
                    <a href="#" class="br-menu-link with-sub <?php if($index === $active_navlinks) echo 'active';?>">
                        <i class="menu-item-icon fal fa-<?php echo $value['icon']; ?> tx-20"></i>
                        <span class="menu-item-label"><?php echo $value['name']; ?></span>
                    </a><!-- br-menu-link -->
                    
                    <ul class="br-menu-sub">
                    <?php
                    foreach ($value['child'] as $child_index => $child) { ?>
                        <li class="sub-item">
                            <a href="<?php echo $child['link']; ?>" class="sub-link <?php if($child_index === $active_child_navlinks) if ($index === $active_navlinks) echo 'active';?>"><?php echo $child['name']; ?></a>
                        </li>
                    <?php
                    } ?>
                    </ul>
                </li><!-- br-menu-item -->
        <?php
            } else {
        ?> 
                <li class="br-menu-item">
                    <a href="<?php echo $value['link']; ?>" class="br-menu-link <?php if($index === $active_navlinks) echo 'active';?>">
                        <i class="menu-item-icon icon fal fa-<?php echo $value['icon']; ?> tx-20"></i>
                        <span class="menu-item-label"><?php echo $value['name']; ?></span>
                    </a><!-- br-menu-link -->
                </li><!-- br-menu-item -->
        <?php    
            }
        }
        ?>

      </ul><!-- br-sideleft-menu -->

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
<?php
}
?>
