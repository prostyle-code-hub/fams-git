<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS4110 | New Domestic User Registration</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">   
<form action="<?php echo site_url('user/add_domestic'); ?>" enctype="multipart/form-data" method="post">
<div class="row">
            <div class="col-md-7">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('domestic_user') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('new_domestic_user') ?></span></h6>
            </div>
            <div class="col-md-5" style="text-align: right;">

                <div class="btn-group" role="group" aria-label="Button Set">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('View') ?></button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('Modify') ?></button>
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/domestic/"><?= get_phrase('Back') ?></a>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light"><?php echo get_phrase('Clear'); ?></button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Save') ?></button>
                </div>

            </div>
        </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">                  
                <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Create Domestic user') ?></h5>
                            </div>
                            <hr>
                        
                            <div class="row g-3">

                                <!-- Row 1 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="first_name"><?= get_phrase('first_name') ?></label>
                                    <input type="text" id="first_name" name="first_name" class="form-control mandatory" placeholder="" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="last_name"><?= get_phrase('last_name') ?></label>
                                    <input type="text" id="last_name" name="last_name" class="form-control mandatory" placeholder="" required/>
                                </div>

                                <!-- Row 6 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="contact_email"><?= get_phrase('contact_email') ?></label>
                                    <input type="email" id="contact_email" name="email" class="form-control mandatory" placeholder="" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="skype_id"><?= get_phrase('skype_id') ?></label>
                                    <input type="text" id="skype_id" name="skype" class="form-control" placeholder="" />
                                </div>                           

                                <!-- Row 7-->

                                <div class="col-sm-6">
                                    <label class="form-label" for="temporary_password"><?= get_phrase('Default password') ?></label>
                                    <input type="hidden" name="temporary_password" value="<?php echo $temp_pw ?>"/>
                                    <input type="text" id="" class="form-control" disabled value="<?php echo $temp_pw ?>"/>
                                </div>   
                                <div class="col-sm-6"style="padding-top: 20px;">
                                    <small ><?= get_phrase('Login credientials with the default password will be sent to domestic user`s email address. Default password can be cahanged after login to their account.') ?></small>
                                </div>


                            </div>
                        </form>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
</div>