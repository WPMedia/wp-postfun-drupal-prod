<?php
    // $Id: sites/all/themes/post/node-postcontest.tpl.php 1.5 2010/02/17 14:43:00EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
    <?php if ($page == 0): ?>
        <h4><a href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a></h4>
    <?php endif; ?>

    <div class="content clear-block">
        <!-- wrap thumb image in link -->
        <a class="listThumbImg" href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $node->field_mainimg[0]['view']; ?></a>

        <span class="listExcerpt">
            <span class="excerptP"><?php print $node->content['body']['#value']; ?></span>
        </span>
        
        <div class="floatClear">&nbsp;</div>
    </div>
</div>
