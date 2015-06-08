<?php
// $Id: sites/all/themes/post/node-view-Welcome.tpl.php 1.3 2010/02/17 14:43:36EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<h2><?php print($node->title); ?></h2>
<p><?php print($node->field_image[0]['view']); ?>
<?php print($node->content['body']['#value']); ?></p>
