<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS4120 | Modify Domestic user Information</span> <!-- UI Number -->
<style>
.green:hover {
    background-color: #28c76f !important;
}
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="<?php echo site_url('user/edit_domestic_user'); ?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-3">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('domestic_user') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Modify') ?></span></h6>
            </div>
            <div class="col-md-9" style="text-align: right;">
                <?php foreach ($edit_domestic->result_array() as $key => $domestic) : ?>
                    <div class="btn-group" role="group" aria-label="Button Set" >
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/domestic/"><?= get_phrase('back') ?></a>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light" disabled><?php echo get_phrase('clear'); ?></button>
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('update') ?></button>
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="account-details" class="content">
                                <div class="content-header mb-3">
                                    <h5 class="mb-0"><?= get_phrase('modify_domestic_user') ?></h5>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <!-- Row 1 -->
                                    <input type="hidden" id="kanji_fname" name="domestic_user_id" value="<?php echo $domestic['id']; ?>" />

                                    <!-- Row 2 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="first_name"><?= get_phrase('first_name') ?></label>
                                        <input type="text" id="first_name" name="first_name" class="form-control mandatory" placeholder="" value="<?php echo $domestic['first_name']; ?>" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="last_name"><?= get_phrase('last_name') ?></label>
                                        <input type="text" id="last_name" name="last_name" class="form-control mandatory" placeholder="" value="<?php echo $domestic['last_name']; ?>" required />
                                    </div>

                                    <!-- Row 6 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="contact_email"><?= get_phrase('contact_email') ?></label>
                                        <input type="email" id="contact_email" name="email" class="form-control mandatory" value="<?php echo $domestic['email']; ?>" placeholder="" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="skype_id"><?= get_phrase('skype_id') ?></label>
                                        <input type="text" id="skype_id" name="skype" class="form-control" value="<?php echo $domestic['skype']; ?>" placeholder=""  />
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