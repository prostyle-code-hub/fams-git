<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS4100 | Domestic user List</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Domestic user') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('domestic_user_list') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
             <!-- <a type="button" class="btn btn-secondary waves-effect waves-light" disabled  href="<?php echo site_url('user/domestic/search'); ?>" ><?= get_phrase('Search Deomstic user') ?></a> -->
                <a type="button" class="btn btn-primary waves-effect waves-light"  href="<?php echo site_url('user/domestic/add'); ?>"><?= get_phrase('Add Domestic User') ?></a>
            </div>

        </div>
    </div>

    <!-- Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                <div class="content-header mb-3">
                                <h5 class="mb-0"><?php echo get_phrase('domestic_user_list'); ?></h5>
                            </div>
                            <hr>
                 

                    <div class="table-responsive-sm mt-4">
                        <table id="basic-datatable" class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th><?php echo get_phrase('domestic_id'); ?></th>
                                    <th></th>
                                    <th><?php echo get_phrase('Domestic user name'); ?></th>                                    
                                    <th><?php echo get_phrase('email'); ?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users->result_array() as $key => $user) : ?>
                                    <tr>
                                        <td style="width:12%; ">UID<?php echo $user['id']; ?></td>
                                        <td style="width:8%;">
                                            <img src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="" height="35px" width="35px" class="img-fluid rounded-circle img-thumbnail">
                                        </td>
                                        <td style="width:25"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                                            <?php if ($user['status'] != 1) : ?>
                                                <small>
                                                    <p><?php echo get_phrase('status'); ?>: <span class="badge badge-danger-lighten"><?php echo get_phrase('unverified'); ?></span></p>
                                                </small>
                                            <?php endif; ?>
                                        </td>

                                        <td style="width:15%"><?php echo $user['email']; ?></td>
                                        <td style="width: 25%;">
                                            <a href="skype:<?php echo $user['skype']; ?>?chat"><img src="<?php echo base_url() . 'assets/img/skype_logo.png'; ?>" height="30px"></a>
                                            <a href="skype:<?php echo $user['skype']; ?>?chat"><?php echo get_phrase('Contact Via Skype'); ?></a>
                                        </td>
                                        <td style="width:15%">

                                            <a href="javascript:;" data-bs-target="#viewAgent<?php echo $user['id']; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-eye"></i></span></a>


                                            <a href="<?php echo site_url('user/domestic/edit/' . $user['id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                            </a>
                                            <span>
                                                <a href="javascript:;" data-bs-target="#deleteAgent<?php echo $user['id']; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-trash"></span></i></a>
                                            </span>  

                                        </td>
                                    </tr>

                                    <!-- Modals -->
                                    <!-- Edit Rule Modal -->
                                <div class="modal fade" id="viewAgent<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="mb-4">
                                                    
                                                    <h5 class="fw-bold py-3 mb-4">
                                                        <span class="text-muted fw-light"><?= get_phrase('agent_information') ?> |</span> <?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h5>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <img src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="" height="100px" width="100px" class="img-fluid rounded-circle img-thumbnail">
                                                        </div>
                                                        <div class="col-xl-5">
                                                            <p><?= get_phrase('Name') ?> : <?php echo $user['first_name'] . ' ' . $user['last_name']; ?></p>
                                                            <p><?= get_phrase('Country') ?> : <?= get_phrase('Japan') ?>
                                                           
                                                        </div>
                                                        <div class="col-xl-5"></div>
                                                    </div>
                                                    <div class="row">
                                                        <hr/>
                                                    </div>
                                                    <div class="row">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Agent -->
                                <div class="modal fade" id="deleteAgent<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 class="mb-2" style="color : #7367f0">Are you sure?</h3>  
                                                    <p>Do You Want To Remove This Domestic User ?</p>
                                                </div>
                                                <div class="text-center mb-4">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <a href="<?php echo site_url('user/domestic/delete/' . $user['id'])   ?>" class="btn btn-danger" role="button">Yes</a>                                                    
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