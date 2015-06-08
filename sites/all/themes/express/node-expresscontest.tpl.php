<?php
    // $Id: sites/all/themes/express/node-expresscontest.tpl.php 1.6 2010/02/18 15:03:03EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
    <?php if ($page == 0): ?>
        <h4><?php print $title ?></h4>
    <?php endif; ?>

    <div class="content clear-block">
        <!-- wrap thumb image in link -->
        <a class="listThumbImg" href="node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $node->field_thumbimg[0]['view']; ?></a>
<h2>Reena</h2>
        <span class="listExcerpt">
            <span class="excerptP"><?php print $node->content['body']['#value']; ?></span>
        </span>

        <div class="floatClear">&nbsp;</div>
    </div>
</div>
