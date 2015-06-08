<?php
    // $Id: sites/all/themes/post/node-view-ExpressContestHome.tpl.php 1.4 2010/02/17 14:43:30EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<li class="frLi">
    <a href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a>
    <?php print $node->content['body']['#value']; ?>
</li>
