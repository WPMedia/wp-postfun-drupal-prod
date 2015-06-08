<?php
    //$sid = $_SESSION['sid'];
    include ('sites/all/paymentemailconfirmation.php');
 ?>
<script type="text/javascript">
    window.parent.location = "<?php print BASEURLHTTPS ?>post/thankyou/payment-thank-you";
</script>
