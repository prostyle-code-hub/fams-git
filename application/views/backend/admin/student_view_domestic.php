<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5120 | Basic Applicant Information View (for domestic user)</span> <!-- UI Number -->
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
</style>
<script type="text/javascript">
    document.getElementById('student_page').style = 'background-color: #7467f0;color: white;';
</script>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant View') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('student-information') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right">
        <?php foreach ($students->result_array() as $key => $student) : ?>
            <div class="btn-group" role="group" aria-label="Button Set">
        <a type="button" class="btn btn-secondary waves-effect waves-light"  href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
           

                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Student Information') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"><?php echo $student['kanji_fn'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"><?php echo $student['kanji_ln'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>::<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>)</smal>
                                </div>
                                <div class="col-md-4 answer"><?php echo $student['romaji_fn'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?><br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>) </smal>
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['romaji_ln'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Sex') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['gender'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Date of Birth') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['dob'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name of Spouse') ?>:
                                </div>
                                <div class="col-md-4 answer"><?php echo $student['first_middle_name_spouse'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name of Spouse') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['last_name_spouse'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Birthplace Country / Preferecture: (Reagion)') ?>:
                                </div>
                                <div class="col-md-4 answer"><?= get_phrase($student['birth_country']) ?> 
                                </div>
                                <div class="col-md-2"><?= get_phrase('Permanent Address') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['permanent_address'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Country of Citizenship') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?= get_phrase($student['citizenship']) ?> 
                                </div>
                                <div class="col-md-2"><?= get_phrase('Occupation') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['occupation'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Passport Number') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['passport'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Passport Expiry Date') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['passport_exp'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Future Plans') ?>:
                                </div>
                                <div class="col-md-10 answer"> <?php echo $student['future_plan'] ?>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Contact in Home') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                            <br>
                            <div class="row g-3">
                                <!-- Row 1 -->
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('current_address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['current_address'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('contact_ap_fixed') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['contact_ap_fixed'] ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('contact_ap_fixed') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['contact_ap_fixed'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('contact_ap_mobile') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['contact_ap_mobile'] ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('contact_ap_mail') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['contact_ap_mail'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('contact_ap_fax') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['contact_ap_fax'] ?>
                                    </div>
                                </div>

                                <!-- Row 3 -->

                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Family Information') ?></h5>
                            </div>
                            <hr>
                            <!--load content -->
                           <!--load content -->
                            <?php if ($student['fr_1'] != "") { ?>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fr_1'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('First name and last name') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fname_1'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Date of birth') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fdob_1'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fp_1'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Current address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['faddress_1'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Life and death') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['flife_1'] ?>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                                
                                 <?php if ($student['fr_2'] != "") { ?>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fr_2'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('First name and last name') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fname_2'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Date of birth') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fdob_2'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fp_2'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Current address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['faddress_2'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Life and death') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['flife_2'] ?>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                                <?php if ($student['fr_3'] != "") { ?>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fr_3'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('First name and last name') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fname_3'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Date of birth') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fdob_3'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fp_3'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Current address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['faddress_3'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Life and death') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['flife_3'] ?>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                                
                                <?php if ($student['fr_4'] != "") { ?>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fr_4'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('First name and last name') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fname_4'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Date of birth') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fdob_4'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fp_4'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Current address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['faddress_4'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Life and death') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['flife_4'] ?>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                                
                                <?php if ($student['fr_5'] != "") { ?>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fr_5'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('First name and last name') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fname_5'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Date of birth') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fdob_5'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Profession') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['fp_5'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"> <?= get_phrase('Current address') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['faddress_5'] ?>
                                    </div>
                                    <div class="col-md-2"><?= get_phrase('Life and death') ?>:
                                    </div>
                                    <div class="col-md-4 answer"> <?php echo $student['flife_5'] ?>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                              
                                
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
                            <br>
                            <div class="row g-3">
                                <!-- Row 1 -->
                                <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Sponsor surname') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_surname'] ?>
                                </div>
                                <div class="col-md-2"> <?= get_phrase('Sponsor Name') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_name'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Relationship') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_relationship'] ?>
                                </div>
                                <div class="col-md-2"> <?= get_phrase('Sponsor present address') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_present_address'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Annual Income of Sponsor') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_annual_income'] ?>
                                </div>
                                <div class="col-md-2"> <?= get_phrase('Sponsor company') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_company'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Position of Sponsor') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_position'] ?>
                                </div>
                                <div class="col-md-2"> <?= get_phrase('Sponsor company address') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_company_address'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Contact (sp_fixed)') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_contact_sp_fixed'] ?>
                                </div>
                                <div class="col-md-2"> <?= get_phrase('Contact (sp_mobile)') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_contact_sp_mobile'] ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <?= get_phrase('Contact (sp_w_fixed)') ?>:
                                </div>
                                <div class="col-md-4 answer"> <?php echo $student['sponsor_contact_sp_w_fixed'] ?>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4 answer">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                                                         <!-- Delete Student -->
                                    <div class="modal fade" id="deleteStudent<?php echo $student['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">
														<img src="/assets/img/remove.gif" style="width: 50%;"> 
                                                        <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>?</h3>  
                                                        <p><?php echo get_phrase('Do You Want To Remove This Student ?'); ?></p>
                                                    </div>
                                                    <div class="text-center mb-4">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                                        <a href="<?php echo site_url('user/student/delete/' . $student['id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            <?php endforeach; ?>
        </div><!-- end col-->
    </div>
