<?php
// $Id: sites/all/themes/post/block-calendar.tpl.php 1.3 2010/02/17 14:41:03EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<?php if (!empty($block->subject)): ?>
    <h4><?php print $block->subject ?></h4>
<?php endif;?>
<!--div class="content"-->
    <?php print $block->content ?>
<!--/div-->
