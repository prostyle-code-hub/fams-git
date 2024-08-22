<?php if (get_frontend_settings('recaptcha_status')): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?php echo base_url() . 'assets/img/illustrations/change-pwd.png '; ?>" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" />
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

                <h6 class="mb-1 fw-bold"  style="font-size:14px;"><?= get_phrase('activate_account') ?></h6>
                
                <form id="formAuthentication" class="mb-3" action="<?php echo site_url('login/activate_agent/'); ?>" method="POST">
                    <label class="form-label" for="reset-code"><?= get_phrase('verification_code') ?></label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="reset-code" class="form-control" name="reset_code" value="<?php echo $code ?>" disabled />
                        <input type="hidden" name="reset_code" value="<?php echo $code ?>"/>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password"><?= get_phrase('new_password') ?></label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="new_password" placeholder="" aria-describedby="password" autofocus/>
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="confirm-password"><?= get_phrase('confirm_password') ?></label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="confirm-password" class="form-control" name="confirm_password" placeholder="" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100 mb-3"><?= get_phrase('activate_account') ?></button>
                </form>
                <div class="divider my-4">
                    <div class="divider-text"><?= get_phrase('or') ?></div>
                </div>
                <p class="text-center">
                    <span><?= get_phrase('have_account') ?></span>
                    &nbsp;<a href="<?php echo site_url('login'); ?>">
                        <span><?= get_phrase('login') ?></span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Reset Password -->
    </div>
</div>
