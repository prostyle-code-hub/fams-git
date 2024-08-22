<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5400 | Applicant List (Agent View)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('student_page').style = 'background-color: #7467f0;color: white;';
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant Students') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('student_list') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
                <a type="button" class="btn btn-secondary waves-effect waves-light"  href="/user/search_student"><?= get_phrase('Search Student') ?></a>
                <a type="button" class="btn btn-primary waves-effect waves-light"  href="/user/student/add"><?= get_phrase('Register New Student') ?></a>
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
                                        <th><?php echo get_phrase('id'); ?></th>
                                        <th><?php echo get_phrase('name'); ?></th>                                                                       
                                        <th><?php echo get_phrase('registerd_date'); ?></th>
                                       
                                        <th><?php echo get_phrase('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($students->result_array() as $key => $student) : ?>
                                        <tr>
                                            <td style="width:5%; ">AP<?php echo $student['id']; ?></td>                                        
                                            <td style="width:25">
                                                <?php echo $student['kanji_fn'];?> <?php echo $student['kanji_ln'];?>                                      
                                            </td>                                        
                                            <td style="width:15%"><?php echo $student['created_at']; ?></td>
                                            
                                            <td style="width:20%">
                                                <a  href="<?php echo site_url('user/student/view/' . $student['id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                                </a>
                                                <a href="<?php echo site_url('user/student/edit/' . $student['id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                    <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                                </a>
                                                <a href="javascript:;" data-bs-target="#deleteStudent<?php echo $student['id']; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-trash"></span></i></a>
                                            </td>
                                        </tr>
                                         <!-- Delete Student -->
                                    <div class="modal fade" id="deleteStudent<?php echo $student['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">
														<img src="../../assets/img/remove.gif" style="width: 50%;"> 
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
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>