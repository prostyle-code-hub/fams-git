<?php if (get_frontend_settings('recaptcha_status')): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS0110</span> <!-- UI Number -->
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?php echo base_url() . 'assets/img/illustrations/time-out.png '; ?>" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" />
                <div>
                    <img src="<?php echo base_url() . 'assets/img/branding/logo-icon.png'; ?>" alt="Logo-Icon" class="app-brand-logo" />
                </div>
                <img src="<?php echo base_url() . 'assets/img/illustrations/bg-shape-image-light.png'; ?>" alt="auth-login-cover" class="platform-bg" />

            </div>
        </div>
        <!-- /Left Text -->

        <!--  Verify email -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-4 p-sm-5">
            <div class="w-px-400 mx-auto">


                <h6 class="mb-1 fw-bold"><?= get_phrase('time_out') ?></h6>
                <p class="mb-4" style="font-size:12px;">for <span class="fw-bold"><?php echo $_SESSION['your_name']; ?></span></p>
                <form id="formAuthentication" class="mb-3" action="auth-login-cover.html" method="POST">
                    <label class="form-label" for="reset-code"><?= get_phrase('reset_code') ?></label>
                    <div class="input-group input-group-merge">
                        <input type="text" id="reset-code" class="form-control" name="reset-code" autofocus value="<?php echo $verification_code ?>"/>
                        <span class="input-group-text cursor-pointer"></span>
                    </div>
                </form>
                <!--<a class="btn btn-primary w-100 mb-3" href="index.html"> Skip for now </a>-->
                <p class="mb-4" style="font-size:14px;"><?= get_phrase('expire_note') ?></p>
                <p class="mb-4" style="font-size:14px;"><a href="<?php echo site_url('login'); ?>"> <?= get_phrase('re_request') ?></a></p>
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
        <!-- / Verify email -->
    </div>
</div>
