<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7210 | View applicant's Application Form Details</span>
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
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
        <div class="col-md-4">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Applicant information view') ?></span></h6>
        </div>
        <div class="col-md-8" style="text-align: right;">
            <?php foreach ($students_app->result_array() as $key => $student_application) : ?>
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                    <a type="button" class="btn btn-secondary blue waves-effect waves-light" href="/user/student/view/<?php echo $student_application['id']; ?>"><?= get_phrase('View Student') ?></a>
                    <a type="button" class="btn btn-secondary green waves-effect waves-light" href="/user/student_application/edit/<?php echo $student_application['id']; ?>"><?= get_phrase('Modify') ?></a>
                    <a type="button" class="btn btn-primary waves-effect waves-light" href="/user/student_materials/page/<?php echo $student_application['id']; ?>/<?php echo $student_application['app_id']; ?>" disabled><?= get_phrase('materials') ?></a>
                    <a href="javascript:;" class="btn btn-secondary red waves-effect waves-light" data-bs-target="#deleteStudentApplication<?php echo $student_application['id']; ?>" data-bs-toggle="modal"><?php echo get_phrase('Delete'); ?></a>
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
                                <?php echo $student_application['id']; ?><input type="hidden" name="student_id" value="<?php echo $student_application['id']; ?>">
                            </div>
                            <div class="col-md-6">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                            </div>
                            <div class="col-md-4 answer"><?php echo $student_application['kanji_fn'] ?>
                                <input type="hidden" name="kanji_fn" value="<?php echo $student_application['kanji_fn'] ?>">
                            </div>
                            <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student_application['romaji_fn'] ?>
                                <input type="hidden" name="romaji_fn" value="<?php echo $student['romaji_fn'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Passport Number') ?>:
                            </div>
                            <div class="col-md-4 answer"><?php echo $student_application['passport'] ?>
                                <input type="hidden" name="passport" value="<?php echo $student['passport'] ?>">
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
                            <div class="col-md-4 answer"><?php echo $student_application['dst'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Application Place') ?></div>
                            <div class="col-md-4 answer">
                                <?php echo  $student_application['application_place']; ?>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Situation') ?>:
                            </div>
                            <div class="col-md-4 answer "> <?php echo $student_application['situation'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Residence Status') ?>: </div>
                            <div class="col-md-4 answer "> <?php echo $student_application['residence_ststus'] ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Residence Number') ?>:
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student_application['residence_no'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Period of Stay') ?>: </div>
                            <div class="col-md-4 answer"><?php echo $student_application['stay_period'] ?>
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
                                <div class="col-md-4 answer ">
                                    <?php
                                    $Relationship = $student_application['relationship'];
                                    echo get_phrase($Relationship);
                                    ?>

                                </div>
                                <div class="col-md-2"><?= get_phrase('Name') ?>: </div>
                                <div class="col-md-4 answer "><?php echo $student_application['relatives_name'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Address') ?>:
                                </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['relatives_address'] ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4"> <?= get_phrase('Date of birth') ?>: </div>
                                        <div class="col-md-8 answer "> <?php echo $student_application['relatives_dob'] ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"> <?= get_phrase('Co-Residence') ?>: </div>
                                        <div class="col-md-8 answer"> <?php echo $student_application['residence'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Contact Information') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['contact'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Residence Status') ?>:
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_application['residence_status'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Residence Card No.') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['residence_card'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Contact [rr_phone]') ?>: </div>
                                <div class="col-md-4 answer"><?php echo $student_application['contact_rr_phone'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Contact [rr_work]') ?>: </div>
                                <div class="col-md-4 answer "><?php echo $student_application['contact_work'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Contact [rr_school]') ?>:
                                </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['contact_school'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Status of Residence change history') ?>: </div>
                                <div class="col-md-10 answer"> <?php echo $student_application['residence_charge_history'] ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-2"><?= get_phrase('Number of Applicant') ?>: </div>
                            <div class="col-md-4 answer "> <?php echo $student_application['no_of_applicant'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Number of time not granted') ?>: </div>
                            <div class="col-md-4 answer "> <?php echo $student_application['no_of_time_granted'] ?>
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
                                        <div class="col-md-8 answer "> <?php echo $student_application['institute_name'] ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><?= get_phrase('Studied Hours') ?>: </div>
                                        <div class="col-md-8 answer "> <?php echo $student_application['studiedhours'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2"><?= get_phrase('Location') ?>:
                                </div>
                                <div class="col-md-4 answer "><?php echo $student_application['location'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Entered Date') ?>: </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['enteredday'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Graduation Date') ?>:
                                </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['gradutionday'] ?>
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
                            <?php endforeach; ?>


                        </div>
                        <br>
                        <div class="row" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                            <div class="content-header mb-3">
                                <h6 class="mb-0 u"><?= get_phrase('JLPT Examination Record') ?></h6>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Exam Name') ?>: </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['examname'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Grade') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_application['grade'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Result') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['results'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Exam Date') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Y,M') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"><?php echo $student_application['examdate'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Marks') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_application['marks'] ?>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Credentials') ?>#1 : </div>
                            <div class="col-md-4 answer "> <?php echo $student_application['credential#1'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Credentials') ?>#2 :
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student_application['credential#2'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Criminal records') ?> : </div>
                            <div class="col-md-4 answer"><?php echo $student_application['criminalrecords'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Forced deoarture Date') ?> :
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student_application['departure_date'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('Forced deoarture Time') ?> : </div>
                            <div class="col-md-4 answer"><?php echo $student_application['departure_time'] ?>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Number of forced deoarture times') ?> :
                            </div>
                            <div class="col-md-4 answer"> <?php echo $student_application['departure_no'] ?>
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
        </div>
    </div>