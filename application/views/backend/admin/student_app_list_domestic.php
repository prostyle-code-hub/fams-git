<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FANS5100 | List of Applicants (domestic user view)</span>
<script type="text/javascript">
    document.getElementById('student_page').style = 'background-color: #7467f0;color: white;';
</script>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Student Application') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Student Application List') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
                <a type="button" class="btn btn-secondary waves-effect waves-light"  href="/user/search_application_domestic/"><?= get_phrase('Search Student') ?></a>

            </div>

        </div>
    </div>

    <!-- Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="account-details" class="content">
                        <div class="content-header mb-3">
                            <h5 class="mb-0"><?= get_phrase('List of Students under the Agent') ?></h5>
                        </div>
                        <hr>


                        <div class="table-responsive-sm mt-4">
                            <table id="basic-datatable" class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th><?= get_phrase('Applicant ID') ?></th>
                                        <th><?= get_phrase('Full Name') ?><br><smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal></th>
                                <th><?= get_phrase('Registered Date') ?></th>
                                <th><?= get_phrase('application_status') ?></th>
                                <th style="width:10%"><?= get_phrase('action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php  foreach($students as $student) : ?>
                                        
                                    <?php //foreach ($students->result_array() as $key => $student) : ?>
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
                                                                            <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to imigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('submitted_to_imigration'); ?>"style="width: 30px;">
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
                                                                            <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to imigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('submitted_to_imigration'); ?>"style="width: 30px;">
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="status waves-effect" src="/assets/img/status/doc6.png" alt="Imigration examination result" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Receipt of immigration examination results'); ?>"style="width: 30px;">
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                        </div>
                                                           
                                                        </div>
                                                
                                            </td>
                                            <td>
                                               
                                                <?php //if ($student['nas'] != '1'){ ?>  
                                                <a href="<?php echo site_url('user/student_application_domestic/view/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                                </a>
                                                <a href="<?php echo site_url('user/student_application_domestic/edit/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                                </a>
                                                <?php //} ?>  

                                            </td>
                                        </tr>

                                        <!-- Delete Student -->
                                    <div class="modal fade" id="deleteStudentApp<?php echo $student['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">
                                                        <img src="../../assets/img/remove.gif" style="width: 50%;"> 
                                                        <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>?</h3>  
                                                        <p><?php echo get_phrase('Do You Want To Remove This Student Application?'); ?></p>
                                                    </div>
                                                    <div class="text-center mb-4">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                                        <a href="<?php echo site_url('user/student_application/delete/' . $student['id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>