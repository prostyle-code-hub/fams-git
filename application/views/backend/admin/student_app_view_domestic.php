<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5110 | Application Information View (For Domesic user)</span> <!-- UI Number -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('st_application_page').style = 'background-color: #7467f0;color: white;';
</script>
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
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Applicant information view ') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <?php
            $app_id_data = "";
            $app_status_data = "";
            ?>
            <?php foreach ($students_app->result_array() as $key => $student_app) : ?>
                <?php
                $app_id_data = $student_app['app_id'];
                $app_status_data = $student_app['app_status'];
                ?>
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                    <a type="button" class="btn btn-secondary blue waves-effect waves-light" href="/user/student_data/view/<?php echo $student_app['id']; ?>"><?= get_phrase('Basic information view') ?></a>
                    <a type="button" class="btn btn-primary blue waves-effect waves-light" href="/user/student_materials_domestic/view/<?php echo $student_app['id']; ?>/<?php echo $student_app['app_id']; ?>"><?= get_phrase('Review Documents') ?></a>
                    <a type="button" class="btn btn-secondary green waves-effect waves-light" href="/user/student_application_domestic/edit/<?php echo $student_app['id']; ?>"><?= get_phrase('Update Immigration Detail') ?></a>
                    
                        <?php if ($documents == 1) { ?>
                        <a href="javascript:;" class="btn btn-secondary green waves-effect waves-light" type="button" data-bs-target="#status_update" data-bs-toggle="modal"><?= get_phrase('Manage Status') ?></a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('Manage Status') ?></button>
                    <?php } ?>
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
                                <h5 class="mb-0"><?= get_phrase('Agent Information') ?></h5> <small><?= get_phrase('Creator of the Applicant') ?></small>
                            </div>
                            <hr>
                            <!--load content -->
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Agent ID') ?>:</div>
                                <div class="col-md-4 answer">
                                    <?php echo $student_app['created_by']; ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Agent Name') ?>:</div>
                                <div class="col-md-4 answer">
                                    <?php echo $agent; ?>
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
                                <h5 class="mb-0"><?= get_phrase('Applicant Information') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Student ID') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student_app['id']; ?><input type="hidden" name="student_id" value="<?php echo $student_app['id']; ?>">
                                </div>
                                <div class="col-md-6">

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_app['kanji_fn'] ?>
                                    <input type="hidden" name="kanji_fn" value="<?php echo $student_app['kanji_fn'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['kanji_ln'] ?>
                                    <input type="hidden" name="kanji_ln" value=" <?php echo $student['kanji_ln'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Passport Number') ?>:
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_app['passport'] ?>
                                    <input type="hidden" name="passport" value="<?php echo $student['passport'] ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Passport Expiration') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['passport_exp'] ?>
                                    <input type="hidden" value="<?php
                                    if ($student_app['passport_exp'] != '0000-00-00') {
                                        echo $student_app['passport_exp'];
                                    }
                                    ?>">
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
                                <h5 class="mb-0"><?= get_phrase('Applicant information') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Desired Admission Time') ?>:
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_app['dst'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Application Place') ?></div>
                                <div class="col-md-4 answer"> <?php echo $student_app['application_place'] ?>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Situation') ?>:
                                </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['situation'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['residence_ststus'] ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Residence Number') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['residence_no'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Period of Stay') ?>: </div>
                                <div class="col-md-4 answer"><?php echo $student_app['stay_period'] ?>
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
                                    <div class="col-md-4 answer "> <?php echo $student_app['relationship']; ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative name') ?>: </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['relatives_name'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative address') ?>:
                                    </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['relatives_address'] ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4"> <?= get_phrase('Resident relative date of birth') ?>: </div>
                                            <div class="col-md-8 answer "><?php
                                                if ($student_app['relatives_dob'] != '0000-00-00') {
                                                    echo $student_app['relatives_dob'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"> <?= get_phrase('Resident relative co-residence') ?>: </div>
                                            <div class="col-md-8 answer"> <?php echo $student_app['residence'] ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['contact'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative residence status') ?>:
                                    </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['residence_status'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative residence card no') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['residence_card'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information [phone]') ?>: </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['contact_rr_phone'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Resident relative contact information [work]') ?>: </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['contact_work'] ?>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-4 answer ">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-2"><?= get_phrase('Status of residence change history') ?>: </div>
                                <div class="col-md-10 answer"> <?php echo $student_app['residence_charge_history'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Number of Applicant') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['no_of_applicant'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Number of time not granted') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['no_of_time_granted'] ?>
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
                                            <div class="col-md-8 answer "> <?php echo $student_app['institute_name'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"><?= get_phrase('Studied Hours') ?>: </div>
                                            <div class="col-md-8 answer "> <?php echo $student_app['studiedhours'] ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2"><?= get_phrase('Location') ?>:
                                    </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['location'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Entered Date') ?>: </div>
                                    <div class="col-md-4 answer">  <?php
                                        if ($student_app['enteredday'] != '0000-00-00') {
                                            echo $student_app['enteredday'];
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Graduation Date') ?>:
                                    </div>
                                    <div class="col-md-4 answer "> <?php
                                        if ($student_app['gradutionday'] != '0000-00-00') {
                                            echo $student_app['gradutionday'];
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('Travel Record to Japan') ?></h6>
                                </div>
                                <?php foreach ($travel->result_array() as $key => $tra) : ?>
                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                                        <div class="col-md-4 answer"><?php echo $tra['residencesta'] ?></div>
                                        <div class="col-md-2"><?= get_phrase('Residence Card No') ?>:</div>
                                        <div class="col-md-4 answer"><?php echo $tra['rcardno'] ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"><?= get_phrase('Purpose') ?>:</div>
                                        <div class="col-md-10 answer"><?php echo $tra['purpose'] ?></div>
                                    </div>

                                    <div class="row" style="padding-bottom: 25px">
                                        <div class="col-md-2"><?= get_phrase('Date of Entry') ?>: </div>
                                        <div class="col-md-4 answer "> <?php echo $tra['dateofentry'] ?></div>
                                        <div class="col-md-2"><?= get_phrase('Date of Departure') ?>:</div>
                                        <div class="col-md-4 answer"> <?php echo $tra['dateofdeparture'] ?></div>
                                    </div>
                                    <hr>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u"><?= get_phrase('JLPT Examination Record') ?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Exam Name') ?>: </div>
                                    <div class="col-md-4 answer"> <?php echo $student_app['examname'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Grade') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student_app['grade'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Result') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['results'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Exam Date') ?>:<br>
                                        <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Y,M') ?>) </smal>
                                    </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['examdate'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Marks') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['marks'] ?>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Credentials') ?>#1 : </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['credential#1'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Credentials') ?>#2 :
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['credential#2'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Criminal records') ?> : </div>
                                <div class="col-md-4 answer"><?php echo $student_app['criminalrecords'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Forced deoarture Date') ?> :
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['departure_date'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Forced deoarture Time') ?> : </div>
                                <div class="col-md-4 answer"><?php echo $student_app['departure_time'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Number of forced deoarture times') ?> :
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['departure_no'] ?>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                            <div class="content-header mb-3">
                                <h6 class="mb-0 u"><?= get_phrase('Immigration Information') ?></h6>
                                <input type="hidden" name="student_id" value="<?php echo $student_app['student_id']; ?>">
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2"><?= get_phrase('Entry Date') ?>: </div>
                                <div class="col-md-4 answer"> <?php
                                    if ($student_app['entry_date'] != '0000-00-00') {
                                        echo $student_app['entry_date'];
                                    }
                                    ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Period of stay') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['period_of_stay']; ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2"><?= get_phrase('Contact in person') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['contact_in_person']; ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Address in japan') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['japan_address']; ?>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2"><?= get_phrase('Resident Card Copy') ?>: <br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('in pdf format') ?>) </smal>
                                </div>
                                <div class="col-md-10 answer ">
                                    <?php if ($student_app['copy_of_resident_card'] != "") { ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/student_immigration_documents/' . $student_app['copy_of_resident_card']); ?>"><?= get_phrase('View PDF Document') ?></a>
                                    <?php } else { ?>
                                        <p><?= get_phrase('No File') ?></p>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal - Update Application -->
                <div class="modal fade" id="status_update" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="mb-2" style="color : #7367f0"><?= get_phrase('Applicant status') ?></h3>
                                </div>
                                <div class="mb-4">
                                    <p><?= get_phrase('Upload status or Submission status') ?>:</p>
                                </div>
                                <div class="mb-8">
                                    <form action="<?php echo site_url('user/update_application_status/'); ?>" enctype="multipart/form-data" method="post">
                                        <div class="text-center mb-6">
                                            <input type="hidden" name="app_id" value="<?php echo $app_id_data; ?>" />
                                            <select name="application_status" id="citizenship" class="ms-1 form-control form-input1 dropdown-toggl  dropdown-toggle waves-effect waves-light">
                                                <option value=""><?= get_phrase('Select status') ?></option>
                                                <option value="1" <?php
                                                if ($app_status_data == 1) {
                                                    echo "selected";
                                                }
                                                ?>><?= get_phrase('under registration of documentation') ?></option>
                                                <option value="2" <?php
                                                if ($app_status_data == 3) {
                                                    echo "selected";
                                                }
                                                ?>><?= get_phrase('under conirmation of documentation') ?></option>
                                                <option value="4" <?php
                                                if ($app_status_data == 4) {
                                                    echo "selected";
                                                }
                                                ?>><?= get_phrase('all documents is checked') ?></option>
                                                <option value="5" <?php
                                                if ($app_status_data == 5) {
                                                    echo "selected";
                                                }
                                                ?>><?= get_phrase('submitted to imigration') ?></option>
                                                <option value="6" <?php
                                                if ($app_status_data == 6) {
                                                    echo "selected";
                                                }
                                                ?>><?= get_phrase('Receipt of immigration examination results') ?></option>


                                            </select>
                                        </div>
                                </div>
                                <br />
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('Update'); ?></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>