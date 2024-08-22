<?php
$system_name = $this->db->get_where('settings', array('key' => 'system_name'))->row()->value;
$system_title = $this->db->get_where('settings', array('key' => 'system_title'))->row()->value;
$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
$text_align = $this->db->get_where('settings', array('key' => 'text_align'))->row()->value;
$logged_in_user_role = strtolower($this->session->userdata('role'));
?>
<script type="text/javascript">
    function zoom() {
        document.body.style.zoom = "90%"
    }
</script>

<!DOCTYPE html>
<html onload="zoom()">
    <head>
        <title><?php echo get_phrase($page_title); ?> <?php echo "| FAMS"; ?></title>
        <!-- all the meta tags -->
        <?php include 'metas.php'; ?>
        <!-- all the css files -->
        <?php include 'includes_top.php'; ?>
    </head>
    <body data-layout="detached" >
        <!-- HEADER -->
        <?php //include 'header.php'; ?>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->

                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="<?php echo base_url() ?>" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img src="<?php echo base_url() . 'assets/img/logo.png' ?>" height="25px"/>
                            </span>
                            <span class="app-brand-text demo menu-text fw-bold" style="color: #7367f0;">FAMS</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    if (($role_id == 1) || ($role_id == 2)) {
                        include 'domestic_user/navigation.php';
                    } else {
                        include 'agent/navigation.php';
                    }
                    ?>
                   

                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" >
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="ti ti-menu-2 ti-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <Small>

                                <?php
                                $user = ( $this->session->userdata('role'));

                                if ($user == 'Agent') {

                                    echo get_phrase('You have logged as Agent');
                                } elseif ($user == 'Domestic') {
                                    echo get_phrase('You have logged as Domestic User');
                                }
                                ?>
                            </Small>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- Language --------------------------------------------------------------------------------------------------------------------------------------------->
                                <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <?php if ($this->session->userdata('language') == 'japanese') { ?> <i class="fi fi-jp fis rounded-circle me-1 fs-3"></i>   <?php } ?>
                                        <?php if ($this->session->userdata('language') == 'english') { ?> <i class="fi fi-gb fis rounded-circle me-1 fs-3"></i> <?php } ?>                                        
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="switch_language('<?php echo strtolower('english'); ?>')">
                                                <i class="fi fi-gb fis rounded-circle me-1 fs-3"></i>
                                                <span class="align-middle"><?= get_phrase('en_language') ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="switch_language('<?php echo strtolower('japanese'); ?>')" data-language="ja">
                                                <i class="fi fi-jp fis rounded-circle me-1 fs-3"></i>
                                                <span class="align-middle"><?= get_phrase('jp_language') ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ Language -------------------------------------------------------------------------------------------------------------------------------------------->
                                <!-- Style Switcher -->

                                <!--/ Style Switcher -->

                                <!-- Quick links  -->

                                <!-- Quick links -->

                                <!-- Notification -->
                                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                    <a
                                        class="nav-link dropdown-toggle hide-arrow"
                                        href="javascript:void(0);"
                                        data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside"
                                        aria-expanded="false"
                                        >
                                        <i class="ti ti-bell ti-md"></i>
                                        <!--<span class="badge bg-danger rounded-pill badge-notifications">2</span>-->
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end py-0">
                                        <li class="dropdown-menu-header border-bottom">
                                            <div class="dropdown-header d-flex align-items-center py-3">
                                                <h5 class="text-body mb-0 me-auto"><?= get_phrase('notifications') ?></h5>
                                                <!--                                                <a
                                                                                                    href="javascript:void(0)"
                                                                                                    class="dropdown-notifications-all text-body"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-placement="top"
                                                                                                    title="Mark all as read"
                                                                                                    ><i class="ti ti-mail-opened fs-4"></i
                                                                                                    ></a>-->
                                            </div>
                                        </li>
                                        <li class="dropdown-notifications-list scrollable-container">
                                            <!--                                            <ul class="list-group list-group-flush">
                                                                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                                                                <div class="d-flex">
                                                                                                    <div class="flex-shrink-0 me-3">
                                                                                                        <div class="avatar">
                                                                                                            <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="flex-grow-1">
                                                                                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                                                                                        <p class="mb-0">Won the monthly best seller gold badge</p>
                                                                                                        <small class="text-muted">1h ago</small>
                                                                                                    </div>
                                                                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                                                                                                           ><span class="badge badge-dot"></span
                                                                                                            ></a>
                                                                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                                                                                           ><span class="ti ti-x"></span
                                                                                                            ></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                                                                <div class="d-flex">
                                                                                                    <div class="flex-shrink-0 me-3">
                                                                                                        <div class="avatar">
                                                                                                            <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="flex-grow-1">
                                                                                                        <h6 class="mb-1">Charles Franklin</h6>
                                                                                                        <p class="mb-0">Accepted your connection</p>
                                                                                                        <small class="text-muted">12hr ago</small>
                                                                                                    </div>
                                                                                                    <div class="flex-shrink-0 dropdown-notifications-actions">
                                                                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"
                                                                                                           ><span class="badge badge-dot"></span
                                                                                                            ></a>
                                                                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"
                                                                                                           ><span class="ti ti-x"></span
                                                                                                            ></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                            
                                                                                        </ul>-->
                                        </li>
                                        <li class="dropdown-menu-footer border-top">
                                            <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center" >
                                                <?= get_phrase('view_all_notifications') ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ Notification -->

                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="<?php echo base_url() . 'assets/img/avatars/pro.gif" alt class="h-auto rounded-circle'; ?>"/>
                                        </div>
                                    </a>
                                    <?php $this_user_role = strtolower($this->session->userdata('role')); ?>
                                    <?php
                                    if ($this_user_role == 'agent') {
                                        $profile_link = site_url('user/manage_profile_agent');
                                    } else {
                                        $profile_link = site_url('user/manage_profile_domestic');
                                    }
                                    ?>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $profile_link ?>">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">
                                                            <img src="<?php echo base_url() . 'assets/img/avatars/pro.gif'; ?>" alt class="h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <?php
                                                        $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
                                                        ?>
                                                        <span class="fw-semibold d-block"><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></span>
                                                        <small class="text-muted"><?php
                                                            //echo strtolower($this->session->userdata('role')) == 'user' ? get_phrase('instructor') : get_phrase('admin');
                                                            if ($this->session->userdata('roleme')) {

                                                                get_phrase($this->session->userdata('roleme'));
                                                                $this->session->userdata('roleme');
                                                            }
                                                            ?>
                                                            <?= get_phrase($this->session->userdata('roleme')); ?>
                                                        </small>

                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo $profile_link ?>">
                                                <i class="ti ti-user-check me-2 ti-sm"></i>
                                                <span class="align-middle"><?= get_phrase('my_profile'); ?></span>
                                            </a>
                                        </li>

                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">
                                                <i class="ti ti-logout me-2 ti-sm"></i>
                                                <span class="align-middle"><?= get_phrase('logout'); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>

                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper d-none">


                        </div>
                    </nav>

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->


                        <?php include 'admin/' . $page_name . '.php'; ?>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                                 >
                                <div>
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , Prostyle Technology Pvt Ltd | <small><?= get_phrase('Release Version'); ?>: Beta V1.7.26 </small>
                                </div>
                            
                                <div>
<!--                                    <a href="#" class="footer-link me-4" target="_blank" ><?= get_phrase('product_license'); ?></a>                                   
                                    <a href="#" target="_blank" class="footer-link me-4" ><?= get_phrase('document'); ?></a>-->
                                    <a href="<?= get_phrase('MANUAL URL'); ?>" target="_blank" class="footer-link d-none d-sm-inline-block" ><?= get_phrase('support'); ?></a>
									 
                                </div>
                                 
                            </div>
                           
                        </div>
                        
                    </footer>
                    
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- all the js files -->
    <?php include 'includes_bottom.php'; ?>
    <?php include 'modal.php'; ?>
    <?php include 'common_scripts.php'; ?>
</body>
</html>
