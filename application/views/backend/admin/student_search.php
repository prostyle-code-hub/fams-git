<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS5500 | Search for Applicant Basic Information</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('student_page').style = 'background-color: #7467f0;color: white;';
</script>
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="<?php echo site_url('user/search_student/search'); ?>" method = "post">
        <div class="row">
            <div class="col-md-3">
                <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Applicant Students') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('search_student') ?></span></h6>
            </div>
            <div class="col-md-9" style="text-align: right;">

                <div class="btn-group" role="group" aria-label="Button Set">
                    <a href="<?php echo base_url('user/search_student') ?>" class="btn btn-secondary waves-effect waves-light"><?= get_phrase('Reset') ?></a>
                    <a type="button" class="btn btn-secondary waves-effect waves-light" href="/user/student/add"><?= get_phrase('Register New Student') ?></a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('Search') ?></button>
                </div>

            </div>
        </div>
        <div class="accordion" id="collapsibleSection">

            <div class="card active" data-select2-id="43">
                <div id="account-details" class="content">
                    <h2 class="accordion-header" id="headingDeliveryAddress">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryAddress" aria-expanded="true" aria-controls="collapseDeliveryAddress">
                            <?= get_phrase('Search Filters') ?>
                        </button>
                    </h2>
                    <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection" style="">
                        <div class="accordion-body">

                            <Small><?= get_phrase('You can search with any of bellow fields') ?> </Small>
                            <hr>
                            <!--load content -->
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " aria-label="First & Middle name" id="kanji_fname" name="kanji_fname" <?php if ($this->session->userdata('kanji_fn') != '') { ?> value='<?php echo $this->session->userdata('kanji_fn') ?>' <?php } ?>>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check"><input type="text" class="ms-1 form-control form-input1 " aria-label="Last name"  id="kanji_lname" name="kanji_lname" <?php if ($this->session->userdata('kanji_ln') != '') { ?> value='<?php echo $this->session->userdata('kanji_ln') ?>' <?php } ?>>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('First ＆ Middle Name') ?>:
                                    <br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " aria-label="First & Middle name" id="romaji_fname" name="romaji_fname" <?php if ($this->session->userdata('romaji_fn') != '') { ?> value='<?php echo $this->session->userdata('romaji_fn') ?>' <?php } ?> >
                                </div>
                                <div class="col-md-2"><?= get_phrase('Last Name') ?>:<br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('Romaji') ?>) </smal>
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " id="romajii_lname" name="romajii_lname" aria-label="Last name" <?php if ($this->session->userdata('romaji_ln') != '') { ?> value='<?php echo $this->session->userdata('romaji_ln') ?>' <?php } ?> >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Sex') ?>:
                                </div>

                                <div class="col-md-4 form-check ">
                                    <input type="radio" id="option1" name="gender" value="Male" <?php
                                    if ($this->session->userdata('gender') == 'Male') {
                                        echo 'checked';
                                    }
                                    ?>>
                                    <label for="option1" class="me-5"><?= get_phrase('Male') ?></label>
                                    <input type="radio" id="option1" name="gender" value="Female" <?php
                                    if ($this->session->userdata('gender') == 'Female') {
                                        echo 'checked';
                                    }
                                    ?> >
                                    <label for="option1" class="me-5"><?= get_phrase('Female') ?></label>
                                </div>
                                <div class="col-md-2"><?= get_phrase('Country of Citizenship') ?>:
                                </div>
                                <div class="col-md-4 form-check">
                                    <select name="citizenship" id="citizenship" class="ms-1 form-control form-input1 dropdown-toggl ">
                                        <?php
                                        $bithcountry = ['country' => 'Select Country'];
                                        $countryList = ["Nepal", "India", "Sri Lanka", "Vietnam", "Japan", "Japan", "Bangladesh", "Myanmar", "Mongolia", "Indonesia", "China", "Peru", "Philippines", "Thailand", "Iran", "Uzbekistan"];
                                        echo "<option value='' >" . get_phrase('Select Country') . "</option>";
                                        foreach ($countryList as $country) {
                                            $sel = ($this->session->userdata('citizenship') === $country) ? 'selected' : '';
                                            echo "<option value='$country' $sel> "
                                            ?>
                                            <?= get_phrase($country) ?>
                                            <?=
                                            "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2"><?= get_phrase('Occupation') ?>:
                                </div>
                                <div class="col-md-4 form-check">
                                    <input type="text" class="ms-1 form-control form-input1 " id="Occupation" name="occupation" aria-label="Occupation" <?php if ($this->session->userdata('occupation') != '') { ?> value='<?php echo $this->session->userdata('occupation') ?>' <?php } ?> >

                                </div>
                                <div class="col-md-2">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4"><?= get_phrase('Show Applicants who has application form') ?>:</div>
                                <div class="col-md-2 form-check">                                    
                                    <input class="form-check-input" type="checkbox" value="1"  name="show_reg_students" id="show_application_status" <?php
                                    if ($this->session->userdata('show_reg_students') == 1) {
                                        echo "checked";
                                    }
                                    ?>/>                                  
                                </div>
                                
                               
                             </div>
                             
                                <div id="application_status" class="row" <?php
                                if ($this->session->userdata('show_reg_students') == 0) {
                                    echo "hidden";
                                }
                                ?>>  <hr>
                                <div class="row">
                                    <div class="col-md-2"><?= get_phrase('Application status') ?>:</div>
                                    <div class="col-md-4 form-check">
                                        <select name="application_status"  class="ms-1 form-control form-input1 dropdown-toggl  dropdown-toggle waves-effect waves-light">
                                            <option value=""><?= get_phrase('Select status') ?></option>
                                            <option value="1" <?php
                                            if ($this->session->userdata('application_status') == 1) {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Under registration of documentation') ?></option>
                                            <option value="2" <?php
                                            if ($this->session->userdata('application_status') == 2) {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Under conirmation of documentation') ?></option>
                                            <option value="3" <?php
                                            if ($this->session->userdata('application_status') == 3) {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Waiting for Correctio') ?></option>
                                            <option value="4" <?php
                                            if ($this->session->userdata('application_status') == 4) {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('All documents is checked') ?></option>
                                            <option value="5" <?php
                                            if ($this->session->userdata('application_status') == 5) {
                                                echo "selected";
                                            }
                                            ?>><?= get_phrase('Receipt of immigration examination results') ?></option>

                                        </select>
                                    </div>
                            </div>  </div>
                         
                                <script>
                                    const checkbox = document.querySelector("#show_application_status");
                                    const skills = document.querySelector("#application_status");
                                    checkbox.addEventListener("click", (e) => {
                                        skills.hidden = !e.target.checked;
                                    });
                                </script>
                            </div>
                            <br>
                            <!--                            <div class="row">
                                                            <div class="col-md-2"><?= get_phrase('Sponsor surname') ?>:
                                                            </div>
                                                            <div class="col-md-4 form-check">
                                                                <input type="text" class="ms-1 form-control form-input1 " id="Sponsor surname" name="sponsor_surname" aria-label="sponsor_surname"  <?php if ($this->session->userdata('sponsor_surname') != '') { ?> value='<?php echo $this->session->userdata('sponsor_surname') ?>' <?php } ?>>
                                                            </div>
                                                            <div class="col-md-2">
                                                            </div>
                                                            <div class="col-md-4 form-check"></div>
                                                        </div>-->
                        </div>
                    </div>

                </div>
           <br>
            <div class="card accordion-item">
                <h2 class="accordion-header" id="headingDeliveryOptions">
                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions">
                        <?= get_phrase('Search Result') ?>
                    </button>
                </h2>
                <div id="collapseDeliveryOptions" class="accordion-collapse collapse <?php
                if (isset($search_result)) {
                    echo 'show';
                }
                ?>" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection" style="">
                    <div class="accordion-body">
                        <hr>
                        <div class="row">
                            <!-- Result View load here -->
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?= get_phrase('Student ID') ?></th>
                                            <th><?= get_phrase('First ＆ middle name') ?>
                                                <br>
                                    <smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                    </th>
                                    <th><?= get_phrase('Last name') ?>
                                    <br><smal style="font-size: x-small;color: #7467f0;">(<?= get_phrase('kanji, Alphabet') ?>) </smal>
                                    </th>
                                    <th><?= get_phrase('Registered Date') ?></th>                                    
                                    <th><?= get_phrase('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php if (isset($search_result)) { ?>
                                            <?php foreach ($search_result as $student): ?>

                                                <tr>
                                                    <td >AP<?= $student->id ?></td>
                                                    <td ><?= $student->kanji_fn ?></td>
                                                    <td ><?= $student->kanji_ln ?></td>
                                                    <td ><?= $student->created_at ?></td>                                                
                                                    <td style="width:15%">
                                                        <a  href="<?php echo site_url('user/student/view/' . $student->id) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('view_profile'); ?>">
                                                            <span><i class="menu-icon tf-icons ti ti-eye"></i></span>
                                                        </a>
                                                        <a href="<?php echo site_url('user/student/edit/' . $student->id) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_phrase('edit_profile'); ?>">
                                                            <span><i class="menu-icon tf-icons ti ti-edit"></i></span>
                                                        </a>
                                                        <a href="javascript:;" data-bs-target="#deleteStudent<?php $student->id; ?>" data-bs-toggle="modal"><span><i class="menu-icon tf-icons ti ti-trash"></span></i></a>
                                                    </td>
                                                    <!-- Render other student details here -->
                                                </tr>
                                                <!-- Delete Student -->
                                            <div class="modal fade" id="deleteStudent<?php $student->id; ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="text-center mb-4">
                                                                <img src="../../assets/img/remove.gif" style="width: 50%;"> 
                                                                <h3 class="mb-2" style="color : #7367f0"><?php echo get_phrase('Are you sure'); ?>?</h3>  
                                                                <p><?php echo get_phrase('Do You Want To Remove This Student ?'); ?></p>
                                                            </div>
                                                            <div class="text-center mb-4">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo get_phrase('No'); ?></button>
                                                                <a href="<?php echo site_url('user/student/delete/' . $student->id) ?>" class="btn btn-danger" role="button"><?php echo get_phrase('Yes'); ?></a>                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- ENd Result -->
                        </div>
                    </div>
                </div>
                </form>   
            </div>                         
