<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FANS5200 | Search Applicant (Domestic user view)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="<?php echo site_url('user/search_application_domestic/search'); ?>" method = "post">
        <div class="row">
            <div class="col-md-8">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Student application') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Applicant Search') ?></span></h6>
            </div>
            <div class="col-md-4" style="text-align: right;">

                <div class="btn-group" role="group" aria-label="Button Set">
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Search') ?></button>
                </div>

            </div>
        </div>
        <div class="accordion" id="collapsibleSection">

            <div class="card active" data-select2-id="43">
                <div id="account-details" class="content">
                    <h2 class="accordion-header" id="headingDeliveryAddress">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryAddress" aria-expanded="true" aria-controls="collapseDeliveryAddress">
                            <?= get_phrase('Search Filters') ?>
                        </button>
                    </h2>
                    <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection" style="">
                        <div class="accordion-body">

                            <Small><?= get_phrase('You can search with any of bellow fields') ?> </Small>
                            <hr>
                            <!--load content -->
                            <div class="row mt-2">
                                <div class="col-md-2"><?= get_phrase('Applicant ID') ?>:</div>
                                <div class="col-md-4 form-check">

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="basic-default-email2">AP</span>
                                        <input type="text" id="basic-default-email" class="form-control" id="applicant_id" name="applicant_id" <?php if ($this->session->userdata('applicant_id') != '') { ?> value='<?php echo $this->session->userdata('applicant_id') ?>' <?php } ?>>
                                    </div>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Agent') ?>:<br>

                                </div>
                                <div class="col-md-4 form-check">
                                    <select name="agent" id="agent" class="ms-1 form-control form-input1">
                                        <option value='' ><?= get_phrase('Select Agent') ?></option>
                                        <?php
                                        foreach ($agents->result_array() as $key => $agent) {
                                            $sel = ($this->session->userdata('agent_id') === $agent['id']) ? 'selected' : '';
                                            $student_id = $agent['id'];
                                            echo "<option value='$student_id' $sel>"
                                            ?> 
                                            <?php echo $agent['first_name'] . ' ' . $agent['last_name']; ?>
                                            <?=
                                            "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2"><?= get_phrase('First ＆ middle name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " aria-label="Student Name"  id="kanji_lname" name="first_name" <?php if ($this->session->userdata('student_fn') != '') { ?> value='<?php echo $this->session->userdata('student_fn') ?>' <?php } ?>>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " aria-label="Student Name"  id="kanji_lname" name="last_name" <?php if ($this->session->userdata('student_ln') != '') { ?> value='<?php echo $this->session->userdata('student_ln') ?>' <?php } ?>>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2"><?= get_phrase('Nationality') ?>:</div>
                                <div class="col-md-4 form-check">
                                    <select name="nationality" id="birthcountry" class="ms-1 form-control form-input1">
                                        <option value='' ><?= get_phrase('Select Country') ?></option>
                                        <?php
                                        $bithcountry = ['country' => 'Select Country'];
                                        $countryList = ["Nepal", "India", "Sri Lanka", "Vietnam", "Japan", "Bangladesh", "Myanmar", "Mongolia", "Indonesia", "China", "Peru", "Philippines", "Thailand", "Iran", "Uzbekistan"];

                                        foreach ($countryList as $country) {
                                            $sel = ($this->session->userdata('nationality') === $country) ? 'selected' : '';
                                            echo "<option value='$country' $sel> "
                                            ?> 
                                            <?= get_phrase($country) ?> 
                                            <?=
                                            "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Desired admission time') ?>:</div>
                                <div class="col-md-4 form-check">
                                    <select class=" form-select  form-control" aria-label="relationship" name="dst" >
                                        <option value=""><small><?= get_phrase('Select Desired Admission Time') ?></small></option>
                                        <option value="April" <?php
                                        if ($this->session->userdata('dst') == "April") {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('April') ?></option>
                                        <option value="October" <?php
                                        if ($this->session->userdata('dst') == "October") {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('October') ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-2"><?= get_phrase('Application Status') ?>:</div>

                                <div class="col-md-4 form-check ">
                                    <select name="application_status" id="citizenship" class="ms-1 form-control form-input1 dropdown-toggl  dropdown-toggle waves-effect waves-light" >
                                        <option value=""><?= get_phrase('Select Status') ?></option>
                                        <option value="1" <?php
                                        if ($this->session->userdata('application_status') == 1) {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('under registration of documentation') ?></option>
                                        <option value="3" <?php
                                        if ($this->session->userdata('application_status') == 3) {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('under conirmation of documentation') ?></option>
                                        <option value="4" <?php
                                        if ($this->session->userdata('application_status') == 4) {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('all documents is checked') ?></option>
                                        <option value="5" <?php
                                        if ($this->session->userdata('application_status') == 5) {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('submitted to imigration') ?></option>
                                        <option value="6" <?php
                                        if ($this->session->userdata('application_status') == 6) {
                                            echo "selected";
                                        }
                                        ?>><?= get_phrase('Receipt of immigration examination results') ?></option>

                                    </select>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Application place') ?>:
                                </div>
                                <div class="col-md-4 form-check">

                                    <select class=" form-select  form-control" aria-label="relationship" id="applicationplace" name="application_place" >                                        
                                        <option value=""><small><?= get_phrase('Select the school') ?></small></option>
                                        <option value="ウェルテック専門学校 広島校" <?php
                                        if ($this->session->userdata('application_place') == "ウェルテック専門学校 広島校") {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Human Welfare Hiroshima Training School') ?></option>
                                        <option value="ダイキ日本語学院" <?php
                                        if ($this->session->userdata('application_place') == "ダイキ日本語学院") {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Daiki Japanese Language School') ?></option>
                                    </select>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="card accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions">
                        <?= get_phrase('Search Result') ?>
                    </button>
                </h2>
                <div id="collapseDeliveryOptions" class="accordion-collapse collapse <?php
                if (isset($search_result)) {
                    echo 'show';
                }
                ?>" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection" style="">
                    <div class="accordion-body">
                        <hr>
                        <div class="row">
                            <!-- Result View load here -->
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>AP<?= get_phrase('Applicantt ID') ?></th>
                                            <th><?= get_phrase('Student Name') ?></th>
                                            <th><?= get_phrase('Created Date') ?></th>
                                            <th><?= get_phrase('Application Status') ?></th>                                    
                                            <th><?= get_phrase('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php if (isset($search_result)) { ?>        
                                            <?php foreach ($search_result as $student) : ?>
                                                <?php //foreach ($search_result->result_array() as $key => $student) : ?>
                                                <tr>
                                                    <td>AP<?php echo $student['student_id']; ?></td>
                                                    <td><?php echo $student['student_name'] ?></td>
                                                    <td> 
                                                        <?php
                                                        $Lng = $this->session->userdata('language');
                                                        if ($Lng == 'english') {
                                                            $dbdate = strftime("%Y/%m/%d ", strtotime($student['created_at']));
                                                        } else if ($Lng == 'japanese') {
                                                            $dbdate = strftime("%Y年%m月%d日", strtotime($student['created_at']));
                                                        }
                                                        ?>
                                                        <?php echo $dbdate ?>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <?php if (($student['status'] == 1)) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="Under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under registration of documentation'); ?>"style="width: 30px;">
                                                                        </div>

                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($student['status'] == 3) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="Under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under registration of documentation'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <?php if ($student['error'] == 0) { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under conirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under conirmation of documentation'); ?>"style="width: 30px;">
                                                                            <?php } else { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Waiting for Correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Waiting for Correction'); ?>"style="width: 30px;">
                                                                            <?php } ?>
                                                                        </div> 
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                    </div>
                                                                <?php } ?>

                                                                <?php if ($student['status'] == 4) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="Under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under registration of documentation'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <?php if ($student['error'] == 0) { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under conirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under conirmation of documentation'); ?>"style="width: 30px;">
                                                                            <?php } else { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Waiting for Correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Waiting for Correction'); ?>"style="width: 30px;">
                                                                            <?php } ?>
                                                                        </div>                                                                
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents is checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents is checked'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                        <div class="col-md-2"></div>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($student['status'] == 5) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="Under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('UUnder registration of documentation'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <?php if ($student['error'] == 0) { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under conirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under conirmation of documentation'); ?>"style="width: 30px;">
                                                                            <?php } else { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Waiting for Correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Waiting for Correctio'); ?>"style="width: 30px;">
                                                                            <?php } ?>
                                                                        </div>                                                                
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents is checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents is checked'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to imigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Submitted to imigration'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                    </div>
                                                                <?php } ?>
                                                                <?php if ($student['status'] == 6) { ?>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="Under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under registration of documentation'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <?php if ($student['error'] == 0) { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under conirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under conirmation of documentation'); ?>"style="width: 30px;">
                                                                            <?php } else { ?>
                                                                                <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Waiting for Correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Waiting for Correction'); ?>"style="width: 30px;">
                                                                            <?php } ?>
                                                                        </div>                                                                
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents is checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents is checked'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to imigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Submitted to imigration'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc6.png" alt="Imigration examination result" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Imigration examination result'); ?>"style="width: 30px;">
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>

                                                        </div>
                                                    </td>               

                                                    <td style="width:15%">
                                                        <?php if ($student['nas'] !== '1') { ?>
                                                            <a  href="<?php echo site_url('user/student_application_domestic/view/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                                <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                                            </a>
                                                            <a href="<?php echo site_url('user/student_application_domestic/edit/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                                <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                                            </a>
                                                            <!--<a href="javascript:;" data-bs-target="#deleteStudent<?php $student['student_id']; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-trash"></span></i></a>-->
                                                        <?php } ?>
                                                    </td>

                                                    <!-- Render other student details here -->
                                                </tr>                                        
                                                <!-- Delete Student -->
                                            <div class="modal fade" id="deleteStudent<?php $student['student_id']; ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="text-center mb-4">
                                                                <img src="../../assets/img/remove.gif" style="width: 50%;"> 
                                                                <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>?</h3>  
                                                                <p><?php echo get_phrase('Do You Want To Remove This Student Application ?'); ?></p>
                                                            </div>
                                                            <div class="text-center mb-4">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                                                <a href="<?php echo site_url('user/student_application/delete/' . $student['student_id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- ENd Result -->
                        </div>
                    </div>
                </div>
                </form>   
            </div>                         
