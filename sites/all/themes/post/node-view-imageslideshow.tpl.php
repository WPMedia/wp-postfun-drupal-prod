<?php
// $Id: sites/all/themes/post/node-view-imageslideshow.tpl.php 1.4 2010/02/17 14:43:32EST Linda M. Williams (WILLIAMSLM) Production  $
?>

<?php if ($node->field_image_link[0]['value']){ ?>
    <a href="<?php print($node->field_image_link[0]['value']); ?>" target="_blank"><?php print($node->field_image[0]['view']); ?></a>
    <div class="slideshow_title">
        <h3><?php print $title; ?></h3>
    </div>
<?php } else { ?>
    <?php print($node->field_image[0]['view']); ?>
    <div class="slideshow_title">
        <h3><?php print $title; ?></h3>
    </div>
<?php } ?>

