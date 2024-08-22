<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7110 | Create a new application form</span> <!-- UI Number -->
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
        <div class="col-md-4">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Student Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('New Application') ?></span></h6>
        </div>
        <div class="col-md-8" style="text-align: right;">
            <form action="<?php echo site_url('user/student_application/add'); ?>" enctype="multipart/form-data" method="post">
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                    
                    <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('materials') ?></button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light"><?php echo get_phrase('Clear'); ?></button>
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
                                <?php echo $student['id']; ?><input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                            </div>
                            <div class="col-md-6">

                            </div>

                        </div>
                        <input type="hidden" name="romaji_fn" value="<?php echo $student['romaji_fn'] ?>">

                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Passport Number') ?>:
                            </div>
                            <div class="col-md-4 answer"><?php echo $student['passport'] ?>
                                <input type="hidden" name="passport" value="<?php echo $student['passport'] ?>">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Passport Expiration') ?>:
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student['passport_exp'] ?>
                                <input type="hidden" value="<?php echo $student['passport_exp'] ?>">
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
                                <select class=" form-select mandatory form-control" aria-label="relationship" id="dst" name="dst" required>
                                    <option value=""><small><?= get_phrase('Select Desired Admission Time') ?></small></option>
                                    <option value="April"><?= get_phrase('April') ?></option>
                                    <option value="October"><?= get_phrase('October') ?></option>
                                </select>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Application Place') ?>:</div>
                            <div class="col-md-4 form-check ">
                                <select class=" form-select mandatory form-control" aria-label="relationship" id="applicationplace" name="application_place" required>
                                    <option value=""><small><?= get_phrase('Select the school') ?></small></option>
                                    <option value="ウェルテック専門学校 広島校"><?= get_phrase('Human Welfare Hiroshima Training School') ?></option>
                                    <option value="ダイキ日本語学院"><?= get_phrase('Daiki Japanese Language School') ?></option>
                                </select>


                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Situation') ?>:
                            </div>
                            <div class="col-md-4 form-check "> 
                                <select class=" form-select form-control" aria-label="relationship" id="situation" name="situation">
                                    <option value="Not yet Applied"><small><?= get_phrase('Not yet Applied') ?></small></option>
                                    <option value="Under Application"><?= get_phrase('Under Application') ?></option>
                                    <option value="Applied"><?= get_phrase('Applied') ?></option>
                                </select>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                            <div class="col-md-4 form-check "> 
                                <input type="text" class="form-control" aria-label="residence status" id="residenceststus" name="residence_ststus">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Residence Number') ?>:
                            </div>
                            <div class="col-md-4 form-check "> <input type="text" class="form-control" aria-label="residence no" id="residenceno" name="residence_no">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Period of Stay') ?>: </div>
                            <div class="col-md-4 form-check ">
                                    <select class="form-select form-control" aria-label="relationship"  id="periodofstay" name="stay_period">
                                    <option value=""><small><?= get_phrase('Select the Period of Stay') ?></small></option>
                                    <option value="Under Application"><?= get_phrase('Submitted') ?></option>
                                    <option value="Applied"><?= get_phrase('Checking') ?></option>
                                    <option value="Applied"><?= get_phrase('Edited') ?></option>
                                    <option value="Applied"><?= get_phrase('Completed') ?></option>
                                </select>
                            </div>

                        </div>
                        
                       
                            <div class="row" style="padding-top: 10px;">
                            <div class="col-md-2"><?= get_phrase('Number of Applicant') ?>: </div>
                            <div class="col-md-4 form-check "> 
                                <input type="number" class="form-control" aria-label="no of applicant" id="no_ofapplicant" name="no_of_applicant">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Number of time not granted') ?>: </div>
                            <div class="col-md-4 form-check ">
                                <input type="text" class="form-control" aria-label="First & Middle name" id="no_of_time_granted" name="no_of_time_granted">
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
                                        <option value="Mother"><?= get_phrase('Mother') ?></option>
                                        <option value="Father"><?= get_phrase('Fatber') ?></option>
                                        <option value="Siblings"><?= get_phrase('Sibling') ?></option>
                                        <option value="Spouse"><?= get_phrase('Spouse') ?></option>
                                        <option value="Children"><?= get_phrase('Children') ?></option>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Resident relative name') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control" aria-label="name" id="name" name="relatives_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Resident relative address') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <textarea class="form-control" id="message" rows="3" id="address" name="relatives_address"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4"> <?= get_phrase('Resident Relative Date of birth') ?>: </div>
                                        <div class="col-md-8 form-check ">
                                            <input type="date" class="form-control" aria-label="date of birth" id="dob" name="relatives_dob">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"> <?= get_phrase('Resident Relative co-residence') ?>: </div>
                                        <div class="col-md-8 form-check ">
                                            <input type="date" class="form-control" aria-label="date of birth" id="dob" name="relatives_dob">
                                        </div>
                                    </div>
                                </div>


                            </div>
                          
                        
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Resident relative contact information') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control" aria-label="contact information" id="contact" name="contact">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Resident relative Residence status') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class=" form-control " aria-label="co residence" id="rstatus" name="residence_status">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Resident relative Residence card No.') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control " aria-label="contact information" id="rcd" name="residence_card">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Resident relative contact information [phone]') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number" class=" form-control" aria-label="contact_phone" id="contactrr_phone" name="contact_rr_phone" onkeydown="limitText(this, 9);" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Resident relative contact information [work]') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="number"  class="form-control" aria-label="contact_work" id="contact_work" name="contact_work" onkeydown="limitText(this, 9);">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Resident relative contact information [school]') ?>:</div>
                                <div class="col-md-4 form-check ">
                                    <input type="number"  class="form-control"  aria-label="contact_school" id="contact_school" name="contact_school" onkeydown="limitText(this, 9);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Status of residence change history') ?>: </div>
                                <div class="col-md-10 form-check ">
                                    <input type="text" class="form-control" aria-label="contact information" id="residencechargehistory" name="residence_charge_history">
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
                                        <div class="col-md-8 form-check ">
                                            <input type="text" class="form-control" aria-label="institute name" id="institutename" name="institute_name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><?= get_phrase('Studied Hours') ?>: </div>
                                        <div class="col-md-8 form-check "> 
                                            <input type="text" class="form-control" aria-label="studied hours" id="studiedhours" name="studiedhours">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2"><?= get_phrase('Location') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <textarea class="form-control" id="message" rows="3" id="location" name="location"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Entered Date') ?>: </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="date" class=" form-control" aria-label="entered day" id="enteredday" name="enteredday">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Graduation Date') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" class="form-control" aria-label="graduation day" id="gradutionday" name="gradutionday">
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                            <div class="content-header mb-3">
                                <h6 class="mb-0 u"><?= get_phrase('Travel Record to Japan') ?></h6>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta[]">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno[]">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Purpose') ?>:
                                </div>
                                <div class="col-md-10 form-check ">
                                    <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose[]">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry[]" disable>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" disable>
                                </div>
                            </div>

                            <div class="row" id="tb1">
                                <div class="col-md-8"></div>
                                <div class="col-md-4 form-check" style="text-align: right;">
                                    <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('travel2').style.display = 'block', document.getElementById('tb1').style.display = 'none'">
                                        <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add more travel Record') ?>
                                    </button>
                                </div>
                            </div>

                            <div id="travel2" style="display:none;">
                                <hr>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                    <div class="col-md-4 form-check "> 
                                        <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta[]">
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno[]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Purpose') ?>:
                                    </div>
                                    <div class="col-md-10 form-check ">
                                        <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose[]">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                    <div class="col-md-4 form-check "> 
                                        <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry[]" disable>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                    </div>
                                    <div class="col-md-4 form-check ">
                                        <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" disable>
                                    </div>
                                </div>

                                <div class="row" id="tb2">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 form-check" style="text-align: right;">
                                        <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('travel3').style.display = 'block', document.getElementById('tb2').style.display = 'none'">
                                            <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add more travel Record') ?>
                                        </button>
                                    </div>
                                </div>
                                <div id="travel3" style="display:none;">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta[]">
                                        </div>
                                        <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:
                                        </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno[]">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Purpose') ?>:
                                        </div>
                                        <div class="col-md-10 form-check ">
                                            <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose[]">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry[]" disable>
                                        </div>
                                        <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                        </div>
                                        <div class="col-md-4 form-check ">
                                            <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" disable>
                                        </div></div>

                                    <div class="row" id="tb3">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4 form-check" style="text-align: right;">
                                            <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('travel4').style.display = 'block', document.getElementById('tb3').style.display = 'none'">
                                                <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add more travel Record') ?>
                                            </button>
                                        </div>
                                    </div>

                                    <div id="travel4" style="display:none;">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                            <div class="col-md-4 form-check "> 
                                                <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta2[]">
                                            </div>
                                            <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:
                                            </div>
                                            <div class="col-md-4 form-check ">
                                                <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno2[]">
                                            </div></div>

                                        <div class="row">
                                            <div class="col-md-2"><?= get_phrase('Purpose') ?>:
                                            </div>
                                            <div class="col-md-10 form-check ">
                                                <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose2[]">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                            <div class="col-md-4 form-check "> 
                                                <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry2[]" disable>
                                            </div>
                                            <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                            </div>
                                            <div class="col-md-4 form-check ">
                                                <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" disable>
                                            </div></div>

                                        <div class="row" id="tb4">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4 form-check" style="text-align: right;">
                                                <button type="button" class="btn btn-outline-primary waves-effect" onclick="document.getElementById('travel5').style.display = 'block', document.getElementById('tb4').style.display = 'none'">
                                                    <span class="ti-xs ti ti-plus me-1"></span><?= get_phrase('Add more travel Record') ?>
                                                </button>
                                            </div>
                                        </div>

                                        <div id="travel5" style="display:none;">
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                                <div class="col-md-4 form-check ">
                                                    <input type="text" class="form-control" aria-label="residence status" id="residencesta" name="residencesta[]">
                                                </div>
                                                <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:
                                                </div>
                                                <div class="col-md-4 form-check ">
                                                    <input type="text" class="form-control" aria-label="residence card no" id="rcardno" name="rcardno[]">
                                                </div></div>

                                            <div class="row">
                                                <div class="col-md-2"><?= get_phrase('Purpose') ?>:
                                                </div>
                                                <div class="col-md-10 form-check ">
                                                    <input type="text" class="form-control" aria-label="purpose" id="purpose" name="purpose[]">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                                <div class="col-md-4 form-check ">
                                                    <input type="date" class="form-control" aria-label="date of entry" id="dateofentry" name="dateofentry[]" disable>
                                                </div>
                                                <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:
                                                </div>
                                                <div class="col-md-4 form-check ">
                                                    <input type="date" class="form-control" aria-label="date of departure" id="dateofdeparture" name="dateofdeparture[]" disable>
                                                </div></div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <br>
                        <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                            <div class="content-header mb-3">
                                <h6 class="mb-0 u"><?= get_phrase('JLPT Examination Record') ?></h6>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Exam Name') ?>: </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="text" class="form-control " aria-label="exam name" id="examname" name="examname">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Grade') ?>:
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control " aria-label="grade" id="grade" name="grade">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Result') ?>: </div>
                                <div class="col-md-4 form-check ">
                                    <input type="text" class="form-control" aria-label="result" id="results" name="results">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Exam Date') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Y,M') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check ">
                                    <input type="date" class="form-control  " aria-label="exam date" id="examdate" name="examdate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Marks') ?>: </div>
                                <div class="col-md-4 form-check "> 
                                    <input type="text" class=" form-control " aria-label="marks" id="marks" name="marks">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Credentials') ?>#1 : </div>
                            <div class="col-md-4 form-check ">
                                <input type="text" class="form-control" aria-label="credential#1" id="credential#1" name="credential#1">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Credentials') ?>#2 :
                            </div>
                            <div class="col-md-4 form-check ">
                                <input type="text" class="form-control" aria-label="credential#2" id="credential#2" name="credential#2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Criminal records') ?> : </div>
                            <div class="col-md-4 form-check "> 
                                <input type="text" class="form-control" aria-label="criminalrecords" id="criminalrecords" name="criminalrecords">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Forced Departure Date') ?> :
                            </div>
                            <div class="col-md-4 form-check ">
                                <input type="date" class="form-control" aria-label="departureorder" id="departureorder" name="departure_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Forced departure Time') ?> :</div>
                            <div class="col-md-4 form-check ">
                                <input type="time" class="form-control" aria-label="departureorder" id="departureorder" name="departure_time">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Number of forced deoarture times') ?> :
                            </div>
                            <div class="col-md-4 form-check ">
                                <input type="number" class="form-control" aria-label="departureorder" id="departureorder" name="departure_no" onkeydown="limitText(this, 9);">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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