<?php
    // $Id: sites/all/themes/post/node-view-PostEventHome.tpl.php 1.5 2010/02/17 14:43:34EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<?php if ($node->field_event_date[0]['value2']): ?>
    <?php $end = strtotime($node->field_event_date[0]['value2']); ?>
<?php else: ?>
    <?php $end = strtotime($node->field_event_date[0]['value']); ?>
<?php endif; ?>

<?php if ($end >= strtotime("today")):?>
    <li class="hpLi">
        <a href="node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a>
    </li>
<?php endif; ?>
