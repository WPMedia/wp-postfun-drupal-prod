<?php
// $Id: sites/all/themes/express/node-thankyoupage.tpl.php 1.1 2009/11/06 12:24:25EST GUPTARM Exp  $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
   
    <?php if ($page == 0): ?>
        <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>
    <div class="content clear-block">
        <?php print $content ?>
    </div>
</div>
