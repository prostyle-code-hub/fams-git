<script src="<?php echo base_url() . 'assets/frontend/default/js/vendor/modernizr-3.5.0.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/vendor/jquery-3.2.1.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/popper.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/bootstrap.min.js'; ?>"></script>

<?php if ($page_name == "home" || $page_name == "instructor_page") : ?>
    <script src="<?php echo base_url() . 'assets/frontend/default/js/slick.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/frontend/default/js/jquery.webui-popover.min.js'; ?>"></script>
<?php endif; ?>

<?php if ($page_name == "user_profile") : ?>
    <script src="<?php echo base_url() . 'assets/frontend/default/js/tinymce.min.js'; ?>"></script>
<?php endif; ?>

<script src="<?php echo base_url() . 'assets/frontend/default/js/main.js'; ?>"></script>
<!--<script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>-->
<script src="<?php echo base_url() . 'assets/frontend/default/js/jquery.form.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/jQuery.tagify.js'; ?>"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

<!--    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
    </script>-->

<?php endif; ?>

<?php if ($this->session->flashdata('error_message') != "") : ?>

    <script type="text/javascript">
        toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
    </script>

<?php endif; ?>

<?php if ($this->session->flashdata('info_message') != "") : ?>

    <script type="text/javascript">
        toastr.info('<?php echo $this->session->flashdata("info_message"); ?>');
    </script>

<?php endif; ?>
<script type="text/javascript">
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });
    if ($('.tagify').height()) {
        $('.tagify').tagify();
    }
</script>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/jquery/jquery.js'; ?>"></script>

<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/popper/popper.js'; ?>"></script>

<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/js/bootstrap.js'; ?>"></script>

<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'; ?>"></script>

<script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/node-waves/node-waves.js'; ?>"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/hammer/hammer.js'; ?>"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/i18n/i18n.js'; ?>"></script>

<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/typeahead-js/typeahead.js'; ?>"></script>


<script src="../../assets/vendor/js/menu.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/js/menu.js'; ?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js'; ?>"></script>

<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js'; ?>"></script>

<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="<?php echo base_url() . 'assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js'; ?>"></script>

<!-- Main JS -->
<script src="../../assets/js/main.js"></script>
<script src="<?php echo base_url() . 'assets/js/main.js'; ?>"></script>
<!-- Page JS -->
<script src="../../assets/js/pages-auth.js"></script>
<script src="<?php echo base_url() . 'assets/js/pages-auth.js'; ?>"></script>