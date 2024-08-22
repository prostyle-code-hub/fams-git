<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS6100 | Edit Domestic user Profile</span> <!-- UI Number -->
<?php
$user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
$social_links = json_decode($user_data['social_links'], true);
$payment_keys = json_decode($user_data['payment_keys'], true);
$paypal_keys = $payment_keys['paypal'];
$stripe_keys = $payment_keys['stripe'];
$razorpay_keys = $payment_keys['razorpay'];
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row ">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?= get_phrase('edit') ?></h4>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">                   

                    <form class="required-form" action="<?php echo site_url('admin/users/edit/' . $user_id); ?>" enctype="multipart/form-data" method="post">
                        <input type="text" name=""
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
