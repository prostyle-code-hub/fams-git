<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/frontend/eu-cookie/purecookie.css" async />


<script>
  $(document).ready(function () {
    if (localStorage.getItem("accept_cookie_academy")) {
      //localStorage.removeItem("accept_cookie_academy");
    }else{
      $('#cookieConsentContainer').fadeIn(1000);
    }
  });

  function cookieAccept() {
    if (typeof(Storage) !== "undefined") {
      localStorage.setItem("accept_cookie_academy", true);
      localStorage.setItem("accept_cookie_time", "<?php echo date('m/d/Y'); ?>");
      $('#cookieConsentContainer').fadeOut(1200);
    }
  }
</script>
