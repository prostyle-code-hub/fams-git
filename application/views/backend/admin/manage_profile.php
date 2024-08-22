<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= get_phrase('user_profile') ?> /</span> <?= get_phrase('profile') ?></h4>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">

                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img
                            src="../../assets/img/avatars/14.png"
                            alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                            />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <?php //print_r($logged_in_user_details); ?>
                                <h4><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item"><i class="ti ti-user-circle"></i> 
                                        <?php
                                        if ($this->session->userdata('roleme')) {
                                            echo $this->session->userdata('roleme');
                                        }
                                        ?></li>
<!--                                    <li class="list-inline-item"><i class="ti ti-map-pin"></i> Vatican City</li> -->
                                    <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined <?php echo date('d M Y', $payout['date_added']); ?></li>
                                </ul>
                            </div>
                            <!--                            <a href="javascript:void(0)" class="btn btn-primary">
                                                            <i class="ti ti-user-check me-1"></i>Connected
                                                        </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-sm-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);" ><i class="ti-xs ti ti-user-check me-1"></i><?= get_phrase('profile') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('user/user_form/edit_user_form/' . $logged_in_user_details['id']) ?>">
                        <i class="ti-xs ti ti-users me-1"></i><?= get_phrase('edit') ?></a>
                </li>

            </ul>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase"><?= get_phrase('about') ?></small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user"></i><span class="fw-bold mx-2"><?= get_phrase('name') ?>:</span> <span><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-check"></i><span class="fw-bold mx-2"><?= get_phrase('status') ?>:</span> <span>Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-crown"></i><span class="fw-bold mx-2"><?= get_phrase('role') ?>:</span> <span><?php echo $this->session->userdata('roleme'); ?></span>
                        </li>
                        
                        
                    </ul>
                    

                </div>
            </div>

        </div>

    </div>
    <!--/ User Profile Content -->
</div>
<!-- / Content -->