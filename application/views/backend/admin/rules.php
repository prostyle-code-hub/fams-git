<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS3210 | Application Rules (Agent view to study application rules)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('learn_page').style = 'background-color: #7467f0;color: white;';
</script>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-7">
            <h6 class="fw-bold py-3 ms-4">
                <span><?= get_phrase('Learn before Use') ?> |</span><span class="purple-text" style=" color: #7467f0; ">
 <?= get_phrase('School Rule') ?></span>
            </h6>
        </div>
        <div class="col-md-5" style="text-align: right;"></div>
    </div>

    <!-- Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="account-details" class="content">
                        <div class="content-header mb-3">
                            <h5 class="mb-0"><?php echo get_phrase('school_rule'); ?></h5>
                            <small><?= get_phrase('last_updated_date') ?> : <?php echo $created_at; ?></small>
                        </div>
                        <hr>
                        <br>
                        <div class="row g-3">
                            <div class="col-md-10" id="" style="min-height: 460px">
                                <?php if ($mini_test == 1) { ?>
                                    <form action="<?php echo site_url('user/school_rules_test/') . $next_id; ?>" enctype="multipart/form-data" method="post">
                                        <div class="row g-3"><!-- comment -->
                                            <input type="hidden" name="rule" value="<?php echo $slide_id ?>" />
                                            <div class="col-sm-12">                                       
                                                <small class="text-light fw-semibold d-block"><?php echo get_phrase('question_1'); ?></small>
                                                <div class="form-check form-check-inline mt-3">
                                                    <input class="form-check-input" type="radio" name="question_1" id="inlineRadio1" value="option_1" required  <?php
                                                    if ($q1_op == 'option_1') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="question_1" id="inlineRadio2" value="option_2" required <?php
                                                    if ($q1_op == 'option_2') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">                                        
                                                <small class="text-light fw-semibold d-block"><?php echo get_phrase('question_2'); ?></small>
                                                <div class="form-check form-check-inline mt-3">
                                                    <input class="form-check-input" type="radio" name="question_2" id="inlineRadio1" value="option_1" required <?php
                                                    if ($q2_op == 'option_1') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="question_2" id="inlineRadio2" value="option_2" required <?php
                                                    if ($q2_op == 'option_2') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">                                        
                                                <small class="text-light fw-semibold d-block"><?php echo get_phrase('question_3'); ?></small>
                                                <div class="form-check form-check-inline mt-3">
                                                    <input class="form-check-input" type="radio" name="question_3" id="inlineRadio1" value="option_1" required required <?php
                                                    if ($q3_op == 'option_1') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="question_3" id="inlineRadio2" value="option_2" required required <?php
                                                    if ($q3_op == 'option_2') {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                    <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="text-align: right">
                                                <input type="hidden" name="end" value="1" />
                                                <button type="submit" class="btn btn-lg btn-primary"><?php echo get_phrase('submit'); ?></button>

                                            </div>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <?php
                                    $url = base_url('uploads/slide/' . $slide_img);
                                    echo '<img src=' . $url . ' class="img-fluid" style="width: 100%;" >';
                                    ?>
                                    <hr>

                                    <form action="<?php echo site_url('user/school_rules_test/') . $next_id; ?>" enctype="multipart/form-data" method="post">
                                        <div class="row g-3"><!-- comment -->
                                            <input type="hidden" name="rule" value="<?php echo $slide_id ?>" />

                                            <div class="col-sm-12" style="text-align: right">
                                                <?php if ($rule_complete == 1) { ?>
                                                    <input type="hidden" name="complete" value="1" />
                                                    <button type="submit" class="btn btn-lg btn-primary"><?php echo get_phrase('complete'); ?></button>
                                                <?php } else { ?>
                                                    <input type="hidden" name="complete" value="0" />
                                                    <button type="submit" class="btn btn-lg btn-primary"><?php echo get_phrase('next_rule'); ?></button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                            <div class="col-md-2" style="background-color: #f8f7fa;">
                                <ul class="list-group">                                  
                                    <!-- add link text  -->
                                    <?php
                                    foreach ($rule_lists as $key => $rule_page) {
                                        echo $rule_page;
                                    }
                                    ?>
                                </ul>
                            </div>         
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6" style="text-align: right">

                            </div>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>


    <!-- Header -->