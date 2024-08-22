<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS8000 | Call Domestic user</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Domestic user') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('domestic_user_list') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <div class="btn-group" role="group" aria-label="Button Set"></div>
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
                                    <th></th>                                    
                                    <th><?php echo get_phrase('Domestic user name'); ?></th>
                                    <th><?php echo get_phrase('email'); ?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users->result_array() as $key => $user) : ?>
                                    <tr>                                        
                                        <td>
                                            <img src="<?php echo $this->user_model->get_user_image_url($user['id']); ?>" alt="" height="35px" width="35px" class="img-fluid rounded-circle img-thumbnail">
                                        </td>
                                        <td>
                                            <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                                            <?php if ($user['status'] != 1) : ?>
                                                <small>
                                                    <p><?php echo get_phrase('status'); ?>: <span class="badge badge-danger-lighten"><?php echo get_phrase('unverified'); ?></span></p>
                                                </small>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo $user['email']; ?></td>
                                        <td>
                                            <a href="skype:<?php echo $user['skype']; ?>?call"><img src="<?php echo base_url() . 'assets/img/skype_logo.png'; ?>" height="30px"></a>
                                            <a href="skype:<?php echo $user['skype']; ?>?call"><?php echo get_phrase('Call'); ?></a>
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