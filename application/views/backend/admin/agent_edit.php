<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS3120 | Modify Agent Information</span> <!-- UI Number -->
<style>
    .green:hover {
        background-color: #28c76f !important;
    }
</style>

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
    <form action="<?php echo site_url('user/edit_agents'); ?>" enctype="multipart/form-data" method="post">

        <div class="row">
            <div class="col-md-3">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('agent') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Modify') ?></span></h6>
            </div>
            <div class="col-md-9" style="text-align: right;">
                <?php foreach ($edit_agent->result_array() as $key => $agent) : ?>
                    <div class="btn-group" role="group" aria-label="Button Set">
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/agents/"><?= get_phrase('Back') ?></a>
                        <button type="reset" class="btn btn-secondary waves-effect waves-light" disabled><?php echo get_phrase('Clear'); ?></button>

                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Update') ?></button>
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="account-details" class="content">
                                <div class="content-header mb-3">
                                    <h5 class="mb-0"><?= get_phrase('Modify Agent') ?></h5>
                                </div>
                                <hr>

                                <div class="row g-3">
                                    <!-- Row 1 -->
                                    <input type="hidden" id="kanji_fname" name="agent_id" value="<?php echo $agent['user_id']; ?>" />
                                    <div class="col-sm-6">
                                        <label class="form-label" for="kanji_fname"><?= get_phrase('Agent No') ?></label>
                                        <input type="text" id="kanji_fname" class="form-control" value="<?php echo $agent['agent_no']; ?>" disabled />
                                        <input type="hidden" id="kanji_fname" name="agent_no" value="<?php echo $agent['agent_no']; ?>" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="kanji_fname"><?= get_phrase('Registration Date') ?></label>
                                        <input type="text" id="kanji_fname" name="registraion_at" class="form-control" disabled value="<?php echo $agent['created_at']; ?>" />
                                        <input type="hidden" id="kanji_fname" name="registraion_at" value="<?php echo $agent['created_at']; ?>" />
                                    </div>
                                    <!-- Row 2 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="romaji_fname"><?= get_phrase('first_name') ?></label>
                                        <input type="text" id="romaji_fname" name="first_name" class="form-control mandatory" placeholder="" value="<?php echo $agent['first_name']; ?>" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="romaji_fname"><?= get_phrase('last_name') ?></label>
                                        <input type="text" id="romaji_fname" name="last_name" class="form-control mandatory" placeholder="" value="<?php echo $agent['last_name']; ?>" required />
                                    </div>


                                    <div class="col-sm-6">
                                        <label class="form-label" for="romajii_lname"><?= get_phrase('Name of the Japanese Language School') ?></label>
                                        <input type="text" id="romajii_lname" name="school_name" class="form-control mandatory" placeholder="" value="<?php echo $agent['school']; ?>"  />
                                    </div>
                                    <!-- Row 3 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="fn_mn_spouse"><?= get_phrase('Representative Name') ?></label>
                                        <input type="text" id="username" name="representative_name" class="form-control mandatory" placeholder="" value="<?php echo $agent['representative_name']; ?>" required />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="permanent_address"><?= get_phrase('Country') ?></label>

                                        <select id="defaultSelect" class="form-select mandatory" name="country">
                                            <option value="" Selected>Country...</option>
                                            <option value="Japan" <?php
                                            if ($agent['country'] == 'Japan') {
                                                echo 'selected';
                                            }
                                            ?>><?= get_phrase('Japan') ?></option>
                                            <option value="Sri Lanka" <?php
                                            if ($agent['country'] == 'Sri Lanka') {
                                                echo 'selected';
                                            }
                                            ?>><?= get_phrase('Sri Lanka') ?></option>
                                            <option value="India" <?php
                                            if ($agent['country'] == 'India') {
                                                echo 'selected';
                                            }
                                            ?>><?= get_phrase('India') ?></option>
                                            <option value="Nepal" <?php
                                            if ($agent['country'] == 'Nepal') {
                                                echo 'selected';
                                            }
                                            ?>><?= get_phrase('Nepal') ?></option>
                                        </select>
                                    </div>

                                    <!-- Row 6 -->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="permanent_address"><?= get_phrase('Address') ?></label>
                                        <textarea class="form-control mandatory" name="address" id="permanent_address" rows="3" placeholder="" required ><?php echo $agent['address']; ?></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="email"><?= get_phrase('Contact Email') ?></label>
                                        <input type="email" id="email" name="email" class="form-control mandatory" placeholder="" value="<?php echo $agent['email']; ?>" required />
                                    </div>



                                    <!-- Row 7-->
                                    <div class="col-sm-6">
                                        <label class="form-label" for="passport_number"><?= get_phrase('Contact Tel') ?></label>
                                        <input type="number" id="passport_number" name="phone" class="form-control mandatory" value="<?php echo $agent['phone']; ?>" required  onkeydown="limitText(this, 9);"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="skype_id"><?= get_phrase('Skype ID') ?></label>
                                        <input type="text" id="skype_id" name="skype" class="form-control" placeholder="" value="<?php echo $agent['skype']; ?>" />
                                    </div>



                                    <div class="col-sm-12">
                                        <p><?= get_phrase('Only the relavent agent can modify their password. To change the password, please login as relavent Agent.') ?></p>
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