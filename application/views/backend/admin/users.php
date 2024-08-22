
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= get_phrase('user_profile') ?> /</span> <?= get_phrase('agent_list') ?></h4>
        </div>
        <div class="col-xl-6">
            
        </div>
    </div>
    
    <!-- Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('agents'); ?></h4>
                    <a href="<?php echo site_url('user/user_form/add_aget'); ?>" class="btn btn-primary" role="button">Add Agent</a>
                    <div class="table-responsive-sm mt-4">
                        <table id="basic-datatable" class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th><?php echo get_phrase('agent_id'); ?></th>
                                    <th><?php echo get_phrase('name'); ?></th>
                                    <th></th>                                    
                                    <th><?php echo get_phrase('country'); ?></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users->result_array() as $key => $user) : ?>
                                    <tr>
                                        <td style="width:12%; "><?php echo $user['id']; ?></td>
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
                                        
                                        <td style="width:15%"><?php echo $user['country']; ?></td>
                                        <td style="width:15%">
                                            <a href="skype:<?php echo $user['skype']; ?>?call"><img src="<?php echo base_url() . 'assets/img/skype_logo.png'; ?>" height="30px"></a>
                                            <a href="skype:<?php echo $user['skype']; ?>?call"><?php echo get_phrase('call'); ?> </a> | <a href="skype:<?php echo $user['skype']; ?>?chat"><?php echo get_phrase('chat'); ?></a>
                                        </td>
                                        <td style="width:15%">
                                            <a  href="<?php echo site_url('user/manage_profile'); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                            </a>
                                            <a href="<?php echo site_url('user/user_form/edit_user_form/' . $user['id']) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                            </a>
                                            <span><a href="#" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('delete'); ?>"><i class="menu-icon tf-icons ti ti-trash"></i></a></span>                                         
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

</div>