<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5112 | Add or Modify Applicant Immigration Infomration </span> <!-- UI Number -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('st_application_page').style = 'background-color: #7467f0;color: white;';
</script>
<style>
    .answer {
        color: #355089  !important;
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
    function addDashes(f)
    {
        f.value = f.value.slice(0, 3) + "-" + f.value.slice(3, 6) + "-" + f.value.slice(6, 10);
    }
</script>

<script>
var isLoaded = false;
$(window).scroll(function() {
var height = $(window).scrollTop();
if(height  > 350) {
    if(!isLoaded){

    }
}
});
</script>

<!-- Content wrapper ------------------------------------------------------------------------------------------------------------------------------------------>
<div class="container-xxl flex-grow-1 container-p-y" onload="scrollWin()">

    <div class="row">
        <div class="col-md-5">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Appication') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Application View') ?></span></h6>
        </div>
        <div class="col-md-7" style="text-align: right;">
        <?php foreach ($students_app->result_array() as $key => $student_app) : ?>
            <form action="<?php echo site_url('user/student_immigration_information/add'); ?>" enctype="multipart/form-data" method="post">
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-secondary waves-effect waves-light"  href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                <button type="reset" class="btn btn-secondary red waves-effect waves-light"><?= get_phrase('Clear') ?></button>
                <button type="button" class="btn btn-primary waves-effect waves-light" disabled><?= get_phrase('materials') ?></button>
                <a type="button" class="btn btn-secondary blue waves-effect waves-light"  href="/user/student_application_domestic/view/<?php echo $student_app['id']; ?>"><?= get_phrase('View Application') ?></a>
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
                                    <?php echo $student_app['id']; ?><input type="hidden" name="student_id" value="<?php echo $student_app['id']; ?>" > 
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
                                <div class="col-md-4 answer"> <?php echo $student_app['romaji_fn'] ?>
                                    <input type="hidden" name="romaji_fn" value="<?php echo $student['romaji_fn'] ?>">
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
                                    <input type="hidden" value="<?php echo $student_app['passport_exp'] ?>" >
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
                                <div class="col-md-4 answer ">  <?php echo $student_app['residence_ststus'] ?>  
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
                                    <div class="col-md-2"><?= get_phrase('Name') ?>: </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['relatives_name'] ?>  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Address') ?>:
                                    </div>
                                    <div class="col-md-4 answer ">  <?php echo $student_app['relatives_address'] ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">    <?= get_phrase('Date of birth') ?>: </div>
                                            <div class="col-md-8 answer "> <?php echo $student_app['relatives_dob'] ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">    <?= get_phrase('Co-Residence') ?>: </div>
                                            <div class="col-md-8 answer"> <?php echo $student_app['residence'] ?>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Contact Information') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['contact'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Residence Status') ?>:
                                    </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['residence_status'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Residence Card No.') ?>: </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['residence_card'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Contact [rr_phone]') ?>: </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['contact_rr_phone'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Contact [rr_work]') ?>: </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['contact_work'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Contact [rr_school]') ?>:
                                    </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['contact_school'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Status of Residence change history') ?>: </div>
                                    <div class="col-md-10 answer"> <?php echo $student_app['residence_charge_history'] ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-2"><?= get_phrase('Number of Applicant') ?>: </div>
                                <div class="col-md-4 answer ">  <?php echo $student_app['no_of_applicant'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Number of time not granted') ?>: </div>
                                <div class="col-md-4 answer "> <?php echo $student_app['no_of_time_granted'] ?>
                                </div></div>

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
                                            </div></div>
                                        <div class="row">
                                            <div class="col-md-4"><?= get_phrase('Studied Hours') ?>: </div>
                                            <div class="col-md-8 answer "> <?php echo $student_app['studiedhours'] ?>
                                            </div></div>
                                    </div>

                                    <div class="col-md-2"><?= get_phrase('Location') ?>:
                                    </div>
                                    <div class="col-md-4 answer "><?php echo $student_app['location'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Entered Date') ?>: </div>
                                    <div class="col-md-4 answer">  <?php echo $student_app['enteredday'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Graduation Date') ?>:
                                    </div>
                                    <div class="col-md-4 answer "> <?php echo $student_app['gradutionday'] ?>
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
                                    <div class="col-md-4 answer"> <?php echo $student_app['examname'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Grade') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student_app['grade'] ?>
                                    </div></div>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Result') ?>: </div>
                                    <div class="col-md-4 answer ">  <?php echo $student_app['results'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Exam Date') ?>:<br>
                                        <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Y,M') ?>) </smal>
                                    </div>
                                    <div class="col-md-4 answer"><?php echo $student_app['examdate'] ?>
                                    </div></div>
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
                                <div class="col-md-4 answer ">   <?php echo $student_app['credential#1'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Credentials') ?>#2 :
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['credential#2'] ?>
                                </div></div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Criminal records') ?> : </div>
                                <div class="col-md-4 answer"><?php echo $student_app['criminalrecords'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Departure order') ?> :<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Times, date') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student_app['departureorder'] ?>
                                </div></div>

                        </div>
                        <br>
                            <div class="row" id="section1" style="border: 1px solid color(srgb 0.81 0.81 0.81); padding-top: 10px; padding-bottom: 10px;background-color: color(srgb 0.99 0.99 0.99);border-radius: 6px;">
                                <div class="content-header mb-3">
                                    <h6 class="mb-0 u" style="color: color(srgb 0.453 0.4024 0.9418);"><?= get_phrase('Immigration Information') ?></h6>
                                    <input type="hidden" name="student_id" value="<?php echo $student_app['student_id']; ?>">
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2"><?= get_phrase('Entry Date') ?>: </div>
                                    <div class="col-md-4 answer">
                                        <input type="date" class="form-control " aria-label="entry date" id="entrydate" name="entry_date" value="<?php echo date('Y-m-d',strtotime($student_app["entry_date"])) //echo $student_app['entry_date']; ?>" >
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Period of stay') ?>:
                                    </div>
                                    <div class="col-md-4 answer"><input type="text" class="form-control" aria-label="period of stay" id="period_of_stay" name="period_of_stay" value="<?php echo $student_app['period_of_stay']; ?>">
                                    </div></div>
                                <div class="row mb-2">
                                    <div class="col-md-2"><?= get_phrase('Contact in person') ?>: </div>
                                    <div class="col-md-4 answer "> <input type="text" class="form-control" aria-label="graduation day" id="contact_in_person" name="contact_in_person" value="<?php echo $student_app['contact_in_person']; ?>" >
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Address in japan') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <input type="text" class="form-control" aria-label="address in japan" id="japan_address" name="japan_address" value="<?php echo $student_app['japan_address']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-2"><?= get_phrase('Resident Card Copy') ?>: <br> <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('in pdf format') ?>) </smal></div>
                                    <div class="col-md-10 answer "><input type="file" class="form-control" aria-label="resident card copy" id="copy_of_residentcard" name="copy_of_resident_card" value="<?php echo $student_app['copy_of_resident_card']; ?>">
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

