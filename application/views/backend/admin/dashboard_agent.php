<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS1200 | Agent Dashboard</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y" >
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0"><?php echo get_phrase('Statics information'); ?></h5>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-6">
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill me-3 p-2">
                                        <img src="<?php echo base_url('assets/img/elements/regi.gif'); ?>" alt="Application Created" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Number of registered applicants'); ?>" style="width: 60px;">
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?php echo $wid_reg_applicants; ?></h5>
                                        <small style="font-size: x-small;">
                                            <?php echo get_phrase('Number of registered applicants'); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill  me-3 p-2">
                                        <img src="<?php echo base_url('assets/img/elements/App_done.gif'); ?>" alt="Application Created" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Number of applicants with all required application forms registered'); ?>" style="width: 60px;">
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?php echo $wid_req_applicants; ?></h5>
                                        <small style="font-size: x-small;">
                                            <?php echo get_phrase('Number of applicants with all required application forms registered'); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill  me-3 p-2">
                                        <img src="<?php echo base_url('assets/img/elements/doc-in.gif'); ?>" alt="Application Created" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('No.of applicant with not completed'); ?>" style="width: 60px;">
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?php echo $wid_app_not_completed; ?></h5>
                                        <small style="font-size: x-small;">
                                            <?php echo get_phrase('No.of applicant with not completed'); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill me-3 p-2">
                                        <img src="<?php echo base_url('assets/img/elements/completed.gif'); ?>" alt="Application Created" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('No.of applicant with completed'); ?>" style="width: 60px;">
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0"><?php echo $wid_app_completed; ?></h5>
                                        <small style="font-size: x-small;">
                                            <?php echo get_phrase('No.of applicant with completed'); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">

                                <h5 class="card-title mb-0">Hi !  <br><?php echo $logged_in_user_details['first_name'];  ?></h5>
                                <span><?php echo get_phrase('Wlecome to FAMS'); ?></span><br>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?php echo base_url('assets/img/illustrations/card-advance-sale.png'); ?>" height="140" alt="view sales">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>