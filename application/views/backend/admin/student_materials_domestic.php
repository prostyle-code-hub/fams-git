<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5111 | Review Applicant Documents (For Domestic User)</span> <!-- UI Number -->
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

    #showMe {
        display: none;
    }

    .mandatory {
        border-color: #8682a8 !important;
    }

    .tile-shadow {
        box-shadow: 0 0.25rem 1.125rem rgba(9, 9, 9, 0.42);
    }

    .tile-shadow:hover {
        box-shadow: 0 0.25rem 1rem rgba(92, 43, 187, 1) inset;
    }
</style>
<!-- Content wrapper ------------------------------------------------------------------------------------------------------------------------------------------>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Application Form') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Review Documents') ?></span></h6>
        </div>
        <?php
        $file_id = "";
        $student_id = "";
        $student_app_id = "";
        ?>
        <?php foreach ($students->result_array() as $key => $student) : ?>
            <?php
            $student_id = $student['id'];
            $student_app_id = $student['app_id'];
            ?>
            <div class="col-md-9" style="text-align: right;">
                <form action="<?php echo site_url('user/document_review/update_all_document'); ?>" enctype="multipart/form-data" method="post">
                    <div class="btn-group" role="group">
                        <a type="button" class="btn btn-secondary waves-effect waves-light" href="javascript:history.go(-1)"><?= get_phrase('Back to Application Form') ?></a>
                        <?php if ($student['nas'] == '1') { ?>
                            <button type="button" class="btn btn-secondary" disabled><?= get_phrase('Download All') ?></button>
                            <button type="button" class="btn btn-secondary" disabled><?= get_phrase('Move To NAS') ?></button>
                        <?php } else { ?>
                            <button type="button" id="download_all_button" data-student-id="<?php echo $student['id']; ?>" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Download All') ?></button>
                            <a href="javascript:;" data-bs-target="#moveToNas" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"><?= get_phrase('Move To NAS') ?></a>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Update Bulk Status') ?></button>
                    </div>

            </div>
        </div>
        <!-- Content -------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="container-sm">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Manage Application Status') ?></h5>
                                <small><?= get_phrase('Update All the Document status at once.') ?></small>
                            </div>
                            <hr>

                            <!--Basic Information Form------------------------------------------------------------------------------------>

                            <?php $file_id = $student['id']; ?>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Application ID') ?>: </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['app_id']; ?>
                                    <input type="hidden" name="application_id" value="<?php echo $student['app_id']; ?>">
                                </div>
                                <div class="col-md-2"><?= get_phrase('Student ID') ?>:</div>
                                <div class="col-md-4 answer"><?php echo $student['id']; ?>
                                    <input id="sid" name="student_id" type="hidden" value="<?php echo $student['id']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Student Name') ?>: </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['kanji_fn'] ?> <?php echo $student['kanji_ln'] ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Where to Apply') ?>:</div>
                                <div class="col-md-4 answer"><?php echo $student['institute_name'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Application Created Date') ?>: </div>
                                <div class="col-md-4 answer">
                                    <?php echo $student['created_at']; ?>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Application Status') ?>:</div>
                                <div class="col-md-4 answer"><!-- Display Application Created Date -->
                                    <select class="form-select border mandatory" id="materialDropdown" name="all_doc_status" aria-label="materialDropdown" required>
                                        <option value=""><?= get_phrase('Select Application Status') ?></option>

                                        <option value="1" <?php
                                        if (($student['status'] == 1) && ($all_document_status != 1)) {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Document Uploaded') ?></option>
                                        <option value="2" <?php
                                        if (($student['status'] == 2) && ($all_document_status != 1)) {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Waiting for corrections') ?></option>
                                        <option value="3" <?php
                                        if (($student['status'] == 3) && ($all_document_status != 1)) {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Chacked') ?></option>
                                        <option value="4" <?php
                                        if (($student['status'] == 4) && ($all_document_status != 1)) {
                                            echo 'selected';
                                        }
                                        ?>><?= get_phrase('Completed') ?></option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Remarks') ?>: </div>
                                <div class="col-md-10 answer">
                                    <textarea class="form-control mandatory" name="remarks" id="permanent_address" rows="3" required><?php echo $student['remarks']; ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                        <?php endforeach; ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Contact in Home----------------------------------------------------------------------------------------------------------------->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="content-header mb-3">
                            <h5 class="mb-0"><?= get_phrase('Review Documents') ?></h5>
                            <small><?= get_phrase('Individual Document Review') ?></small>
                        </div>
                        <?php if ($student['nas'] == '1') { ?>
                            <div class="alert alert-dark mb-0" role="alert">

                                <p>&nbsp;<i class="ti ti-bell ti-xs"></i><?= get_phrase('Documents are unavailable in the Cloud Storage as a Domestic User has been moved that to NAS. ') ?></p>
                            </div>
                        <?php } ?>
                        <hr>

                        <div class="form-row g-3">
                            <div class="row g-3">
                                <?php foreach ($materials as $row) : ?>
                                    <div class="col-md-4">
                                        <div class="card tile-shadow">
                                            <div class="card-body">
                                                <!-- Single tile -->
                                                <div class="row">
                                                    <h5 class="card-title">
                                                        <?php
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
                                                        ?>
                                                    </h5>
                                                    <div class="col-md-2">
                                                        <?php if ($row['status'] == "1") { ?>
                                                            <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> 
                                                                <img src="/assets/img/pdf.png" alt="<?php echo $row['file']; ?>" style="width: 52px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Document Uploaded') ?>"></a>                                              
                                                        <?php } elseif ($row['status'] == "2") { ?>
                                                            <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank">
                                                                <img src="/assets/img/Waiting.png" alt="<?php echo $row['file']; ?>" style="width: 52px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Waiting for corrections') ?>">
                                                            </a>                                                        
                                                        <?php } elseif ($row['status'] == "3") { ?>
                                                            <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank">
                                                                <img src="/assets/img/checked.png" alt="<?php echo $row['file']; ?>" style="width: 52px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Chacked') ?>"></a>

                                                        <?php } elseif ($row['status'] == "4") { ?>
                                                            <a href="/uploads/document/student_document/<?php echo $row['file']; ?>" target="_blank"> 
                                                                <img src="/assets/img/PDF-check.png" alt="<?php echo $row['file']; ?>" style="width: 52px;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="<?= get_phrase('Completed') ?>"></a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-10 answer">
                                                        <div>

                                                            <?php
                                                            if ($row['document_type'] == "original") {
                                                                echo get_phrase('Original letter');
                                                            } elseif ($row['document_type'] == "translated") {
                                                                echo get_phrase('Translated');
                                                            }
                                                            ?> <br>
                                                            <?php if ($student['nas'] == '1') { ?>

                                                            <?php } ?>
                                                            <?php if ($student['nas'] !== '1') { ?>
                                                                <a href="<?php echo base_url('/uploads/document/student_document/' . $row['file']); ?>" class="btn btn-outline-secondary  waves-effect" target="_blank" download >
                                                                    <span class="ti-xs ti ti-download me-1"></span><?= get_phrase('Download') ?>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-outline-secondary waves-effect" data-bs-target="#deleteDocument<?php echo $row['id']; ?>" data-bs-toggle="modal" >
                                                                    <span class="ti-xs ti ti-pencil me-1"></span><?= get_phrase('Delete') ?>
                                                                </a>
                                                            <?php } ?>
                                                            <div style="padding-top: 5px;">
                                                                <a href="javascript:;" class="btn btn-outline-secondary waves-effect" data-bs-target="#updateDocumentStatus<?php echo $row['id']; ?>" data-bs-toggle="modal" >
                                                                    <span class="ti-xs ti ti-pencil me-1"></span><?= get_phrase('Review & Update') ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Single document delete modal -->

                                    <div class="modal fade" id="deleteDocument<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="text-center mb-4">
                                                        <h3 class="mb-2" style="color : #7367f0"><?= get_phrase('Are you sure') ?></h3>  
                                                        <p><?= get_phrase('Do You Want To Remove This Document') ?>?</p>
                                                    </div>
                                                    <div class="text-center mb-4">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= get_phrase('No') ?></button>
                                                        <a href="<?php echo site_url('user/document_management/delete_doc_by_domestic_user/' . $row['id'].'/'.$row['student_id'].'/'.$row['app_id']) ?>" class="btn btn-danger" role="button"><?= get_phrase('Yes') ?></a>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Single document status update modal -->

                                    <div class="modal fade" id="updateDocumentStatus<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <form action="<?php echo base_url('user/document_review/update_single_document'); ?>" method="post" id="updateStatusForm" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <input type="hidden" id="mid" name="student_id" value="<?php echo $student_url_id; ?>">
                                                            <input type="hidden" id="mid" name="application_id" value="<?php echo $application_url_id; ?>" style="display: none;">
                                                            <input type="hidden" id="mid" name="mid" value="<?php echo $row['id']; ?>">

                                                            <label for="documentName" class="col-sm-3 col-form-label"><?= get_phrase('Document Name') ?>:</label>
                                                            <div class="col-sm-9 answer">
                                                                <?php
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
                                                                ?>
                                                            </div>
                                                        </div><br>
                                                        <div class="form-group row">
                                                            <label for="lastUpdateDate" class="col-sm-3 col-form-label"><?= get_phrase('Last Update Date') ?>:</label>
                                                            <div class="col-sm-9 answer">
                                                                <?php echo $row['created_at']; ?>
                                                            </div>
                                                        </div><br>
                                                        <div class="form-group row">
                                                            <label for="documentStatus" class="col-sm-3 col-form-label"><?= get_phrase('Document Status') ?>:</label>
                                                            <div class="col-sm-9">
                                                                <select class="form-select border" id="applicationstatus" name="doc_status" aria-label="applicationstatus" required>
                                                                    <option value="1" <?php if ($row['status'] == "1") echo 'selected'; ?>><?= get_phrase('Document Uploaded') ?></option>                                                                    
                                                                    <option value="2" <?php if ($row['status'] == "2") echo 'selected'; ?>><?= get_phrase('Waiting for corrections') ?></option>
                                                                    <option value="3" <?php if ($row['status'] == "3") echo 'selected'; ?>><?= get_phrase('Chacked') ?></option>
                                                                    <option value="4" <?php if ($row['status'] == "4") echo 'selected'; ?>><?= get_phrase('Completed') ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <label for="comment" class="col-sm-3 col-form-label"><?= get_phrase('Comment') ?>:</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" id="comment" name="doc_remarks"><?php echo $row['doc_remarks']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <button type="submit" id="updateStatus" class="btn btn-primary float-end"><?= get_phrase('Update Status') ?></button>
                                                            </div>
                                                        </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Move to NAS (Files) modal -->
    <div class="modal fade" id="moveToNas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Move Documentations to NAS'); ?></h3>
                        <img src="<?php echo base_url('assets/img/NAS.gif'); ?>" style="width: 50%;">

                        <p align="justify"><?php echo get_phrase('Please note that once you move the files to the NAS, system users will no longer be able to access them from the system as they will be permanently deleted from the cloud storage.'); ?></p>
                        <p align="justify"><?php echo get_phrase('Please follow the setps below to Move the files to NAS. First must download the files to NAS and then click the Clear files from the cloud storage button.'); ?></p>
                    </div>
                    <div class="text-center mb-4">
                        <a style="width: 350; height: 50px;" href="<?php echo base_url('user/move_to_nas/download/'); ?><?php echo $student_id ?>/<?php echo $student_app_id; ?>" role="button" class="btn btn-primary"><?php echo get_phrase('Step One'); ?> : <?php echo get_phrase('Download to NAS'); ?></a>
                    </div>
                    <div class="text-center mb-4">
                        <a style="width: 350; height: 50px;" href="<?php echo base_url('user/move_to_nas/'); ?><?php echo $student_id ?>/<?php echo $student_app_id; ?>" role="button" class="btn btn-primary"><?php echo get_phrase('Step Two'); ?> : <?php echo get_phrase('Clear files from the cloud'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $file_URL = '/uploads/document/student_document/materials_' . $file_id . '.zip';
    ?>
    <script>
        document.getElementById("download_all_button").addEventListener("click", function () {
            var student_id = this.getAttribute("data-student-id");
            downloadAllMaterials(student_id);
        });


        function downloadAllMaterials(studentId) {
            $.ajax({
                url: "<?php echo site_url('user/download_all_materials'); ?>",
                type: "POST",
                data: {
                    student_id: studentId
                },
                success: function (response) {

                    console.log("Download successful");
                    console.log(response);
                    if (!response.error) {
                        // Create a hidden link with the download URL
                        var link = document.createElement("a");
                        link.href = "<?php echo base_url($file_URL) ?>";
                        link.download = "<?php echo $file_id ?>_documents.zip";
                        link.style.display = "none";
                        document.body.appendChild(link);

                        // Simulate a click on the link to trigger the download
                        link.click();

                        // Clean up: remove the link from the DOM
                        document.body.removeChild(link);
                    } else {
                        // Handle error
                        console.error("Error:", response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error downloading materials:", error);
                }
            });
        }
    </script>