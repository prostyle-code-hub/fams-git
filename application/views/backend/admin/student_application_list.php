<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7200 | List of Application Forms (Agent View)</span>
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
</script>
<style>
    .status {
        width: 20px;
    }
    .no_status {
        -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Student Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Applicatio List') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
                <a type="button" class="btn btn-secondary waves-effect waves-light"  href="/user/search_application" disable><?= get_phrase('Search Application') ?></a>
                <a type="button" class="btn btn-primary waves-effect waves-light"  href="/user/create_new_student_application"><?= get_phrase('New Application') ?></a>

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
                            <small><?= get_phrase('This will show only the applicant created by your agent account only.') ?></small>
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
                                <th><?= get_phrase('action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students as $student) : ?>
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
                                                <?php if($student['documents'] == 1){ ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if (($student['status'] == 1)) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('under registration of documentation'); ?>"style="width: 30px;">
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
                                                                    <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('under registration of documentation'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <?php if ($student['error'] == 0) { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under confirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under confirmation of documentation'); ?>"style="width: 30px;">
                                                                    <?php } else { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Document waiting for correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Document waiting for correction'); ?>"style="width: 30px;">
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
                                                                    <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('under registration of documentation'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <?php if ($student['error'] == 0) { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under confirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under confirmation of documentation'); ?>"style="width: 30px;">
                                                                    <?php } else { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Document waiting for correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Document waiting for correction'); ?>"style="width: 30px;">
                                                                    <?php } ?>
                                                                </div>                                                                
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents have been checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents have been checked'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-2"></div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($student['status'] == 5) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Uunder registration of documentation'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <?php if ($student['error'] == 0) { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under confirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under confirmation of documentation'); ?>"style="width: 30px;">
                                                                    <?php } else { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Document waiting for correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Waiting for Correctio'); ?>"style="width: 30px;">
                                                                    <?php } ?>
                                                                </div>                                                                
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents have been checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents have been checked'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to immigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Submitted to immigration'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2"></div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($student['status'] == 6) { ?>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc1.png" alt="under registration of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('under registration of documentation'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <?php if ($student['error'] == 0) { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc2.png" alt="Under confirmation of documentation" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Under confirmation of documentation'); ?>"style="width: 30px;">
                                                                    <?php } else { ?>
                                                                        <img class="status waves-effect" src="/assets/img/status/doc3.png" alt="Document waiting for correction" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Document waiting for correction'); ?>"style="width: 30px;">
                                                                    <?php } ?>
                                                                </div>                                                                
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc4.png" alt="All documents have been checked" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('All documents have been checked'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc5.png" alt="Submitted to immigration" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Submitted to immigration'); ?>"style="width: 30px;">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <img class="status waves-effect" src="/assets/img/status/doc6.png" alt="Receipt of immigration examination results" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?php echo get_phrase('Receipt of immigration examination results'); ?>"style="width: 30px;">
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                                <?php } ?>
                                            </td>
                                            <td>

                                                <a  href="<?php echo site_url('user/student_application/view/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                                </a>
                                                <a href="<?php echo site_url('user/student_application/edit/' . $student['student_id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                                </a>
                                                <a href="javascript:;" data-bs-target="#deleteStudentApp<?php echo $student['student_id']; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-trash"></span></i></a>
                                            </td>
                                        </tr>

                                        <!-- Application remark note -->

                                    <div class="modal fade" id="remark<?php echo $student['student_id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">

                                                        <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('remark'); ?></h3> 
                                                    </div>
                                                    <div class="mb-4">
                                                        <p><?php echo $student['remarks']; ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Student -->
                                    <div class="modal fade" id="deleteStudentApp<?php echo $student['student_id']; ?>" tabindex="-1" aria-hidden="true">
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
                                                        <a href="<?php echo site_url('user/student_application/delete/' . $student['student_id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>                                                    
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