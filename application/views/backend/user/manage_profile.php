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
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
                            >
                            <div class="user-profile-info">
                                <h4><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></h4>
                                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item"><i class="ti ti-user-circle"></i> 
                                        <?php
                                        if ($this->session->userdata('roleme')) {
                                            echo $this->session->userdata('roleme');
                                        }
                                        ?></li>
<!--                                    <li class="list-inline-item"><i class="ti ti-map-pin"></i> Vatican City</li>
                                    <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined April 2021</li>-->
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
                    <a class="nav-link active" href="javascript:void(0);"
                       ><i class="ti-xs ti ti-user-check me-1"></i> Profile</a
                    >
                </li>
                <!--                <li class="nav-item">
                                    <a class="nav-link" href="pages-profile-teams.html"
                                       ><i class="ti-xs ti ti-users me-1"></i> Teams</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-profile-projects.html"
                                       ><i class="ti-xs ti ti-layout-grid me-1"></i> Projects</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages-profile-connections.html"
                                       ><i class="ti-xs ti ti-link me-1"></i> Connections</a
                                    >
                                </li>-->
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
                    <small class="card-text text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span>Active</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span><?php echo $this->session->userdata('roleme'); ?></span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-flag"></i><span class="fw-bold mx-2">Country:</span> <span>Japan</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-file-description"></i><span class="fw-bold mx-2">Languages:</span>
                            <span>English</span>
                        </li>
                    </ul>
                    <small class="card-text text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span>
                            <span>(123) 456-7890</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-brand-skype"></i><span class="fw-bold mx-2">Skype:</span>
                            <span>john.doe</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span>
                            <span>john.doe@example.com</span>
                        </li>
                    </ul>
<!--                    <small class="card-text text-uppercase">Teams</small>
                    <ul class="list-unstyled mb-0 mt-3">
                        <li class="d-flex align-items-center mb-3">
                            <i class="ti ti-brand-angular text-danger me-2"></i>
                            <div class="d-flex flex-wrap">
                                <span class="fw-bold me-2">Backend Developer</span><span>(126 Members)</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <i class="ti ti-brand-react-native text-info me-2"></i>
                            <div class="d-flex flex-wrap">
                                <span class="fw-bold me-2">React Developer</span><span>(98 Members)</span>
                            </div>
                        </li>
                    </ul>-->
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Overview -->
            <!--            <div class="card mb-4">
                            <div class="card-body">
                                <p class="card-text text-uppercase">Overview</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-check"></i><span class="fw-bold mx-2">Task Compiled:</span> <span>13.5k</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="ti ti-layout-grid"></i><span class="fw-bold mx-2">Projects Compiled:</span>
                                        <span>146</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="ti ti-users"></i><span class="fw-bold mx-2">Connections:</span> <span>897</span>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
            <!--/ Profile Overview -->
        </div>
        
    </div>
    <!--/ User Profile Content -->
</div>
<!-- / Content -->