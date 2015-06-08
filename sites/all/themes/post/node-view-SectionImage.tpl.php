<?php
// $Id: sites/all/themes/post/node-view-SectionImage.tpl.php 1.4 2010/02/17 14:43:35EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<?php if ($node->field_image_link[0]['value']){ ?>
    <a href="<?php print($node->field_image_link[0]['value']); ?>" target="_blank"><?php print($node->field_image[0]['view']); ?></a>
<?php } else { ?>
    <?php print($node->field_image[0]['view']); ?>
<?php } ?>
