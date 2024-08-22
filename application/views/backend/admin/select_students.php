<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7100 | New Application Form (Select Applicant)</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
</script>
<style>
small {
	font-size: x-small;
    color: #7467f0;
}
.red:hover {
    background-color: #dd4b39 !important;
}
.green:hover {
    background-color: #28c76f !important;
}
.blue:hover {
    background-color: #7567f0 !important;
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Select Applicant') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">

            <div class="btn-group" role="group" aria-label="Button Set">
                <a type="button" class="btn btn-secondary waves-effect waves-light"   href="javascript:history.go(-1)"><?= get_phrase('Back') ?></a>
                <a type="button" class="btn btn-secondary blue waves-effect waves-light"  href="/user/search_application"><?= get_phrase('Search Application') ?></a>
                <a type="button" class="btn btn-secondary  green waves-effect waves-light"  href="/user/student/add"><?= get_phrase('Create New Student') ?></a>
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
                            <h5 class="mb-0"><?= get_phrase('Create Applicant Application') ?></h5>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-md-4">
                                
                                <?php   
                                $lng =  $this->session->userdata('language');
                                
                                if( $lng == "japanese"){ 
                                    echo " <img src='/assets/img/upload_progress_jp.gif' alt='Status' style='width: 100%;'>";
                                 }
                                 elseif ( $lng == "english") {
                                    echo " <img src='/assets/img/upload_progress.gif' alt='Status' style='width: 100%;'>";
                                 }
                                ?>
                                
                                </div>
                                <div class="col-md-8">
                                    <h5><?= get_phrase('Select Registered Applicant') ?></h5>
                                    <p align="justify"><?= get_phrase('Application_Select_Content') ?></p>
                                </div>
                                
                            </div>

                        
                        <div class="col-xl-12">
                            <form action="<?php echo site_url('user/create_new_student_application/new'); ?>" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-8">
                                        
                                        <select name="non_reg_student" id="birthcountry" class="ms-1 form-control form-input1 mandatory" required >
                                            <option value='' ><?= get_phrase('Select Student') ?></option>
                                            <?php foreach ($students->result_array() as $key => $student) : ?>        
                                                <option value='<?php echo $student['id'] ?>'><?php echo $student['kanji_fn'] . ' ' . $student['kanji_ln'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Create Application') ?></button>
                                    </div>
                                </div>

                            </form> 
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div>