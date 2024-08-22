<?php if (get_frontend_settings('recaptcha_status')): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
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
                <div class="app-brand mb-4">
                  <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                      <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                          fill="#7367F0"
                        />
                        <path
                          opacity="0.06"
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                          fill="#161616"
                        />
                        <path
                          opacity="0.06"
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                          fill="#161616"
                        />
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                          fill="#7367F0"
                        />
                      </svg>
                    </span>
                  </a>
                </div>-->
                <!-- /Logo -->
                <h6 class="mb-1 fw-bold">Reset My Password </h6>
                <p class="mb-4" style="font-size:12px;">Please check your email inbox or spam after you submit the details below. New password reset link will be shared to your email.</p>
                <form id="formAuthentication" class="mb-3" action="auth-login-cover.html" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="email">Enter Your Name</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="email-username"
                                placeholder=""
                                autofocus
                                />
                            <span class="input-group-text cursor-pointer"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="confirm-password">Email</label>
                        <div class="input-group input-group-merge">
                            <input
                                type="text"
                                id="email"
                                class="form-control"
                                name="email"
                                autofocus
                                />
                            <span class="input-group-text cursor-pointer"></i></span>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100 mb-3">Submit</button>
                </form>
                <div class="divider my-4">
                    <div class="divider-text">or</div>
                </div>
                <p class="text-center">
                    <span>Remember Your Password ?  </span>
                    &nbsp;<a href="<?php echo site_url('login'); ?>">
                        <span>Login</span>
                    </a>
                </p>
            </div>
        </div>
        <!-- /Reset Password -->
    </div>
</div>