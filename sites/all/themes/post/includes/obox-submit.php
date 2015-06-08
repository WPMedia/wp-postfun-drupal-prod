<?php
    $sub = $_GET['sid'];
    $dom = $_GET['dom'];
?>
<p>This is where we submit the payment data for SID <?php print $sub; ?>, then redirect the browser window to the payment thank you page.</p>
<p><a href="obox-close.php?dom=<?php print $_SERVER['DOCUMENT_ROOT']; ?>">Redirect</a></p>
