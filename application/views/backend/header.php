<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php //echo base_url('uploads/system/' . get_frontend_settings('light_logo')); ?>" alt="" height="40">
            </span>
            <span class="topnav-logo-sm">
                <img src="<?php //echo base_url('uploads/system/' . get_frontend_settings('small_logo')); ?>" alt="" height="40">
            </span>
        </a>

        
        <a class="button-menu-mobile disable-btn">
            <div class="lines">
                <span><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="visit_website">
            <h4 style="color: #fff; float: left;" class="d-none d-md-inline-block"> <?php echo $this->db->get_where('settings', array('key' => 'system_name'))->row()->value; ?></h4>
            <a href="<?php echo site_url('home'); ?>" target="" class="btn btn-outline-light ml-3 d-none d-md-inline-block"><?php echo get_phrase('visit_website'); ?></a>
        </div>
    </div>
</div>
<!-- end Topbar -->