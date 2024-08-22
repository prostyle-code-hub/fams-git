<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS3110 | Add Agent</span> <!-- UI Number -->
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">

    <form action="<?php echo site_url('user/add_agents'); ?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-7">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('agent') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('new_agent') ?></span></h6>
            </div>
            <div class="col-md-5" style="text-align: right;">

                <div class="btn-group" role="group" aria-label="Button Set">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('View') ?></button>
                    <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('Modify') ?></button>
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/agents/"><?= get_phrase('Back') ?></a>
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
                                <h5 class="mb-0"><?= get_phrase('Create Agent') ?></h5>
                            </div>
                            <hr>

                            <div class="row g-3">
                                <!-- Row 1 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="kanji_fname"><?php echo get_phrase('Agent No'); ?></label>
                                    <input type="text" id="kanji_fname" class="form-control" value="<?php echo $agent_no; ?>" disabled />
                                    <input type="hidden" id="kanji_fname" name="agent_no" value="<?php echo $agent_no; ?>" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="kanji_fname"><?php echo get_phrase('Registration Date'); ?></label>
                                    <input type="text" id="kanji_fname" name="registraion_at" class="form-control" disabled value="<?php echo $reg_date; ?>" />
                                    <input type="hidden" id="kanji_fname" name="registraion_at" value="<?php echo $reg_date; ?>" />
                                </div>

                                <!-- Row 2 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="romaji_fname"><?php echo get_phrase('First Name'); ?></label>
                                    <input type="text" id="romaji_fname" name="first_name" class="form-control mandatory" placeholder="<?php echo get_phrase('First Name'); ?>" required />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="romaji_fname"><?php echo get_phrase('Last Name'); ?></label>
                                    <input type="text" id="romaji_fname" name="last_name" class="form-control mandatory" placeholder="<?php echo get_phrase('Last Name'); ?>" required />
                                </div>

                                <!-- Row 3 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="romajii_lname"><?php echo get_phrase('Name of the Japanese Language School'); ?></label>
                                    <input type="text" id="romajii_lname" name="school_name" class="form-control mandatory" placeholder="<?php echo get_phrase('Name of the Japanese Language School'); ?>" required />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="fn_mn_spouse"><?php echo get_phrase('Representative Name'); ?></label>
                                    <input type="text" id="username" name="representative_name" class="form-control mandatory" placeholder="<?php echo get_phrase('Representative Name'); ?>" required />
                                </div>

                                <!-- Row 4 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="permanent_address"><?php echo get_phrase('Address'); ?></label>
                                    <textarea class="form-control mandatory" name="address" id="permanent_address" rows="3" placeholder="<?php echo get_phrase('Address'); ?>" required ></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="permanent_address"><?php echo get_phrase('Country'); ?></label>
                                    <select id="defaultSelect" class="form-select mandatory" name="country">
                                        <option value="" Selected><?php echo get_phrase('Select the Country'); ?></option>
                                        <option value="Japan"><?php echo get_phrase('Japan'); ?></option>
                                        <option value="Sri Lanka"><?php echo get_phrase('Sri Lanka'); ?></option>
                                        <option value="India"><?php echo get_phrase('India'); ?></option>
                                        <option value="Nepal"><?php echo get_phrase('Nepal'); ?></option>
                                    </select>
                                </div>

                                <!-- Row 6 -->
                                <div class="col-sm-6">
                                    <label class="form-label" for="email"><?php echo get_phrase('Contact Email'); ?></label>
                                    <input type="email" id="email" name="email" class="form-control mandatory" placeholder="" required onfocusout="myFunction()"/>

                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="contact_tel"><?php echo get_phrase('Contact Tel'); ?></label>
                                    <input type="number" id="contact_tel" name="phone" class="form-control mandatory" required  onkeydown="limitText(this, 9);" />


                                </div>

                                <!-- Row 7-->
                                <div class="col-sm-6">
                                    <label class="form-label" for="skype"><?php echo get_phrase('Skype ID'); ?></label>
                                    <input type="text" id="skype_id" name="skype" class="form-control" placeholder="<?php echo get_phrase('Skype ID'); ?>" />
                                </div>
                                <div class="col-sm-6"></div>

                            </div>

                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('System Access Details') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?php echo get_phrase('Login Email'); ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="text" id="login_email" name="login_email" class="form-control" disabled />
                                </div>
                                <div class="col-md-2"><?php echo get_phrase('Temporary Password'); ?>
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="text" id="temp_password" name="password" class="form-control" disabled value="<?php echo $temp_pw ?>" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo get_phrase('After you create a new agent account, the system will generate an email that includes a temporary password for the agent login email. When the agent clicks on the link and logs in to the system with the temporary password, they must be able to change theirord to activate the account.'); ?> </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    function myFunction() {
        var input = document.getElementById('email');
        var output = document.getElementById('login_email');

        output.value = input.value;
    }
</script>

<script>
    var limitCount;
    function limitText(limitField, limitNum)
    {
        if (limitField.value.length > limitNum)
        {
            limitField.value = limitField.value.substring(0, limitNum);
        } else
        {
            if (limitField == '')
            {
                limitCount = limitNum - 0;
            } else
            {
                limitCount = limitNum - limitField.value.length;
            }
        }
    }
</script>