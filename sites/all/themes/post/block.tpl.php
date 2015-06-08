<?php
// $Id: sites/all/themes/post/block.tpl.php 1.3 2010/02/17 14:41:02EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block block block-<?php print $block->module ?>">

<?php if (!empty($block->subject)): ?>
  <h2><?php print $block->subject ?></h2>
<?php endif;?>
  <div class="content"><?php print $block->content ?></div>
</div>
