<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS6100 | Edit Domestic user Profile</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">   

    <div class="row">
        <div class="col-xl-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= get_phrase('domestic_user') ?> /</span> <?= get_phrase('edit_domestic_user_profile') ?></h4>
        </div>
        <div class="col-xl-6">

        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">                  
                    <div id="account-details" class="content">
                        <div class="content-header mb-3">

                        </div>
                        <?php foreach ($edit_domestic->result_array() as $key => $domestic) : ?>
                            <form action="<?php echo site_url('user/edit_domestic_user_profile'); ?>" enctype="multipart/form-data" method="post">
                                <div class="row g-3">
                                    <!-- Row 1 -->
                                    <input type="hidden" id="kanji_fname" name="domestic_user_id" value="<?php echo $domestic['id']; ?>"/>

                                    <!-- Row 2 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="first_name"><?= get_phrase('first_name') ?></label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="" value="<?php echo $domestic['first_name']; ?>" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="last_name"><?= get_phrase('last_name') ?></label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="" value="<?php echo $domestic['last_name']; ?>" required/>
                                    </div>

                                    <!-- Row 6 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="contact_email"><?= get_phrase('contact_email') ?></label>
                                        <input type="email" id="contact_email" name="email" class="form-control" value="<?php echo $domestic['email']; ?>" placeholder="" required/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="skype_id"><?= get_phrase('skype_id') ?></label>
                                        <input type="text" id="skype_id" name="skype" class="form-control" value="<?php echo $domestic['skype']; ?>" placeholder="" required/>
                                    </div> 
                                    
                                    <div class="col-sm-6">
                                        <label class="form-label" for="password"><?= get_phrase('password') ?></label>
                                        <input type="text" id="password" name="password" class="form-control" />
                                        <span>If you want to update your password, Please add your new password here.</span>
                                    </div> 
                                    <div class="col-sm-6">
                                    </div>
                                    

                                    <div class="col-12" style="text-align: right"> 
                                        <button type="reset" class="btn btn-secondary"><?= get_phrase('clear_data') ?></button>
                                        <button type="submit" class="btn btn-primary"><?= get_phrase('update') ?></button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
</div>