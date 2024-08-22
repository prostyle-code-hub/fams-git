<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7211 | Modify application form information (by Agent)</span> <!-- UI Number -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
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
<style>
    .answer {
        color: #355089 !important;
    }

    small {
        font-size: x-small;
        color: #7467f0;
    }

    .red:hover {
        background-color: #dd4b39 !important;
    }

    .green:hover {
        background-color: #28c76f !important;
    }

    .blue:hover {
        background-color: #7567f0 !important;
    }

    .u {
        text-decoration: underline;
        color: color(srgb 0.645 0.645 0.645);
    }
</style>
<script type="text/javascript">
    function addDashes(f) {
        f.value = f.value.slice(0, 3) + "-" + f.value.slice(3, 6) + "-" + f.value.slice(6, 10);
    }
</script>
<!-- Content wrapper ------------------------------------------------------------------------------------------------------------------------------------------>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-5">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Student Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Modify Application') ?></span></h6>
        </div>
        <div class="col-md-7" style="text-align: right;">
            <form action="<?php echo site_url('user/student_application/update'); ?>" enctype="multipart/form-data" method="post">
                <?php foreach ($students_app->result_array() as $key => $student_application) : ?>
                    <div class="btn-group" role="group">
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                        <a type="button" class="btn btn-secondary waves-effect green waves-light" href="/user/student_application/view/<?php echo $student_application['id']; ?>"><?= get_phrase('View Application') ?></a>
                        <button type="button" class="btn btn-secondary blue waves-effect waves-light" disabled><?= get_phrase('materials') ?></button>
                        <a href="javascript:;" class="btn btn-secondary red waves-effect waves-light" data-bs-target="#deleteStudentApplication<?php echo $student_application['id']; ?>" data-bs-toggle="modal"><?php echo get_phrase('Delete'); ?></a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Save') ?></button>
                    </div>

            </div>
        </div>

        <!-- Content -------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Applicant Information') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Student ID') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student_application['id']; ?> <input type="hidden" name="student_id" value="<?php echo $student_application['id']; ?>">
                                </div>
                                <div class="col-md-6">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['kanji_fn'] ?>
                                    <input type="hidden" name="kanji_fn" value="<?php echo $student_application['kanji_fn'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['romaji_fn'] ?>
                                    <input type="hidden" name="romaji_fn" value="<?php echo $student_application['romaji_fn'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Passport Number') ?>:
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_application['passport'] ?>
                                    <input type="hidden" name="passport" value="<?php echo $student_application['passport'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Passport Expiration') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['passport_exp'] ?>
                                    <input type="hidden" value="<?php echo $student_application['passport_exp'] ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Application Information') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Desired Admission Time') ?>:
                                </div>
                                <div class="col-md-4 form-check  ">

                                    <select class=" form-select mandatory form-control" aria-label="relationship" id="dst" name="dst" require>
                                        <option <?php echo ($student_application['dst'] == '') ? "selected" : "" ?>  value="" ><small><?= get_phrase('Select Desired Admission Time') ?></small></option>
                                        <option <?php echo ($student_application['dst'] == 'April') ? "selected" : "" ?>  value="April"><?= get_phrase('April') ?></option>
                                        <option <?php echo ($student_application['dst'] == 'selected') ? "selected" : "" ?> value="October"><?= get_phrase('October') ?></option>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Application Place') ?></div>
                                <div class="col-md-4 form-check ">
                                    <select class=" form-select mandatory form-control" aria-label="relationship" id="applicationplace" name="application_place" required>
                                        <option value=""><small><?= get_phrase('Select the school') ?></small></option>
                                        <option value="ウェルテック専門学校 広島校"  
                                        <?php
                                        if ($student_application['application_place'] == "ウェルテック専門学校 広島校") {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Human Welfare Hiroshima Training School') ?></option>
                                        <option value="ダイキ日本語学院" 
                                                <?php
                                                if ($student_application['application_place'] == "ダイキ日本語学院") {
                                                    echo "selected";
                                                }
                                                ?> ><?= get_phrase('Daiki Japanese Language School') ?></option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Situation') ?>:
                                </div>
                                <div class="col-md-4 form-check "> 

                                    <select class=" form-select form-control" aria-label="relationship" id="situation" name="situation">
                                        <option <?php echo ($student_application['situation'] == 'Not yet Applied') ? "selected" : "" ?>  value="Not yet Applied"><small><?= get_phrase('Not yet Applied') ?></small></option>
                                        <option <?php echo ($student_application['situation'] == 'Under Application') ? "selected" : "" ?> value="Under Application"><?= get_phrase('Under Application') ?></option>
                                        <option <?php echo ($student_application['situation'] == 'Applied') ? "selected" : "" ?> value="Applied"><?= get_phrase('Applied') ?></option>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                <div class="col-md-4 form-check "> <input type="text" class="form-control" aria-label="residence status" id="residenceststus" name="residence_ststus" value="<?php echo $student_application['residence_ststus'] ?>">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Residence Number') ?>:
                                </div>
                                <div class="col-md-4 form-check "> <input type="text" class="form-control" aria-label="residence no" id="residenceno" name="residence_no" value="<?php echo $student_application['residence_no'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Period of Stay') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <select class="form-select form-control" aria-label="relationship" id="periodofstay" name="stay_period">
                                        <option <?php echo ($student_application['stay_period'] == 'Not yet Applied') ? "selected" : "" ?> value=""><small><?= get_phrase('Select the Period of Stay') ?></small></option>
                                        <option <?php echo ($student_application['stay_period'] == 'Not yet Applied') ? "selected" : "Submitted" ?> value="Submitted"><?= get_phrase('Submitted') ?></option>
                                        <option <?php echo ($student_application['stay_period'] == 'Not yet Applied') ? "selected" : "Checking" ?> value="Checking"><?= get_phrase('Checking') ?></option>
                                        <option <?php echo ($student_application['stay_period'] == 'Not yet Applied') ? "selected" : "Edited" ?> value="Edited"><?= get_phrase('Edited') ?></option>
                                        <option <?php echo ($student_application['stay_period'] == 'Not yet Applied') ? "selected" : "Completed" ?> value="Completed"><?= get_phrase('Completed') ?></option>
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('Resident Relative Information') ?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <select class="ms-1 form-select form-input1" aria-label="relationship" id="relationship" name="relationship">
                                            <option value=""><small><?= get_phrase('Select the relationship') ?></small></option>
                                            <option value="Mother" <?php
                                        if ($student_application['relationship'] == "Mother") {
                                            echo "selected";
                                        }
                                                ?>><?= get_phrase('Mother') ?></option>
                                            <option value="Father" <?php
                                        if ($student_application['relationship'] == "Father") {
                                            echo "selected";
                                        }
                                                ?>><?= get_phrase('Fatber') ?></option>
                                            <option value="Siblings" <?php
                                        if ($student_application['relationship'] == "Siblings") {
                                            echo "selected";
                                        }
                                                ?>><?= get_phrase('Sibling') ?></option>
                                            <option value="Spouse" <?php
                                        if ($student_application['relationship'] == "Spouse") {
                                            echo "selected";
                                        }
                                                ?>><?= get_phrase('Spouse') ?></option>
                                            <option value="Children" <?php
                                        if ($student_application['relationship'] == "Children") {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Children') ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative Name') ?>: </div>
                                    <div class="col-md-4 form-check "><input type="text" class="form-control" aria-label="name" id="name" name="relatives_name" value="<?php echo $student_application['relatives_name'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative Addres') ?>:
                                    </div>
                                    <div class="col-md-4 form-check "> 
                                        <textarea class="form-control" rows="3" id="address" name="relatives_address"><?php echo $student_application['relatives_address'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"> <?= get_phrase('Resident relative Date of birth ') ?>: </div>
                                            <div class="col-md-8 form-check ">
                                                <input type="date" class="form-control" aria-label="date of birth" id="dob" name="relatives_dob" value="<?php echo $student_application['relatives_dob'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"> <?= get_phrase('Resident relative co-residence') ?>: </div>
                                            <div class="col-md-8 form-check "><input type="date" class="form-control" aria-label="date of birth" id="residence" name="residence" value="<?php echo $student_application['residence'] ?>">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information') ?>: </div>
                                    <div class="col-md-4 form-check "><input type="text" class="form-control" aria-label="contact information" id="contact" name="contact" value="<?php echo $student_application['contact'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative Residence status') ?>:
                                    </div>
                                    <div class="col-md-4 form-check "><input type="text" class=" form-control " aria-label="co residence" id="rstatus" name="residence_status" value="<?php echo $student_application['residence_status'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative Residence card No.') ?>: </div>
                                    <div class="col-md-4 form-check "><input type="text" class="form-control " aria-label="contact information" id="rcd" name="residence_card" value="<?php echo $student_application['residence_card'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information [Phone]') ?>: </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="number" class=" form-control" aria-label="contact_phone" id="contactrr_phone" name="contact_rr_phone" value="<?php echo $student_application['contact_rr_phone'] ?>" onkeydown="limitText(this, 9);">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information [Working]') ?>: </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="number" class="form-control" aria-label="contact_work" id="contact_work" name="contact_work" value="<?php echo $student_application['contact_work'] ?>" onkeydown="limitText(this, 9);" >
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information [School]') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="number" class="form-control" aria-label="contact_school" id="contact_school" name="contact_school" value="<?php echo $student_application['contact_school'] ?>" onkeydown="limitText(this, 9);" >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Status of residence change history') ?>: </div>
                                        <div class="col-md-10 form-check "> 
                                            <input type="text" class="form-control" aria-label="contact information" id="residencechargehistory" name="residence_charge_history" value="<?php echo $student_application['residence_charge_history'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-md-2"><?= get_phrase('Number of Applicant') ?>: </div>
                                    <div class="col-md-4 form-check "> <input type="number" class="form-control" aria-label="no of applicant" id="no_ofapplicant" name="no_of_applicant" value="<?php echo $student_application['no_of_applicant'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Number of time not granted') ?>: </div>
                                    <div class="col-md-4 form-check "> <input type="text" class="form-control" aria-label="First & Middle name" id="no_of_time_granted" name="no_of_time_granted" value="<?php echo $student_application['no_of_time_granted'] ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('Japanese Language School Record') ?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"><?= get_phrase('Institute Name') ?>: </div>
                                            <div class="col-md-8 form-check "> <input type="text" class="form-control" aria-label="institute name" id="institutename" name="institute_name" value="<?php echo $student_application['institute_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"><?= get_phrase('Studied Hours') ?>: </div>
                                            <div class="col-md-8 form-check "> <input type="text" class="form-control" aria-label="studied hours" id="studiedhours" name="studiedhours" value="<?php echo $student_application['studiedhours'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2"><?= get_phrase('Location') ?>:
                                    </div>
                                    <div class="col-md-4 form-check "><textarea class="form-control" id="message" rows="3" id="location" name="location"><?php echo $student_application['location'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Entered Date') ?>: </div>
                                    <div class="col-md-4 form-check "> <input type="date" class=" form-control" aria-label="entered day" id="enteredday" name="enteredday" value="<?php echo $student_application['enteredday'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Graduation Date') ?>:
                                    </div>
                                    <div class="col-md-4 form-check "><input type="date" class="form-control" aria-label="graduation day" id="gradutionday" name="gradutionday" value="<?php echo $student_application['gradutionday'] ?>">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('Travel Record to Japan') ?></h6>
                                </div>
    <?php foreach ($travel->result_array() as $key => $tra) : ?>
                                    <input type="hidden" name="application_id_tbl[]" value="<?php echo $tra['id']; ?>" />
                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta[]" value="<?php echo $tra['residencesta']; ?>">

                                        </div>
                                        <div class="col-md-2"><?= get_phrase('Residence Card No') ?>: </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno[]" value="<?php echo $tra['rcardno']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Purpose') ?>:</div>
                                        <div class="col-md-10 form-check ">
                                            <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose[]" value="<?php echo $tra['purpose']; ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry[]" value="<?php echo $tra['dateofentry']; ?>">
                                        </div>
                                        <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                        </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" value="<?php echo $tra['dateofentry']; ?>">
                                        </div>
                                    </div>
    <?php endforeach; ?>
                            </div>
                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('JLPT Examination Record') ?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Exam Name') ?>: </div>
                                    <div class="col-md-4 form-check "> 
                                        <input type="text" class="form-control" aria-label="exam name" id="examname" name="examname" value="<?php echo $student_application['examname'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Grade') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" class="form-control" aria-label="grade" id="grade" name="grade" value="<?php echo $student_application['grade'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Result') ?>: </div>
                                    <div class="col-md-4 form-check "> 
                                        <input type="text" class="form-control" aria-label="result" id="results" name="results" value="<?php echo $student_application['results'] ?>">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Exam Date') ?>:<br>
                                        <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Y,M') ?>) </smal>
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" class="form-control" aria-label="exam date" id="examdate" name="examdate" value="<?php echo $student_application['examdate'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Marks') ?>: </div>
                                    <div class="col-md-4 form-check "> 
                                        <input type="text" class=" form-control " aria-label="marks" id="marks" name="marks" value="<?php echo $student_application['marks'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Credentials') ?>#1 : </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="text" class="form-control" aria-label="credential#1" id="credential#1" name="credential#1" value="<?php echo $student_application['credential#1'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Credentials') ?>#2 :
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control" aria-label="credential#2" id="credential#2" name="credential#2" value="<?php echo $student_application['credential#2'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Criminal records') ?> : </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="text" class="form-control" aria-label="criminalrecords" id="criminalrecords" name="criminalrecords" value="<?php echo $student_application['criminalrecords'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Forced deoarture Date') ?> :
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" class="form-control" aria-label="departureorder" id="departureorder" name="departure_date" value="<?php echo $student_application['departure_date'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Forced deoarture Time') ?> :</div>
                                <div class="col-md-4 form-check ">
                                    <input type="time" class="form-control" aria-label="departureorder" id="departureorder" name="departure_time" value="<?php echo $student_application['departure_time'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Number of forced deoarture times') ?> :
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" class="form-control" aria-label="departureorder" id="departureorder" name="departure_no" value="<?php echo $student_application['departure_no'] ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Delete Student Application -->
                <div class="modal fade" id="deleteStudentApplication<?php echo $student_application['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <img src="/assets/img/remove.gif" style="width: 50%;">
                                    <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>?</h3>
                                    <p><?php echo get_phrase('Do You Want To Remove This Student Application?'); ?></p>
                                </div>
                                <div class="text-center mb-4">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                    <a href="<?php echo site_url('user/student_application/delete/' . $student_application['id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>
            </form>
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