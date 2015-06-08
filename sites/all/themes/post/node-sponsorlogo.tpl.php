<?php
// $Id: sites/all/themes/post/node-sponsorlogo.tpl.php 1.5 2010/02/17 14:43:28EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div class="logoImage">
    <?php if ($node->field_link[0]['value']){ ?>
        <a href="<?php print($node->field_link[0]['value']); ?>" target="_blank"><?php print($node->field_logo[0]['view']); ?></a>
    <?php } else { ?>
        <?php print($node->field_logo[0]['view']); ?>
    <?php } ?>
</div>
