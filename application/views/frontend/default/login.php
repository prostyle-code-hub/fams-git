
<?php if (get_frontend_settings('recaptcha_status')): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS0000 | FAMS User login Screen</span> <!-- / UI Number -->
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="<?php echo base_url() . 'assets/img/illustrations/auth-login-illustration-light.png '; ?>" alt="auth-login-cover" class="img-fluid my-5 auth-illustration" />
                <div>
                    <img src="<?php echo base_url() . 'assets/img/branding/logo-icon.png'; ?>" alt="Logo-Icon" class="app-brand-logo" />
                </div>
                <img src="<?php echo base_url() . 'assets/img/illustrations/bg-shape-image-light.png'; ?>" alt="auth-login-cover" class="platform-bg" />
            </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">

                </div>
                <!-- /Logo -->

                <p class="mb-4"><?= get_phrase('welcome_txt'); ?></p>

                <form id="formAuthentication" class="mb-3" action="<?php echo site_url('login/validate_login/user'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label"><?= get_phrase('email_or_username'); ?></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="<?= get_phrase('ph_email_or_username'); ?>" autofocus />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password"><?= get_phrase('password'); ?></label>
                            <a href="<?php echo site_url('home/forgot_password'); ?>">
                                <small><?= get_phrase('forgot_password') ?></small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> <?= get_phrase('remember_me') ?> </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100"><?= get_phrase('sign_in') ?></button>
                </form>
<small><?= get_phrase('Release version') ?>: Beta V1.7.26</small>
                
 
            </div>
        </div>
        <!-- /Login -->
    </div>
</div>
