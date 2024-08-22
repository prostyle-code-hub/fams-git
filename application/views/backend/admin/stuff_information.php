<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS2100 | School List</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('school_stuff') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('information') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
                <div class="btn-group" role="group">
                <a type="button" class="btn btn-secondary waves-effect waves-light" href="<?php echo site_url('user/update_new_rule'); ?>"><?= get_phrase('Update School Rule') ?></a>
                    <a type="button" class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('user/school_rule'); ?>"><?= get_phrase('View school_rules') ?></a>
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
                            <h5 class="mb-0"><?= get_phrase('school_list') ?></h5>
                        </div>
                        <hr>
                        <!--load content -->
                    <div class="table-responsive-sm mt-4">
                        <table id="basic-datatable" class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th><?php echo get_phrase('school_id'); ?></th>
                                    <th><?php echo get_phrase('school_name'); ?></th>
                                    <th><?php echo get_phrase('primary_contact'); ?></th>                                    
                                    <th><?php echo get_phrase('phone'); ?></th>
                                    <th></th>                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($users->result_array() as $key => $user) : ?>

                                    <tr>
                                        <td style="width: 10%;"><?php echo $user['school_id']; ?></td>    
                                        <td style="width: 40%;"><?php echo $user['school_name']; ?></td>
                                        <td style="width: 20%;"><?php echo $user['primary_contact']; ?></td>
                                        <td style="width: 20%"><?php echo $user['phone']; ?></td> 
                                        <th style="width: 10%"><a href="javascript:;" data-bs-target="#viewSchool<?php echo $user['school_id']; ?>" data-bs-toggle="modal" ><span><i class="menu-icon tf-icons ti ti-eye"></i></span></a></th>
                                    </tr>

                                    <!-- Modals -->
                                    <!-- Edit Rule Modal -->
                                <div class="modal fade" id="viewSchool<?php echo $user['school_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                        <div class="modal-content p-3 p-md-5">                                           
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2" style="color : #7367f0"><?php echo $user['school_name']; ?></h3>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4"><?php echo get_phrase('school_id'); ?> :</div>
                                                    <div class="col-sm-8"><?php echo $user['school_id']; ?></div>
                                                    <div class="w-100"></div>
                                                    <div class="col-sm-4"><?php echo get_phrase('school_name'); ?> :</div>
                                                    <div class="col-sm-8"><?php echo $user['school_name']; ?></div>
                                                    <div class="w-100"></div>
                                                    <div class="col-sm-4"><?php echo get_phrase('postal_code'); ?> : </div>
                                                    <div class="col-sm-8"><?php echo "〒 " . $user['postal_code']; ?></div>
                                                    <div class="w-100"></div>
                                                    <div class="col-sm-4"><?php echo get_phrase('address'); ?> :</div>
                                                    <div class="col-sm-8"><?php echo $user['address']; ?></div>
                                                    <div class="w-100"></div>
                                                    <div class="col-sm-4"><?php echo get_phrase('phone'); ?> : </div>
                                                    <div class="col-sm-8"><?php echo $user['phone']; ?></div>
                                                    <div class="w-100"></div>
                                                    <div class="col-sm-4"><?php echo get_phrase('primary_contact'); ?> : </div>
                                                    <div class="col-sm-8"><?php echo $user['primary_contact']; ?></div>
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