<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5420 | Modify Applicant's Basic Information (Agent View)</span> <!-- UI Number -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('student_page').style = 'background-color: #7467f0;color: white;';
</script>
<script type="text/javascript">
    function addDashes(f)
    {
        f.value = f.value.slice(0, 3) + "-" + f.value.slice(3, 6) + "-" + f.value.slice(6, 10);
    }
</script>

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
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('student-information') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Modify') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <form action="<?php echo site_url('user/student/edit_student'); ?>" enctype="multipart/form-data" method="post">
                <?php foreach ($students->result_array() as $key => $student) : ?>
                    <div class="btn-group" role="group">
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/student/view/<?php echo $student['id'] ?>"><?= get_phrase('View') ?></a>
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
                                <h5 class="mb-0"><?= get_phrase('Basic Information') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                            <input type="hidden" name="student_id" value="<?php echo $student['id'] ?>">
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check "><input type="text" class="ms-1 form-control form-input1 mandatory" aria-label="First & Middle name" id="kanji_fname" name="kanji_fname" value="<?php echo $student['kanji_fn'] ?>" required>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"><input type="text" class="ms-1 form-control form-input1 mandatory" aria-label="Last name" value="<?php echo $student['kanji_ln'] ?>" id="kanji_lname" name="kanji_lname" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="ms-1 form-control form-input1 mandatory" aria-label="First & Middle name" id="romaji_fname" name="romaji_fname" value="<?php echo $student['romaji_fn'] ?>" required>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="text" class="ms-1 form-control form-input1 mandatory" id="romajii_lname" name="romajii_lname" aria-label="Last name" value="<?php echo $student['romaji_ln'] ?>" required>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Sex') ?>:
                                </div>
                                <div class="col-md-4 form-check " >
                                    <input type="radio" id="option1" name="gender" value="Male" <?php
                                    if ($student['gender'] == 'Male') {
                                        echo "checked";
                                    }
                                    ?> onclick="document.getElementById('stu_photo').src = '<?php echo base_url('assets/img/male.png'); ?>'">
                                    <label for="option1" class="me-5"><?= get_phrase('Male') ?></label>
                                    <input type="radio" id="option1" name="gender" value="Female" <?php
                                    if ($student['gender'] == 'Female') {
                                        echo "checked";
                                    }
                                    ?> onclick="document.getElementById('stu_photo').src = '<?php echo base_url('assets/img/famale.png'); ?>'">
                                    <label for="option1" class="me-5"><?= get_phrase('Female') ?></label>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Date of Birth') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="date" id="dob" class="form-control flatpickr-input mandatory" name="dob" value="<?php echo $student['dob'] ?>" required/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('spouse') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="radio" id="spouse1" name="spouse" value="With spouse" <?php
                                    if ($student['spouse'] == "With spouse") {
                                        echo "checked";
                                    }
                                    ?>>
                                    <label for="spouse1" class="me-5"><?= get_phrase('With spouse') ?></label>
                                    <input type="radio" id="spouse1" name="spouse" value="Without spouse" <?php
                                    if ($student['spouse'] == "Without spouse") { {
                                            echo "checked";
                                        }
                                    }
                                    ?>>
                                    <label for="spouse1" class="me-5"><?= get_phrase('Without spouse') ?></label>                              
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4 answer"></div>
                            </div>
                            <br>

                            <div class="row" id="sopuce-on">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:
                                    <br>
                                    <smal style="font-size: x-small;color: #7467f0;"><?= get_phrase('of Spouse') ?> </smal>
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" name="first_middle_name_spouse" class="ms-1 form-control form-input1" aria-label="<?= get_phrase('First ＆ Middle Name of Spouse') ?>" value="<?php echo $student['first_middle_name_spouse'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name ') ?>:
                                    <br>
                                    <smal style="font-size: x-small;color: #7467f0;"><?= get_phrase('of Spouse') ?> </smal>
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="text" name="last_name_spouse" class="ms-1 form-control form-input1" aria-label="<?= get_phrase('Last Name of Spouse') ?>" value="<?php echo $student['last_name_spouse'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Birthplace Country') ?>:</div>
                                <div class="col-md-4 form-check ">
                                    <select name="birth_country" id="birthcountry" class="ms-1 form-control form-input1 mandatory" required >
                                        <option value='' ><?= get_phrase('Select Country') ?></option>
                                        <?php
                                        $bith_country = ['country' => 'Select Country'];
                                        $country_list = ["Nepal", "India", "Sri Lanka", "Vietnam", "Japan", "Japan", "Bangladesh", "Myanmar", "Mongolia", "Indonesia", "China", "Peru", "Philippines", "Thailand", "Iran", "Uzbekistan"];

                                        foreach ($country_list as $country) {
                                            $sel = ($student['birth_country'] === $country) ? 'selected' : '';

                                            echo "<option value='$country' $sel> "
                                            ?> 
                                            <?= get_phrase($country) ?> 
                                            <?php
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Permanent Address') ?>:</div>
                                <div class="col-md-4 answer">
                                    <textarea class="ms-1 form-control form-input1 two-div mandatory" name="permanent_address" id="permanent_address" rows="3"><?php echo $student['permanent_address'] ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Country of Citizenship') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <select name="citizenship" id="birthcountry" class="ms-1 form-control form-input1 mandatory" required >
                                        <option value='' ><?= get_phrase('Select Country') ?></option>
                                        <?php
                                        foreach ($country_list as $country) {
                                            $sel = ($student['citizenship'] === $country) ? 'selected' : '';

                                            echo "<option value='$country' $sel>"
                                            ?> 
                                            <?= get_phrase($country) ?> 
                                            <?php
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Occupation') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="text" class="ms-1 form-control form-input1 mandatory" aria-label="<?= get_phrase('Occupation') ?>" value="<?php echo $student['occupation'] ?>" id="kanji_lname" name="occupation">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Passport Number') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="ms-1 form-control form-input1 mandatory" aria-label="<?= get_phrase('Passport Number') ?>" value="<?php echo $student['passport'] ?>" id="passport_number" name="passport_number">
                                </div>
                                <div class="col-md-2"><?= get_phrase('passport_issue_date') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <input type="date" id="username" name="passport_create" class="ms-1 form-control form-input1 mandatory" value="<?php echo $student['passport_create'] ?>" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Passport Expiry Date') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" id="username" name="passport_exp" class="ms-1 form-control form-input1 mandatory" value="<?php echo $student['passport_exp'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('Future Plans') ?>:
                                </div>
                                <div class="col-md-4 answer "> 
                                    <select name="future_plan" id="future_plan" class="ms-1 form-control form-input1" >
                                        <option <?php
                                        if ($student['future_plan'] == "University") {
                                            echo "selected='selected' ";
                                        }
                                        ?> value="Universities"><?= get_phrase('University') ?></option>
                                        <option <?php
                                        if ($student['future_plan'] == "Vocational school") {
                                            echo "selected='selected' ";
                                        }
                                        ?> value="Vocational schools"><?= get_phrase('Vocational school') ?></option>
                                        <option <?php
                                        if ($student['future_plan'] == "Employment") {
                                            echo "selected='selected' ";
                                        }
                                        ?>value="Employment"><?= get_phrase('Employment') ?></option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Future Plans Detail') ?>: </div>
                                <div class="col-md-10 form-check ">
                                    <textarea class="form-control" name="future_plan_detail" id="" rows="3"><?php echo $student['future_plan_detail'] ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Contact in Home') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('current_address') ?>:
                                </div>
                                <div class="col-md-10 form-check ">
                                    <textarea class="form-control mandatory" name="current_address" id="" rows="3"><?php echo $student['current_address'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('contact_ap_fixed') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="romaji_fname"  name="contact_ap_fixed" class="form-control mandatory" value="<?php echo $student['contact_ap_fixed'] ?>" onkeydown="limitText(this, 9);" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('contact_ap_mobile') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="romajii_lname"  name="contact_ap_mobile" class="form-control" value="<?php echo $student['contact_ap_mobile'] ?>" onkeydown="limitText(this, 9);" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('contact_ap_mail') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="email" id="romaji_fname" name="contact_ap_mail" class="form-control" value="<?php echo $student['contact_ap_mail'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('contact_ap_fax') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="romajii_lname"  name="contact_ap_fax" class="form-control" value="<?php echo $student['contact_ap_fax'] ?>" onkeydown="limitText(this, 9);" accept=""/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <br>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Family Information') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                </div>
                                <?php
                                if ($student['fr_2'] == "") {
                                    $tag_1 = 1;
                                }
                                ?>
                                <div class="col-md-4 form-check ">


                                    <select name="family_relationship_1"  id="family_relationship" class="form-control">   
                                        <option value="" style="color: #7467f0;"><?= get_phrase('Select the relationship') ?></option>
                                        <option value="Father" <?php
                                        if ($student['fr_1'] == 'Father') {
                                            echo "selected";
                                        }
                                        ?>> <?= get_phrase('Father') ?></option>
                                        <option value="Mother" <?php
                                        if ($student['fr_1'] == 'Mother') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Mother') ?></option>
                                        <option value="Grand mother" <?php
                                        if ($student['fr_1'] == 'Grand mother') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Grand Mother') ?></option>
                                        <option value="Grand Father" <?php
                                        if ($student['fr_1'] == 'Grand Father') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Grand Father') ?></option>
                                        <option value="Elder Brother" <?php
                                        if ($student['fr_1'] == 'Elder Brother') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Elder Brother') ?></option>
                                        <option value="Younger Brother" <?php
                                        if ($student['fr_1'] == 'Younger Brother') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Younger Brother') ?></option>
                                        <option value="Elder Sister" <?php
                                        if ($student['fr_1'] == 'Elder Sister') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Elder Sister') ?></option>
                                        <option value="Younger Sister" <?php
                                        if ($student['fr_1'] == 'Younger Sister') {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Younger Sister') ?></option>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('first_name_and_last_name') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_lname" name="family_first_and_lastname_1" class="form-control" value="<?php echo $student['fname_1'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('date_of_birth') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" id="kanji_fname" name="family_dob_1" class="form-control" value="<?php echo $student['fdob_1'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_lname" name="family_profession_1" class="form-control" value="<?php echo $student['fp_1'] ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('current_address_family') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <textarea class="form-control" name="family_current_address_1" id="" rows="3"><?php echo $student['faddress_1'] ?></textarea>
                                </div>
                                <div class="col-md-2"><?= get_phrase('life_and_death') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="radio" id="family_life_and_death1" name="family_life_and_death_1" value="Life" <?php
                                    if ($student['flife_1'] == "Life") {
                                        echo "checked";
                                    }
                                    ?>>
                                    <label for="family_life_and_death1" class="me-5"><?= get_phrase('Life') ?></label>
                                    <input type="radio" id="family_life_and_death1" name="family_life_and_death_1" value="Death" <?php
                                    if ($student['flife_1'] == "Death") {
                                        echo "checked";
                                    }
                                    ?>>
                                    <label for="family_life_and_death1" class="me-5"><?= get_phrase('Death') ?></label>
                                </div>
                            </div>
                            <div class="row" id="tb1">
                                <div class="col-md-8"></div>
                                <div class="col-md-4 form-check" style="text-align: right;">
                                    <?php if ($tag_1 == 1) { ?>
                                        <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('family2').style.display = 'block', document.getElementById('tb1').style.display = 'none'">
                                            <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add another Family Member') ?>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- FI2 -->
                            <?php
                            if ($student['fr_3'] == "") {
                                $tag_2 = 1;
                            }
                            ?>

                            <div id="family2" <?php if ($student['fr_2'] == "") { ?> style="display:none;" <?php } ?>>
                                <hr/>

                                <br/>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <select name="family_relationship_2"  id="family_relationship" class="form-control">   
                                            <option value="" style="color: #7467f0;"><?= get_phrase('Select the relationship') ?></option>
                                            <option value="Father" <?php
                                            if ($student['fr_2'] == 'Father') {
                                                echo "selected";
                                            }
                                            ?>> <?= get_phrase('Father') ?></option>
                                            <option value="Mother" <?php
                                            if ($student['fr_2'] == 'Mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Mother') ?></option>
                                            <option value="Grand mother" <?php
                                            if ($student['fr_2'] == 'Grand mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Mother') ?></option>
                                            <option value="Grand Father" <?php
                                            if ($student['fr_2'] == 'Grand Father') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Father') ?></option>
                                            <option value="Elder Brother" <?php
                                            if ($student['fr_2'] == 'Elder Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Brother') ?></option>
                                            <option value="Younger Brother" <?php
                                            if ($student['fr_2'] == 'Younger Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Brother') ?></option>
                                            <option value="Elder Sister" <?php
                                            if ($student['fr_2'] == 'Elder Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Sister') ?></option>
                                            <option value="Younger Sister" <?php
                                            if ($student['fr_2'] == 'Younger Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Sister') ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('first_name_and_last_name') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_first_and_lastname_2" class="form-control" value="<?php echo $student['fname_2'] ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('date_of_birth') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" id="kanji_fname" name="family_dob_2" class="form-control" value="<?php echo $student['fdob_2'] ?>" />
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_profession_2" class="form-control" value="<?php echo $student['fp_2'] ?>" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('current_address_family') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <textarea class="form-control" name="family_current_address_2" id="" rows="3"><?php echo $student['faddress_2'] ?></textarea>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('life_and_death') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_2" value="Life" <?php
                                        if ($student['flife_2'] == "Life") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Life') ?></label>
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_2" value="Death" <?php
                                        if ($student['flife_2'] == "Death") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Death') ?></label>
                                    </div>
                                </div>
                                <div class="row" id="tb2">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 form-check" style="text-align: right;">
                                        <?php if ($tag_2 == 1) { ?>
                                            <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('family3').style.display = 'block', document.getElementById('tb2').style.display = 'none'">
                                                <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add another Family Member') ?>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                            <!-- FI3 -->
                            <?php
                            if ($student['fr_4'] == "") {
                                $tag_3 = 1;
                            }
                            ?>

                            <div id="family3" <?php if ($student['fr_3'] == "") { ?> style="display:none;" <?php } ?>>
                                <hr/>

                                <br/>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <select name="family_relationship_3"  id="family_relationship" class="form-control">   
                                            <option value="" style="color: #7467f0;"><?= get_phrase('Select the relationship') ?></option>
                                            <option value="Father" <?php
                                            if ($student['fr_3'] == 'Father') {
                                                echo "selected";
                                            }
                                            ?>> <?= get_phrase('Father') ?></option>
                                            <option value="Mother" <?php
                                            if ($student['fr_3'] == 'Mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Mother') ?></option>
                                            <option value="Grand mother" <?php
                                            if ($student['fr_3'] == 'Grand mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Mother') ?></option>
                                            <option value="Grand Father" <?php
                                            if ($student['fr_3'] == 'Grand Father') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Father') ?></option>
                                            <option value="Elder Brother" <?php
                                            if ($student['fr_3'] == 'Elder Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Brother') ?></option>
                                            <option value="Younger Brother" <?php
                                            if ($student['fr_3'] == 'Younger Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Brother') ?></option>
                                            <option value="Elder Sister" <?php
                                            if ($student['fr_3'] == 'Elder Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Sister') ?></option>
                                            <option value="Younger Sister" <?php
                                            if ($student['fr_3'] == 'Younger Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Sister') ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('first_name_and_last_name') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_first_and_lastname_3" class="form-control" value="<?php echo $student['fname_3'] ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('date_of_birth') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" id="kanji_fname" name="family_dob_3" class="form-control" value="<?php echo $student['fdob_3'] ?>" />
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_profession_3" class="form-control" value="<?php echo $student['fp_3'] ?>" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('current_address_family') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <textarea class="form-control" name="family_current_address_3" id="" rows="3"><?php echo $student['faddress_3'] ?></textarea>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('life_and_death') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_3" value="Life" <?php
                                        if ($student['flife_3'] == "Life") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Life') ?></label>
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_3" value="Death" <?php
                                        if ($student['flife_3'] == "Death") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Death') ?></label>
                                    </div>
                                </div>
                                <div class="row" id="tb3">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 form-check" style="text-align: right;">
                                        <?php if ($tag_3 == 1) { ?>
                                            <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('family4').style.display = 'block', document.getElementById('tb3').style.display = 'none'">
                                                <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add another Family Member') ?>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- FI4 -->
                            <?php
                            if ($student['fr_5'] == "") {
                                $tag_4 = 1;
                            }
                            ?>

                            <div id="family4" <?php if ($student['fr_4'] == "") { ?> style="display:none;" <?php } ?>>

                                <hr/>
                                <br/>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <select name="family_relationship_4"  id="family_relationship" class="form-control">   
                                            <option value="" style="color: #7467f0;"><?= get_phrase('Select the relationship') ?></option>
                                            <option value="Father" <?php
                                            if ($student['fr_4'] == 'Father') {
                                                echo "selected";
                                            }
                                            ?>> <?= get_phrase('Father') ?></option>
                                            <option value="Mother" <?php
                                            if ($student['fr_4'] == 'Mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Mother') ?></option>
                                            <option value="Grand mother" <?php
                                            if ($student['fr_4'] == 'Grand mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Mother') ?></option>
                                            <option value="Grand Father" <?php
                                            if ($student['fr_4'] == 'Grand Father') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Father') ?></option>
                                            <option value="Elder Brother" <?php
                                            if ($student['fr_4'] == 'Elder Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Brother') ?></option>
                                            <option value="Younger Brother" <?php
                                            if ($student['fr_4'] == 'Younger Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Brother') ?></option>
                                            <option value="Elder Sister" <?php
                                            if ($student['fr_4'] == 'Elder Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Sister') ?></option>
                                            <option value="Younger Sister" <?php
                                            if ($student['fr_4'] == 'Younger Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Sister') ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('first_name_and_last_name') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_first_and_lastname_4" class="form-control" value="<?php echo $student['fname_4'] ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('date_of_birth') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" id="kanji_fname" name="family_dob_4" class="form-control" value="<?php echo $student['fdob_4'] ?>" />
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_profession_4" class="form-control" value="<?php echo $student['fp_4'] ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('current_address_family') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <textarea class="form-control" name="family_current_address_4" id="" rows="3"><?php echo $student['faddress_4'] ?></textarea>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('life_and_death') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_4" value="Life" <?php
                                        if ($student['flife_4'] == "Life") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Life') ?></label>
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_4" value="Death" <?php
                                        if ($student['flife_4'] == "Death") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Death') ?></label>
                                    </div>
                                </div>
                                <div class="row" id="tb4">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 form-check" style="text-align: right;">
                                        <?php if ($tag_4 == 1) { ?>
                                            <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('family5').style.display = 'block', document.getElementById('tb4').style.display = 'none'">
                                                <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add another Family Member') ?>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- FI5 -->


                            <div id="family5" <?php if ($student['fr_5'] == "") { ?> style="display:none;" <?php } ?>>
                                <hr/>

                                <br/>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <select name="family_relationship_5"  id="family_relationship" class="form-control">   
                                            <option value="" style="color: #7467f0;"><?= get_phrase('Select the relationship') ?></option>
                                            <option value="Father" <?php
                                            if ($student['fr_5'] == 'Father') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Father') ?></option>
                                            <option value="Mother" <?php
                                            if ($student['fr_5'] == 'Mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Mother') ?></option>
                                            <option value="Grand mother" <?php
                                            if ($student['fr_5'] == 'Grand mother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Mother') ?></option>
                                            <option value="Grand Father" <?php
                                            if ($student['fr_5'] == 'Grand Father') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Grand Father') ?></option>
                                            <option value="Elder Brother" <?php
                                            if ($student['fr_5'] == 'Elder Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Brother') ?></option>
                                            <option value="Younger Brother" <?php
                                            if ($student['fr_5'] == 'Younger Brother') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Brother') ?></option>
                                            <option value="Elder Sister" <?php
                                            if ($student['fr_5'] == 'Elder Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Elder Sister') ?></option>
                                            <option value="Younger Sister" <?php
                                            if ($student['fr_5'] == 'Younger Sister') {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Younger Sister') ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('first_name_and_last_name') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_first_and_lastname_5" class="form-control" value="<?php echo $student['fname_5'] ?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('date_of_birth') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" id="kanji_fname" name="family_dob_5" class="form-control" value="<?php echo $student['fdob_5'] ?>"/>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" id="kanji_lname" name="family_profession_5" class="form-control" value="<?php echo $student['fp_5'] ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('current_address_family') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <textarea class="form-control" name="family_current_address_5" id="" rows="3"><?php echo $student['faddress_5'] ?></textarea>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('life_and_death') ?>:
                                        <br>
                                        <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Describe only death') ?>)</smal>
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_5" value="Life" <?php
                                        if ($student['flife_5'] == "Life") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Life') ?></label>
                                        <input type="radio" id="family_life_and_death1" name="family_life_and_death_5" value="Death" <?php
                                        if ($student['flife_5'] == "Death") {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="family_life_and_death1" class="me-5"><?= get_phrase('Death') ?></label>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Sponsor Information') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('sponsor_surname') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_fname" name="sponsor_surname" class="form-control" value="<?php echo $student['sponsor_surname'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('Sponsor Name') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_lname" name="sponsor_name" class="form-control" value="<?php echo $student['sponsor_name'] ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('relationship') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_fname" name="sponsor_relationship" class="form-control" value="<?php echo $student['sponsor_relationship'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('present_address') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <textarea class="form-control" name="sponsor_present_address" id="" rows="3"><?php echo $student['sponsor_present_address'] ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('annual_income') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" name="sponsor_annual_income" class="form-control" value="<?php echo $student['sponsor_annual_income'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('company') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_fname" name="sponsor_company" class="form-control" value="<?php echo $student['sponsor_company'] ?>" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('position') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" id="kanji_lname" name="sponsor_position" class="form-control" value="<?php echo $student['sponsor_position'] ?>" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('company_address') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <textarea class="form-control" name="sponsor_company_address" id="" rows="3"><?php echo $student['sponsor_company_address'] ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('contact_sp_fixed):') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="kanji_fname" maxlength="10"  name="sponsor_contact_sp_fixed" class="form-control" value="<?php echo $student['sponsor_contact_sp_fixed'] ?>" onkeydown="limitText(this, 9);" />
                                </div>
                                <div class="col-md-2"><?= get_phrase('contact_sp_mobile') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="kanji_fname"  maxlength="10" name="sponsor_contact_sp_mobile" class="form-control" value="<?php echo $student['sponsor_contact_sp_mobile'] ?>" onkeydown="limitText(this, 9);" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('contact_sp_w_fixed') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" id="kanji_lname" name="sponsor_contact_sp_w_fixed" class="form-control" value="<?php echo $student['sponsor_contact_sp_w_fixed'] ?>" onkeydown="limitText(this, 9);"/>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div> <!-- end card body-->
    </div> <!-- end card -->
    </form>
<?php endforeach; ?>
</div><!-- end col-->
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