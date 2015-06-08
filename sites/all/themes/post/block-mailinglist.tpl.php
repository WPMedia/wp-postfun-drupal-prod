<?php
// $Id: sites/all/themes/post/block-mailinglist.tpl.php 1.3 2010/02/17 14:41:04EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<?php if (!empty($block->subject)): ?>
    <h4><?php print $block->subject ?></h4>
<?php endif;?>
<p><?php print $block->content ?></p>
<div class="clear"></div>
