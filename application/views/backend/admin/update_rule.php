<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS2120 | Update Application Rule</span> <!-- UI Number -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('School Rule') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('update_school_rule') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <?php 
            
            if($this->session->userdata('language') == 'japanese'){
                $file_name = 'Application_rule_manual_jp';
            }else{
                $file_name = 'Application_rule_manual_en';
            }
            
            
            ?>
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-secondary waves-effect waves-light" download href="<?php echo site_url('uploads/downloads/'.$file_name.'.pdf'); ?>"><?= get_phrase('download_manual') ?></a>
                <a type="button" class="btn btn-secondary waves-effect waves-light" href="<?php echo site_url('user/school_rule'); ?>"><?= get_phrase('View school_rules') ?></a>
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
                            <h5 class="mb-0"><?= get_phrase('Notes') ?></h5>
                            <small><?php echo get_phrase('Please click the `Download Manual` to learn how to upldate school rule. Rule Upload only supported on PNG format.'); ?></small>
                        </div>
                        <hr>
                        <!--load content -->

                        <div class="row g-3">

                            <form action="<?php echo site_url('user/rules/add'); ?>" enctype="multipart/form-data" method="post">

                                <div class="row">
                                    <div class="col-md-2"><?php echo get_phrase('screen_title'); ?>:
                                        
                                    </div>
                                    <div class="col-md-4 answer"><input type="text" class="form-control" name="screen_title" aria-describedby="" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="file" id="formFile" name="slide" required />
                                    </div>
                                    <div class="col-md-2 answer">
                                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('Upload'); ?></button>
                                    </div>
                                </div>


                            </form>
                            <hr>
                            <br>
                        </div>
                        <div class="row" style="background-color: #f7f7f7;">
                            <h6><?php echo get_phrase('list_of_uploads'); ?></h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><?php echo get_phrase('slide'); ?></th>
                                        <th scope="col"><?php echo get_phrase('uploaded_date_and_time'); ?></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $rule_page = 1; ?>
                                    <?php foreach ($rules->result_array() as $key => $rule) : ?>
                                        <tr>
                                            <td style="width:60%;"><?php echo 'Page - '.$rule_page.'/'.$num_of_rules ?></td>
                                            <td style="width:20"><?php echo $rule['created_date']; ?></td>
                                            <td style="width:10"><a href="javascript:;" data-bs-target="#editSlide<?php echo $rule['id']; ?>" data-bs-toggle="modal"><?php echo get_phrase('view'); ?></a></td>
                                            <td style="width:10"><a href="javascript:;" data-bs-target="#deleteSlide<?php echo $rule['id']; ?>" data-bs-toggle="modal"><?php echo get_phrase('delete'); ?></a></td>
                                        </tr>

                                        <!-- Modals -->
                                        <!-- Edit Rule Modal -->
                                        <div class="modal fade" id="editSlide<?php echo $rule['id']; ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        <div class="mb-4">

                                                            <div class="row">
                                                                <div class="col-md-2"><?php echo get_phrase('Page Title'); ?>:<br>

                                                                </div>
                                                                <div class="col-md-4 answer" style="color: #7467f0;"><?php echo $rule['title']; ?>
                                                                </div>
                                                                <div class="col-md-4"><small>Created Date:</small>
                                                                </div>
                                                                <div class="col-md-2 answer">
                                                                    <?php echo $rule['created_date']; ?>
                                                                </div>
                                                            </div>
                                                            <hr>

                                                            <div>
                                                                <?php $url = base_url('uploads/slide/' . $rule['slide']); ?>
                                                                <img src="<?php echo $url ?>" class="img-fluid" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <!-- Delete Rule Modal -->
                                            <div class="modal fade" id="deleteSlide<?php echo $rule['id']; ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="text-center mb-4">
                                                                <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>!</h3>
                                                                <br>
                                                                <p><?php echo get_phrase('Do you wnat to remove this slide (School Rule)'); ?> ?</p>
                                                            </div>
                                                            <div class="text-center mb-4">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                                                <a href="<?php echo site_url('user/delete_rule/' . $rule['id']) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $rule_page++; ?>
                                        <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">

                            <br>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>