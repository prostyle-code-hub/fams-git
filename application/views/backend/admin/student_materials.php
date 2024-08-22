<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS7212 | Upload the application's documentation</span> <!-- UI Number -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css'); ?>" />
<script type="text/javascript">
    document.getElementById('application_page').style = 'background-color: #7467f0;color: white;';
</script>
<style>
    .answer {
        color: #355089 !important;
    }

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

    .u {
        text-decoration: underline;
        color: color(srgb 0.645 0.645 0.645);
    }
    #showMe{
        display:none;
    }
    .mandatory {
        border-color: #8682a8 !important;
    }
</style>
<script type="text/javascript">
    function addDashes(f) {
        f.value = f.value.slice(0, 3) + "-" + f.value.slice(3, 6) + "-" + f.value.slice(6, 10);
    }
</script>
<!-- Content wrapper ------------------------------------------------------------------------------------------------------------------------------------------>
<div class="container-xxl flex-grow-1 container-p-y" >

    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Application Form') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Documentation/Certification') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
            <form action="<?php echo site_url('user/student_materials/add'); ?>" enctype="multipart/form-data" method="post">
                <div class="btn-group" role="group">
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back to Application Form') ?></a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Save Upload') ?></button>
                </div>

        </div>
    </div>
    <br>
    <!-- Content -------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="account-details" class="content">
                        <div class="content-header mb-3">
                            <h5 class="mb-0"><?= get_phrase('Applicant Information') ?></h5>
                        </div>
                        <hr>
                        <!--load content -->
                        <?php foreach ($students->result_array() as $key => $student) : ?>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Application ID') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['app_id']; ?><input type="hidden" id="sid" name="app_id" value="<?php echo $student['app_id']; ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Student ID') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['id']; ?><input type="hidden" name="sid" value="<?php echo $student['id']; ?>">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Applicant Name') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['kanji_fn']; ?> <?php echo $student['kanji_ln']; ?><input type="hidden" name="kanji_fn" value="<?php echo $student['kanji_fn']; ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Where to Apply') ?>:
                                </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['application_place']; ?><input type="hidden" name="applicationplace" value="<?php echo $student['application_place']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Desired admission time:') ?></div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['dst']; ?>
                                    <input type="hidden" name="created_at" value="<?php echo $student_app['dst']; ?>">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <!-- File Uploader ----------------------------------------------------------------------------------------------------------------->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php if ($student['nas'] != '1') { ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="account-details" class="content">
                                <div class="content-header mb-3">
                                    <h5 class="mb-0"><?= get_phrase('Upload Documentation/Certification') ?></h5>
                                    <p>(<?= get_phrase('upload_content') ?>)</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Document Type') ?>:</div>
                                    <div class="col-md-10 answer">
                                        <select class="form-select border mandatory" id="materialDropdown" name="material_type" aria-label="materialDropdown" required>
                                            <option><?= get_phrase('Select Document Type') ?></option>
                                            <?php if ($doc1 < 2) { ?>
                                                <option value="doc1">1. <?= get_phrase('Application for Admission') ?></option>
                                            <?php } ?>
                                            <?php if ($doc2 < 2) { ?>
                                                <option value="doc2">2. <?= get_phrase('Resume') ?></option>
                                            <?php } ?>
                                            <?php if ($doc3 < 2) { ?>
                                                <option value="doc3">3. <?= get_phrase('Statement of Purpose') ?></option>
                                            <?php } ?>
                                            <?php if ($doc4 < 2) { ?>
                                                <option value="doc4">4. <?= get_phrase('Document for Sponsorship') ?></option>
                                            <?php } ?>
                                            <?php if ($doc5 < 2) { ?>
                                                <option value="doc5">5. <?= get_phrase('List of Family Members of the Sponsor') ?></option>
                                            <?php } ?>
                                            <?php if ($doc6 < 2) { ?>
                                                <option value="doc6">6. <?= get_phrase('Graduation Certificate of the Latest Education') ?></option>
                                            <?php } ?>
                                            <?php if ($doc7 < 2) { ?>
                                                <option value="doc7">7. <?= get_phrase('Enrollment Certificate') ?></option>
                                            <?php } ?>
                                            <?php if ($doc8 < 2) { ?>
                                                <option value="doc8">8. <?= get_phrase('Transcript of the Latest Education') ?></option>
                                            <?php } ?>
                                            <?php if ($doc9 < 2) { ?>
                                                <option value="doc9">9. <?= get_phrase('Certificate of JP Learning from JP School') ?></option>
                                            <?php } ?>
                                            <?php if ($doc10 < 2) { ?>
                                                <option value="doc10">10. <?= get_phrase('Pass Certificate of JP Language Test') ?></option>
                                            <?php } ?>
                                            <?php if ($doc11 < 2) { ?>
                                                <option value="doc11">11. <?= get_phrase('Copy of Passport (Applicant)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc12 < 2) { ?>
                                                <option value="doc12">12. <?= get_phrase('Copy of  ID card (Applicant)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc13 < 2) { ?>
                                                <option value="doc13">13. <?= get_phrase('Birth Certificate (Applicant)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc14 < 2) { ?>
                                                <option value="doc14">14. <?= get_phrase('Certificate of Relationship') ?></option>
                                            <?php } ?>
                                            <?php if ($doc15 < 2) { ?>
                                                <option value="doc15">15. <?= get_phrase('Copy of  ID card (Sponsor)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc16 < 2) { ?>
                                                <option value="doc16">16. <?= get_phrase('Deposit Balance Certificate(Sponsor)') ?></option>
                                            <?php } ?>

                                            <?php if ($doc17 < 2) { ?>
                                                <option value="doc17">17. <?= get_phrase('Certificate of occupation (Sponsor)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc18 < 2) { ?>
                                                <option value="doc18">18. <?= get_phrase('Copy of Bank Book') ?></option>
                                            <?php } ?>
                                            <?php if ($doc19 < 2) { ?>
                                                <option value="doc19">19. <?= get_phrase('Income Certificate （Sponsor/3yaers）(Sponsor)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc20 < 2) { ?>
                                                <option value="doc20">20. <?= get_phrase('Tax Certificate （Sponsor/3yaers）(Sponsor)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc21 < 2) { ?>
                                                <option value="doc21">21. <?= get_phrase('Certificate of Incumbency (Applicant)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc22 < 2) { ?>
                                                <option value="doc22">22. <?= get_phrase('Certificate of  Residence or substitute for address verification (Applicant)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc23 < 2) { ?>
                                                <option value="doc23">23. <?= get_phrase('Certificate of  Residence or substitute documents (Sponsor)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc24 < 2) { ?>
                                                <option value="doc24">24. <?= get_phrase('Reason of  Re-apply') ?></option>
                                            <?php } ?>
                                            <?php if ($doc25 < 2) { ?>
                                                <option value="doc25">25. <?= get_phrase('Explanation of the Asset Formation Process (if needed/3years)') ?></option>
                                            <?php } ?>
                                            <?php if ($doc26 < 2) { ?>
                                                <option value="doc26">26. <?= get_phrase('Business License (in case of individual business owner)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc27 < 2) { ?>
                                                <option value="doc26">27. <?= get_phrase('White papers') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc28 < 2) { ?>
                                                <option value="doc26">28. <?= get_phrase('White papers with applicant’s signatureature') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc29 < 2) { ?>
                                                <option value="doc26">29. <?= get_phrase("applicant's ID photo(4cm*3cm)") ?></option>
                                            <?php } ?> 
                                            <?php if ($doc30 < 2) { ?>
                                                <option value="doc26">30. <?= get_phrase('Supporting documents') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc31 < 2) { ?>
                                                <option value="doc26">31. <?= get_phrase('Clarification of the school name/emblem defference between documents') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc32 < 2) { ?>
                                                <option value="doc26">32. <?= get_phrase('Reason of delay  joining/guraduating, eary joining/guraduating school') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc33 < 2) { ?>
                                                <option value="doc26">33. <?= get_phrase('Clarification of the parents and applicants sur name defference') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc34 < 2) { ?>
                                                <option value="doc26">34. <?= get_phrase('Clarification of PAN number and its related information(ex. web site, documents etc.)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc35 < 2) { ?>
                                                <option value="doc26">35. <?= get_phrase('Clarification of the difference of PAN number or information on PAN serch web site between bank certificates.') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc36 < 2) { ?>
                                                <option value="doc26">36. <?= get_phrase("Clarification of the distance from sponsor's house to his/her bank") ?></option>
                                            <?php } ?> 
                                            <?php if ($doc37 < 2) { ?>
                                                <option value="doc26">37. <?= get_phrase('Clarification of Tax rate revision(5%→6％)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc38 < 2) { ?>
                                                <option value="doc26">38. <?= get_phrase('Clarification of the spelling or omission of name/adress') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc39 < 2) { ?>
                                                <option value="doc26">39. <?= get_phrase("Clarification of the applicant's mother's age at the time of birth.") ?></option>
                                            <?php } ?> 
                                            <?php if ($doc40 < 2) { ?>
                                                <option value="doc26">40. <?= get_phrase('Clarification of fiscal year)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc41 < 2) { ?>
                                                <option value="doc26">41. <?= get_phrase('Compulsory military service certificate') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc42 < 2) { ?>
                                                <option value="doc26">42. <?= get_phrase('Title deed)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc43 < 2) { ?>
                                                <option value="doc26">43. <?= get_phrase('Sale and Purchase Agreement of Gold)') ?></option>
                                            <?php } ?> 
                                            <?php if ($doc44 < 2) { ?>
                                                <option value="doc26">44. <?= get_phrase('Reason of drop out of school/university') ?></option>
                                            <?php } ?> 
                                        </select>
                                        <script type="text/javascript">
                                            var elem = document.getElementById("materialDropdown");
                                            elem.onchange = function () {
                                                var hiddenDiv = document.getElementById("showMe");
                                                hiddenDiv.style.display = (this.value == "doc1") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("Purpose");
                                                hiddenDiv.style.display = (this.value == "doc3") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("doc4");
                                                hiddenDiv.style.display = (this.value == "doc4") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("doc5");
                                                hiddenDiv.style.display = (this.value == "doc5") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("doc11");
                                                hiddenDiv.style.display = (this.value == "doc11") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("doc18");
                                                hiddenDiv.style.display = (this.value == "doc18") ? "block" : "none";
                                                var hiddenDiv = document.getElementById("doc22");
                                                hiddenDiv.style.display = (this.value == "doc22") ? "block" : "none";
                                            };
                                        </script><br>
                                        <div id="showMe" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Please use the format provided') ?>. </div>
                                        <div id="doc4" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Please use the format provided') ?>. </div>
                                        <div id="doc5" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Please use the format provided') ?>. </div>
                                        <div id="doc11" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('If the applicant have visited to Japan, a copy of Immigration Stamp is required.') ?>. </div>
                                        <div id="doc18" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Please do not omit any bank records from translation.') ?>. </div>
                                        <div id="doc22" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Required if the parmanent address and current address are different.') ?>. </div>
                                        <div id="Purpose" class="alert alert-warning " role="alert" style="display: none;"><?= get_phrase('Note') ?>:<?= get_phrase('Please use the format provided') ?>.
                                            <?= get_phrase('Please specify the reason') ?>
                                            <ol>
                                                <li><?= get_phrase('Why you want to study abroad') ?></li>
                                                <li><?= get_phrase('Your career(If you don not have career more than 3 years from the latest education, please specify the reason.)') ?></li>
                                                <li><?= get_phrase('Why you want to enter to our school') ?></li>
                                                <li><?= get_phrase('The career after graduate from our school') ?></li>
                                                <li><?= get_phrase('The career after you study in Japan') ?></li>
                                            </ol>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Folder No.') ?>:
                                    </div>

                                    <!-- Checkbox column -->
                                    <div class="col-md-5">
                                        <input type="radio" id="original" name="document_type" value="original" required />
                                        <label for="original"><?= get_phrase('Original letter') ?></label>

                                    </div>
                                    <!-- Checkbox column -->
                                    <div class="col-md-5">
                                        <input type="radio" id="translated" name="document_type" value="translated" required />
                                        <label for="translated"><?= get_phrase('Translated') ?> </label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?= get_phrase('Upload Document') ?>:
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-control mandatory" type="file" id="formFile" name="material" required />
                                    </div>

                                </div>
                                <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <br>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Documents check list for immigration application') ?></h5>
                            </div>
                            <?php if ($student['nas'] == '1') { ?>
                                <div class="alert alert-dark mb-0" role="alert">
                                    <p><?= get_phrase('Documents are unavailable in the Cloud Storage as a Domestic User has been moved that to NAS. ') ?></p>
                                </div>
                            <?php } ?>
                            <hr>

                            <!-- load document list -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><?= get_phrase('Documentation/Certification Type') ?></th>
                                        <th><?= get_phrase('Folder No.') ?></th>
                                        <th><?= get_phrase('Last Updated Date') ?></th>
                                        <th><?= get_phrase('Status') ?></th>
                                        <th style="width: 20%; text-align: right"><?= get_phrase('Action') ?></th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($materials as $row) : ?>  
                                        <tr>
                                            <td>  
                                                <!-- Load icon based on status  -->
                                                <?php If ($row['status'] == "1") { ?>
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> <img src="/assets/img/pdf.png" alt="<?php echo $row['file']; ?>" style="width: 30px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Document Uploaded') ?>" ></a>
                                                <?php } elseif ($row['status'] == "3") { ?>
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> <img src="/assets/img/checked.png" alt="<?php echo $row['file']; ?>" style="width: 30px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Chacked') ?>" ></a>
                                                <?php } elseif ($row['status'] == "2") { ?>
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> <img src="/assets/img/Waiting.png" alt="<?php echo $row['file']; ?>" style="width: 30px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Waiting for corrections') ?>" ></a>
                                                <?php } elseif ($row['status'] == "4") { ?>
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> <img src="/assets/img/PDF-check.png" alt="<?php echo $row['file']; ?>" style="width: 30px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Completed') ?>" ></a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                If ($row['type'] == "doc1") {
                                                    echo get_phrase('Application for Admission');
                                                } elseif ($row['type'] == "doc2") {
                                                    echo get_phrase('Resume');
                                                } elseif ($row['type'] == "doc3") {
                                                    echo get_phrase('Statement of Purpose');
                                                } elseif ($row['type'] == "doc4") {
                                                    echo get_phrase('Document for Sponsorship');
                                                } elseif ($row['type'] == "doc5") {
                                                    echo get_phrase('List of Family Members of the Sponsor');
                                                } elseif ($row['type'] == "doc6") {
                                                    echo get_phrase('Graduation Certificate of the Latest Education');
                                                } elseif ($row['type'] == "doc7") {
                                                    echo get_phrase('Enrollment Certificate');
                                                } elseif ($row['type'] == "doc8") {
                                                    echo get_phrase('Transcript of the Latest Education');
                                                } elseif ($row['type'] == "doc9") {
                                                    echo get_phrase('Certificate of JP Learning from JP School');
                                                } elseif ($row['type'] == "doc10") {
                                                    echo get_phrase('Pass Certificate of JP Language Test');
                                                } elseif ($row['type'] == "doc11") {
                                                    echo get_phrase('Copy of Passport (Applicant)');
                                                } elseif ($row['type'] == "doc12") {
                                                    echo get_phrase('Copy of  ID card (Applicant)');
                                                } elseif ($row['type'] == "doc13") {
                                                    echo get_phrase('Birth Certificate (Applicant)');
                                                } elseif ($row['type'] == "doc14") {
                                                    echo get_phrase('Certificate of Relationship');
                                                } elseif ($row['type'] == "doc15") {
                                                    echo get_phrase('Copy of  ID card (Sponsor)');
                                                } elseif ($row['type'] == "doc16") {
                                                    echo get_phrase('Deposit Balance Certificate(Sponsor)');
                                                } elseif ($row['type'] == "doc17") {
                                                    echo get_phrase('Certificate of occupation (Sponsor)');
                                                } elseif ($row['type'] == "doc18") {
                                                    echo get_phrase('Copy of Bank Book');
                                                } elseif ($row['type'] == "doc19") {
                                                    echo get_phrase('Income Certificate （Sponsor/3yaers）(Sponsor)');
                                                } elseif ($row['type'] == "doc20") {
                                                    echo get_phrase('Tax Certificate （Sponsor/3yaers）(Sponsor)');
                                                } elseif ($row['type'] == "doc21") {
                                                    echo get_phrase('Certificate of Incumbency (Applicant)');
                                                } elseif ($row['type'] == "doc22") {
                                                    echo get_phrase('Certificate of  Residence or substitute for address verification (Applicant)');
                                                } elseif ($row['type'] == "doc23") {
                                                    echo get_phrase('Certificate of  Residence or substitute documents (Sponsor)');
                                                } elseif ($row['type'] == "doc24") {
                                                    echo get_phrase('Reason of  Re-apply');
                                                } elseif ($row['type'] == "doc25") {
                                                    echo get_phrase('Explanation of the Asset Formation Process (if needed/3years)');
                                                } elseif ($row['type'] == "doc26") {
                                                    echo get_phrase('Business License (in case of individual business owner)');
                                                }
                                                ?></td>

                                            <td><?php
                                                if ($row['document_type'] == "original") {
                                                    echo get_phrase('Original letter');
                                                } elseif ($row['document_type'] == "translated") {
                                                    echo get_phrase('Translated');
                                                }
                                                ?></td>
                                            <td><small style="font-size: small;"><?php echo $row['created_at']; ?> </small></td>
                                            <td> 
                                                <!-- Load status  -->
                                                <?php
                                                If ($row['status'] == "1") {
                                                    echo get_phrase('Document Uploaded');
                                                } elseif ($row['status'] == "3") {
                                                    echo get_phrase('Chacked');
                                                } elseif ($row['status'] == "2") {
                                                    echo get_phrase('Waiting for corrections');
                                                } elseif ($row['status'] == "4") {
                                                    echo get_phrase('Completed');
                                                }
                                                ?>
                                                <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank" style="display: none;"> <img src="/assets/img/comment.png" alt="<?php echo $row['file']; ?>" style="width: 30px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Comment reserved from Domesitc User') ?>" ></a>

                                            </td>
                                            <td style="width: 20%; text-align: right">
                                                <?php if ($row['doc_remarks'] != "") { ?>
                                                    <a href="javascript:;" data-bs-target="#remark<?php echo $row['id']; ?>" data-bs-toggle="modal">
                                                        <span><i class="menu-icon tf-icons ti ti-align-left" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Feedback') ?>"></i></span>                                       
                                                    </a>
                                                <?php } ?>

                                                <?php if ($student['nas'] != '1') { ?>                                                
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>"  target="_blank">
                                                        <span><i class="menu-icon tf-icons ti ti-eye" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('View') ?>" ></i></span></a>
                                                    <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" download>
                                                        <span><i class="menu-icon tf-icons ti ti-download" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Download') ?>" ></i></span></a>
                                                    <a href="javascript:;" data-bs-target="#editSlide<?php echo $row['id']; ?>" data-bs-toggle="modal">
                                                        <span><i class="menu-icon tf-icons ti ti-upload" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Re-Upload') ?>" ></i></span></a>
                                                    <a href="javascript:;" data-bs-target="#deleteSlide<?php echo $row['id']; ?>" data-bs-toggle="modal">
                                                        <span><i class="menu-icon tf-icons ti ti-trash" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Delete') ?>"></i></span></a>
                                                <?php } ?>
                                            </td>                                        
                                        </tr>


                                        <!-- Modals -->

                                        <!-- Application remark note -->

                                    <div class="modal fade" id="remark<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">

                                                        <h3 class="mb-2" style="color : #7367f0">
                                                            <img src="/assets/img/feedback.gif" alt="Feedback" style="width: 120px; text-align: left;">
                                                            <?php echo get_phrase('The Feedback from Domestic User'); ?>
                                                        </h3>  
                                                        <hr>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4"><?= get_phrase('Document type') ?>:</div>
                                                        <div class="col-md-8 answer"><?php
                                                            if ($row['type'] == "doc1") {
                                                                echo get_phrase('Application for Admission');
                                                            } elseif ($row['type'] == "doc2") {
                                                                echo get_phrase('Resume');
                                                            } elseif ($row['type'] == "doc3") {
                                                                echo get_phrase('Statement of Purpose');
                                                            } elseif ($row['type'] == "doc4") {
                                                                echo get_phrase('Document for Sponsorship');
                                                            } elseif ($row['type'] == "doc5") {
                                                                echo get_phrase('List of Family Members of the Sponsor');
                                                            } elseif ($row['type'] == "doc6") {
                                                                echo get_phrase('Graduation Certificate of the Latest Education');
                                                            } elseif ($row['type'] == "doc7") {
                                                                echo get_phrase('Enrollment Certificate');
                                                            } elseif ($row['type'] == "doc8") {
                                                                echo get_phrase('Transcript of the Latest Education');
                                                            } elseif ($row['type'] == "doc9") {
                                                                echo get_phrase('Certificate of JP Learning from JP School');
                                                            } elseif ($row['type'] == "doc10") {
                                                                echo get_phrase('Pass Certificate of JP Language Test');
                                                            } elseif ($row['type'] == "doc11") {
                                                                echo get_phrase('Copy of Passport (Applicant)');
                                                            } elseif ($row['type'] == "doc12") {
                                                                echo get_phrase('Copy of  ID card (Applicant)');
                                                            } elseif ($row['type'] == "doc13") {
                                                                echo get_phrase('Birth Certificate (Applicant)');
                                                            } elseif ($row['type'] == "doc14") {
                                                                echo get_phrase('Certificate of Relationship');
                                                            } elseif ($row['type'] == "doc15") {
                                                                echo get_phrase('Copy of  ID card (Sponsor)');
                                                            } elseif ($row['type'] == "doc16") {
                                                                echo get_phrase('Deposit Balance Certificate(Sponsor)');
                                                            } elseif ($row['type'] == "doc17") {
                                                                echo get_phrase('Certificate of occupation (Sponsor)');
                                                            } elseif ($row['type'] == "doc18") {
                                                                echo get_phrase('Copy of Bank Book');
                                                            } elseif ($row['type'] == "doc19") {
                                                                echo get_phrase('Income Certificate （Sponsor/3yaers）(Sponsor)');
                                                            } elseif ($row['type'] == "doc20") {
                                                                echo get_phrase('Tax Certificate （Sponsor/3yaers）(Sponsor)');
                                                            } elseif ($row['type'] == "doc21") {
                                                                echo get_phrase('Certificate of Incumbency (Applicant)');
                                                            } elseif ($row['type'] == "doc22") {
                                                                echo get_phrase('Certificate of  Residence or substitute for address verification (Applicant)');
                                                            } elseif ($row['type'] == "doc23") {
                                                                echo get_phrase('Certificate of  Residence or substitute documents (Sponsor)');
                                                            } elseif ($row['type'] == "doc24") {
                                                                echo get_phrase('Reason of  Re-apply');
                                                            } elseif ($row['type'] == "doc25") {
                                                                echo get_phrase('Explanation of the Asset Formation Process (if needed/3years)');
                                                            } elseif ($row['type'] == "doc26") {
                                                                echo get_phrase('Business License (in case of individual business owner)');
                                                            }
                                                            ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4"><?= get_phrase('Status') ?>:</div>
                                                        <div class="col-md-8 answer"><?php
                                                            If ($row['status'] == "1") {
                                                                echo get_phrase('Document Uploaded');
                                                            } elseif ($row['status'] == "3") {
                                                                echo get_phrase('Chacked');
                                                            } elseif ($row['status'] == "2") {
                                                                echo get_phrase('Waiting for corrections');
                                                            } elseif ($row['status'] == "4") {
                                                                echo get_phrase('Completed');
                                                            }
                                                            ?>

                                                        </div></div><br>

                                                    <div class="row">
                                                        <div class="col-md-4"><?= get_phrase('Comment') ?>:</div>
                                                        <div class="col-md-8 answer"><?php echo $row['doc_remarks']; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- Edit Rule Modal -->
                            <div class="modal fade" id="editSlide<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="mb-4">
                                                <div class="content-header mb-3">
                                                    <h5 class="mb-0"><?= get_phrase('Re-Upload') ?> <?= get_phrase('documentation/certification') ?></h5>
                                                </div>
                                                <hr>
                                                <form action="<?php echo site_url('user/student_materials/update_document'); ?>" enctype="multipart/form-data" method="post">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <?= get_phrase('Upload Document') ?>:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input class="form-control mandatory" type="file" id="formFile" name="material" required />
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($row['type'] == "doc1") {
                                                        $re_up_document = get_phrase('Application for Admission');
                                                    } elseif ($row['type'] == "doc2") {
                                                        $re_up_document = get_phrase('Resume');
                                                    } elseif ($row['type'] == "doc3") {
                                                        $re_up_document = get_phrase('Statement of Purpose');
                                                    } elseif ($row['type'] == "doc4") {
                                                        $re_up_document = get_phrase('Document for Sponsorship');
                                                    } elseif ($row['type'] == "doc5") {
                                                        $re_up_document = get_phrase('List of Family Members of the Sponsor');
                                                    } elseif ($row['type'] == "doc6") {
                                                        $re_up_document = get_phrase('Graduation Certificate of the Latest Education');
                                                    } elseif ($row['type'] == "doc7") {
                                                        $re_up_document = get_phrase('Enrollment Certificate');
                                                    } elseif ($row['type'] == "doc8") {
                                                        $re_up_document = get_phrase('Transcript of the Latest Education');
                                                    } elseif ($row['type'] == "doc9") {
                                                        $re_up_document = get_phrase('Certificate of JP Learning from JP School');
                                                    } elseif ($row['type'] == "doc10") {
                                                        $re_up_document = get_phrase('Pass Certificate of JP Language Test');
                                                    } elseif ($row['type'] == "doc11") {
                                                        $re_up_document = get_phrase('Copy of Passport (Applicant)');
                                                    } elseif ($row['type'] == "doc12") {
                                                        $re_up_document = get_phrase('Copy of  ID card (Applicant)');
                                                    } elseif ($row['type'] == "doc13") {
                                                        $re_up_document = get_phrase('Birth Certificate (Applicant)');
                                                    } elseif ($row['type'] == "doc14") {
                                                        $re_up_document = get_phrase('Certificate of Relationship');
                                                    } elseif ($row['type'] == "doc15") {
                                                        $re_up_document = get_phrase('Copy of  ID card (Sponsor)');
                                                    } elseif ($row['type'] == "doc16") {
                                                        $re_up_document = get_phrase('Deposit Balance Certificate(Sponsor)');
                                                    } elseif ($row['type'] == "doc17") {
                                                        $re_up_document = get_phrase('Certificate of occupation (Sponsor)');
                                                    } elseif ($row['type'] == "doc18") {
                                                        $re_up_document = get_phrase('Copy of Bank Book');
                                                    } elseif ($row['type'] == "doc19") {
                                                        $re_up_document = get_phrase('Income Certificate （Sponsor/3yaers）(Sponsor)');
                                                    } elseif ($row['type'] == "doc20") {
                                                        $re_up_document = get_phrase('Tax Certificate （Sponsor/3yaers）(Sponsor)');
                                                    } elseif ($row['type'] == "doc21") {
                                                        $re_up_document = get_phrase('Certificate of Incumbency (Applicant)');
                                                    } elseif ($row['type'] == "doc22") {
                                                        $re_up_document = get_phrase('Certificate of  Residence or substitute for address verification (Applicant)');
                                                    } elseif ($row['type'] == "doc23") {
                                                        $re_up_document = get_phrase('Certificate of  Residence or substitute documents (Sponsor)');
                                                    } elseif ($row['type'] == "doc24") {
                                                        $re_up_document = get_phrase('Reason of  Re-apply');
                                                    } elseif ($row['type'] == "doc25") {
                                                        $re_up_document = get_phrase('Explanation of the Asset Formation Process (if needed/3years)');
                                                    } elseif ($row['type'] == "doc26") {
                                                        $re_up_document = get_phrase('Business License (in case of individual business owner)');
                                                    }

                                                    if ($row['document_type'] == "original") {
                                                        $up_doc_type = get_phrase('Original letter');
                                                    } elseif ($row['document_type'] == "translated") {
                                                        $up_doc_type = get_phrase('Translated');
                                                    }
                                                    ?>
                                                    <input type="hidden" name="material_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="material_type" value="<?php echo $re_up_document ?>">
                                                    <input type="hidden" name="document_type" value="<?php echo $up_doc_type ?>">
                                                    <input type="hidden" name="app_id" value="<?php echo $row['app_id']; ?>">
                                                    <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

                                                    <br>
                                                    <div  class="alert alert-info " role="alert"> 
                                                        <p><i class="menu-icon tf-icons ti ti-star" ></i><?= get_phrase('Please note once you re-uploaded a document the status will be reset.') ?></p>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Save Upload') ?></button>
                                                    </div>
                                                </form>
                                                <p><?php echo $row['material']; ?></p>
                                            </div>
                                            <!-- Display any other content you want -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Rule Modal -->
                            <div class="modal fade" id="deleteSlide<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                    <div class="modal-content p-3 p-md-5">
                                        <div class="modal-body">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <div class="text-center mb-4">
                                                <h3 class="mb-2" style="color : #7367f0"><?= get_phrase('are_you_sure') ?></h3>  
                                                <p><?= get_phrase('do_you_want_to_remove_this_document') ?> ?</p>
                                            </div>
                                            <div class="text-center mb-4">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>                                                      
                                                <a href="<?php echo site_url('user/student_materials/delete/' . $row['id']) . '/' . $row['student_id'] . '/' . $row['app_id'] ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    


                        <?php endforeach; ?> 

                        </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div> 
    </div> 
<?php endforeach; ?>
</div>