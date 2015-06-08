<?php
    // $Id: sites/all/themes/post/node-view-PostContestList.tpl.php 1.8 2010/02/17 14:43:33EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
    <?php if ($page == 0): ?>
        <h3><a href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a></h3>
    <?php endif; ?>

    <div class="content clear-block">
        <!-- wrap thumb image in link -->
        <a class="listThumbImg" href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $node->field_thumbimg[0]['view']; ?></a>

        <span class="listExcerpt">
            <?php print $node->content['body']['#value']; ?>
        </span>
        
        <div class="floatClear">&nbsp;</div>
    </div>

</div>
