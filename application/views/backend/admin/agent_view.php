<div class="container-xxl flex-grow-1 container-p-y">   

    <div class="row">
        <div class="col-xl-3">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= get_phrase('agent') ?> /</span> <?= get_phrase('View_agent') ?></h4>
        </div>
        <div class="col-xl-9">

        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">                  
                    <div id="account-details" class="content">
                        <div class="content-header mb-3">
                                                        
                        </div>
                        <div class="row g-3">
                            <!-- Row 1 -->
                            <div class="col-sm-6">
                                <label class="form-label" for="kanji_fname">Agent No</label>
                                <input type="text" id="kanji_fname" name="kanji_fname" class="form-control" disabled="" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="kanji_fname">Registration Date</label>
                                <input type="date" id="kanji_fname" name="kanji_fname" class="form-control" disabled="" />
                            </div>
                            <!-- Row 2 -->
                            <div class="col-sm-6">
                                <label class="form-label" for="romaji_fname">Name</label>
                                <input type="text" id="romaji_fname" name="romaji_fname" class="form-control" placeholder="Romaji First & Middle Name" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="romajii_lname">Name of the Japanese Language School</label>
                                <input type="text" id="romajii_lname" name="romajii_lname" class="form-control" placeholder="Romaji Last Name" />
                            </div>
                            <!-- Row 3 -->                            
                            <div class="col-sm-6">                                    
                                <label class="form-label" for="fn_mn_spouse">Representative Name</label>
                                <input type="text" id="username" name="fn_mn_spouse" class="form-control" placeholder="First and Middle name of spouse" />                                
                            </div>                            
                            <div class="col-sm-6">
                                <label class="form-label" for="permanent_address">Address</label>                                    
                                <textarea class="form-control" name="permanent_address" id="permanent_address" rows="3" placeholder="">Permanent Address</textarea>
                            </div>

                            <!-- Row 6 -->
                             <div class="col-sm-6">
                                <label class="form-label" for="romaji_fname">Contact Email</label>
                                <input type="text" id="romaji_fname" name="romaji_fname" class="form-control" placeholder="Romaji First & Middle Name" />
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="romajii_lname">Skype ID</label>
                                <input type="text" id="romajii_lname" name="romajii_lname" class="form-control" placeholder="Romaji Last Name" />
                            </div>

                            <!-- Row 7-->
                            <div class="col-sm-6">
                                <label class="form-label" for="passport_number">Contact Tel</label>
                                <input type="text" id="passport_number" name="passport_number" class="form-control" placeholder="Passport Number" />
                            </div>
                            <div class="col-sm-6"></div>                              

                            <div class="col-12" style="text-align: right"> 

                                <button class="btn btn-primary btn-next">
                                    <span class="align-middle d-sm-inline-block d-none me-sm-1">Create Agent</span>

                                </button>
                            </div>
                        </div>
                    </div>




                </div> <!-- end card body-->
            </div> <!-- end card -->

        </div>
    </div>
</div>