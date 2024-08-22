<?php if (get_frontend_settings('recaptcha_status')): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS0100 | Forgot User Password</span> <!-- / UI Number -->
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?php echo base_url() . 'assets/img/illustrations/validate-user.png '; ?>" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" />
                <div>
                    <img src="<?php echo base_url() . 'assets/img/branding/logo-icon.png'; ?>" alt="Logo-Icon" class="app-brand-logo" />
                </div>
                <img src="<?php echo base_url() . 'assets/img/illustrations/bg-shape-image-light.png'; ?>" alt="auth-login-cover" class="platform-bg" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Reset Password -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
            <div class="w-px-400 mx-auto">
                <!-- Logo --><!--
                
                <!-- /Logo -->
                <h6 class="mb-1 fw-bold"><?= get_phrase('reset_password') ?></h6>
                <p class="mb-4" style="font-size:12px;"><?= get_phrase('reset_password_text') ?></p>
                <form id="formAuthentication" class="mb-3" action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="email"><?= get_phrase('your_name') ?></label>
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control" id="username" name="your_name" placeholder="" autofocus />
                            <span class="input-group-text cursor-pointer"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirm-password"><?= get_phrase('email') ?></label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text" id="email" class="form-control" name="email" autofocus />
                            <span class="input-group-text cursor-pointer"></i></span>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100 mb-3"><?= get_phrase('submit') ?></button>
                </form>
                <div class="divider my-4">
                    <div class="divider-text"><?= get_phrase('or') ?></div>
                </div>
                <p class="text-center">
                    <span><?= get_phrase('remember_your_password') ?></span>
                    &nbsp;<a href="<?php echo site_url('login'); ?>">
                        <span><?= get_phrase('login') ?></span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Reset Password -->
    </div>
</div>