<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS2110 | Application Rules (Domestic User view)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('learn_page').style = 'background-color: #7467f0;color: white;';
</script>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Learn before use') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('School Rule') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <div class="btn-group" role="group">
                <a type="button" class="btn btn-secondary waves-effect waves-light" href="<?php echo site_url('user/stuff_information'); ?>"><?= get_phrase('Back') ?></a>    
                <a type="button" class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('user/update_new_rule'); ?>"><?= get_phrase('update_new_rule') ?></a>
            </div>

        </div>
    </div>

    <!-- Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-10">
                            <div id="output" style="min-height: 460px"></div>  
                            <div>
                                <hr>
                                <form action="" enctype="multipart/form-data" method="post">
                                    <div class="row g-3"><!-- comment -->
                                        <div class="col-sm-12"> 
                                            <p>1. <?php echo get_phrase('question_1'); ?></p>                                  
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="question_1" id="inlineRadio1" value="option_1" />
                                                <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="question_1" id="inlineRadio2" value="option_2" />
                                                <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">                                        
                                            <p>2. <?php echo get_phrase('question_2'); ?></p> 
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="question_2" id="inlineRadio1" value="option_1" />
                                                <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="question_2" id="inlineRadio2" value="option_2" />
                                                <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">                                        
                                            <p>3. <?php echo get_phrase('question_3'); ?></p>
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio" name="question_3" id="inlineRadio1" value="option_1" />
                                                <label class="form-check-label" for="inlineRadio1"><?php echo get_phrase('yes'); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="question_3" id="inlineRadio2" value="option_2" />
                                                <label class="form-check-label" for="inlineRadio2"><?php echo get_phrase('no'); ?></label>
                                            </div>
                                        </div>
                                        <small style="color : #7467f0 ;"><?php echo get_phrase('Mini Test can be done only for the agents. When ever you update or modify school rules all agents must re-study the school rules.'); ?>
                                        </small>

                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-2" style="background-color: #dbdade;">
                            <ul class="list-group">      
                                
                                <?php $rule_page = 1; ?>
                                <?php foreach ($rules->result_array() as $key => $rule) : ?>                                
                                    <li class="list-group-item waves-effect waves-light">
                                        <a href="#" onClick="getPage(<?php echo $rule['id']; ?>, this);"><?php echo  'Page '.' - '. $rule_page.'/'.$num_of_rules; ?></a></li>
                                    <?php $rule_page++; ?>
                                <?php endforeach; ?>
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

<script>
    function getPage(id, obj) {
        $(".page-menu").removeClass("active");
        $('#output').html('<img class="loader" src="loader.gif" />');
        jQuery.ajax({
            url: "get_content",
            data: 'id=' + id,
            type: "POST",
            success: function (data) {
                $(obj).addClass("active");
                $('#output').html(data);
            }
        });
    }

    window.onload = function () {
        getPage(1, $(".page-menu:first-child"));
    };
</script>