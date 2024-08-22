<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS3210 | Update Agent Information</span> <!-- UI Number -->
<script type="text/javascript">
    document.getElementById('myprofile').style = 'background-color: #7467f0;color: white;';
</script>
<div class="container-xxl flex-grow-1 container-p-y">   
<div class="row">
        <div class="col-md-3">
            <h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('My Profile') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('Modify') ?></span></h6>
        </div>
        <div class="col-md-9" style="text-align: right;">
        <form action="<?php echo site_url('user/edit_agent_profile'); ?>" enctype="multipart/form-data" method="post">
        <?php foreach ($edit_agent->result_array() as $key => $agent) : ?>
            <div class="btn-group" role="group" aria-label="Button Set">
            <a type="button" class="btn btn-secondary waves-effect waves-light"  href="/user/manage_profile_agent/"><?= get_phrase('View Profile') ?></a>
            <button type="reset" class="btn btn-secondary waves-effect waves-light" disabled><?= get_phrase('clear_data')?></button>
            <button type="submit" class="btn btn-primary waves-effect waves-light"><?= get_phrase('update')?></button>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">                  
                <div id="account-details" class="content">
                            <div class="content-header mb-3">
                                <h5 class="mb-0"><?= get_phrase('Modify Agent') ?></h5>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-2"><?= get_phrase('Agent No.') ?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="kanji_fname" class="form-control" value="<?php echo $agent['agent_no']; ?>" disabled/>
                            <input type="hidden" id="kanji_fname" name="agent_no" value="<?php echo $agent['agent_no']; ?>"/>
                            </div>
                            <div class="col-md-2"><?= get_phrase('Registration Date') ?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="kanji_fname" name="registraion_at" class="form-control" disabled value="<?php echo $agent['created_at']; ?>"/>
                                        <input type="hidden" id="kanji_fname" name="registraion_at" value="<?php echo $agent['created_at']; ?>"/>
                            </div>
                        </div>
<br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('first_name') ?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="romaji_fname" name="first_name" class="form-control" value="<?php echo $agent['first_name'] ?>" />
                            </div>
                            <div class="col-md-2"><?= get_phrase('last_name') ?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="romaji_fname" name="last_name" class="form-control" value="<?php echo $agent['last_name']; ?>" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('name_of_the_japanese_language_school')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="romajii_lname" name="school_name" class="form-control" value="<?php echo $agent['school']; ?>"/>
                            </div>
                            <div class="col-md-2"><?= get_phrase('representative_name')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="username" name="representative_name" class="form-control" value="<?php echo $agent['representative_name']; ?>"/> 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('country')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <select id="defaultSelect" class="form-select" name="country">                                        
                                        <option value="" Selected>Country...</option>
                                        <option value="japan" <?php if($agent['country'] == 'japan'){ echo 'selected'; } ?>>Japan</option>
                                        <option value="sri_lanka" <?php if($agent['country'] == 'sri_lanka'){ echo 'selected'; } ?> >Sri Lanka</option>
                                        <option value="india" <?php if($agent['country'] == 'india'){ echo 'selected'; } ?>>India</option>
                                        <option value="nepal" <?php if($agent['country'] == 'nepal'){ echo 'selected'; } ?>>Nepal</option>
                                    </select>

                            </div>
                            <div class="col-md-2"><?= get_phrase('address')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <textarea class="form-control" name="address" id="permanent_address" rows="3" placeholder=""><?php echo $agent['address']; ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('contact_email')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="romaji_fname" name="email" class="form-control" placeholder="" value="<?php echo $agent['email']; ?>"/>
                            </div>
                            <div class="col-md-2"><?= get_phrase('contact_tel')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="passport_number" name="phone" class="form-control" placeholder="" value="<?php echo $agent['phone']; ?>"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2"><?= get_phrase('skype_id')?>:
                            </div>
                            <div class="col-md-4 answer">
                            <input type="text" id="romajii_lname" name="skype" class="form-control" placeholder="" value="<?php echo $agent['skype']; ?>"/>
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-4 answer">
                            
                            </div>
                        </div>
                        

                                <div class="row g-3">
                                    <!-- Row 1 -->
                                    <input type="hidden" id="kanji_fname" name="agent_id" value="<?php echo $agent['user_id']; ?>"/>

                                    </div>
                                    
                                 


<br>

                            <hr>
                            <small style="color: #7467f0;"><?= get_phrase('If you wish to change the password, please update in below password field. If you do not need to update the password, kinldy keep it blank.') ?></small>
                            <br> <br>
                            <div class="row">
                            <div class="col-md-2"><?= get_phrase('password') ?>:
                            </div>
                            <div class="col-md-10 answer">
                            <input type="text" id="password" name="password" class="form-control" />
                            </div>
                            
                        </div>
                                    

                                    </div></div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
</div>