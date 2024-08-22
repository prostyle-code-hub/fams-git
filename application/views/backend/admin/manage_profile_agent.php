<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAS3200 | View Agent Information (Logged in agent Profile)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('myprofile').style = 'background-color: #7467f0;color: white;';
</script>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-8">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Agent') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('My Profile') ?></span></h6>
        </div>
        <div class="col-md-4" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
                <a type="button" class="btn btn-secondary waves-effect waves-light"  href="<?php echo site_url('user/user_form/edit_user_form/' . $logged_in_user_details['id']) ?>"><?= get_phrase('Modify') ?></a>
            </div>

        </div>
    </div>

    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">

                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img
                            src="../../assets/img/avatars/pro.gif"
                            alt="user image"
                            class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
                            style="width: 130px;" />
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

                                    <li class="list-inline-item">
                                        <i class="ti ti-calendar"></i> 
                                        <?= get_phrase('Joined') ?> <?php echo date('d M Y', $this->session->userdata('join_date')); ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->


    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <!-- About User -->
            <div class="card mb-4">
                <?php foreach ($edit_data->result_array() as $key => $agent) : ?>
                    <div class="card-body">
                        <small class="card-text text-uppercase"><?= get_phrase('about') ?></small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-user"></i><span class="fw-bold mx-2"><?= get_phrase('name') ?>:</span> <span><?php echo $agent['first_name'] . ' ' . $agent['last_name']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-check"></i><span class="fw-bold mx-2"><?= get_phrase('status') ?>:</span> <span>Active</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-crown"></i><span class="fw-bold mx-2"><?= get_phrase('role') ?>:</span> <span><?php echo $this->session->userdata('roleme'); ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-flag"></i><span class="fw-bold mx-2"><?= get_phrase('country') ?>:</span> <span><?php echo ucfirst($agent['country']) ?></span>
                            </li>

                        </ul>
                        <small class="card-text text-uppercase"><?= get_phrase('contact') ?></small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-phone-call"></i><span class="fw-bold mx-2"><?= get_phrase('phone') ?>:</span>
                                <span><?php echo $agent['phone']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-brand-skype"></i><span class="fw-bold mx-2"><?= get_phrase('skype') ?>:</span>
                                <span><?php echo $agent['skype']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-mail"></i><span class="fw-bold mx-2"><?= get_phrase('email') ?>:</span>
                                <span><?php echo $agent['email']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-flag"></i><span class="fw-bold mx-2"><?= get_phrase('school') ?>:</span>
                                <span><?php echo $agent['school']; ?></span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="ti ti-user"></i><span class="fw-bold mx-2"><?= get_phrase('representative_name') ?>:</span>
                                <span><?php echo $agent['representative_name']; ?></span>
                            </li>
                        </ul>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>
    <!--/ User Profile Content -->
</div>
<!-- / Content -->