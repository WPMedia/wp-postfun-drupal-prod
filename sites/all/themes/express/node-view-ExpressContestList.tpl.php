
<!-- THIS TEMPLATE IS FOR THE EXPRESS CONTEST/EVENTS LIST  LANDING PAGE -->
<?php
    // $Id: sites/all/themes/express/node-view-ExpressContestList.tpl.php 1.5 2010/02/18 15:03:04EST Linda M. Williams (WILLIAMSLM) Production  $
?>

<?php if ($node->type== "expressevents"):?>
    <?php $start = strtotime($node->field_express_event_date[0]['value']); ?>
    <?php $stDt = date("D, F j, Y", $start); ?>
    <?php if ($node->field_express_event_date[0]['value2']): ?>
        <?php $end = strtotime($node->field_express_event_date[0]['value2']); ?>
    <?php else: ?>
        <?php $end = strtotime($node->field_express_event_date[0]['value']); ?>
    <?php endif; ?>
    <?php $endDt = date("D, F j, Y", $end); ?>

    <?php if ($end != $start): ?>
        <?php $dtRng = $stDt . " - " . $endDt; ?>
    <?php else: ?>
        <?php $dtRng = $stDt; ?>
    <?php endif; ?>
<?php endif; ?>
            
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
   



    <div class="content clear-block">
        <!-- wrap thumb image in link -->
        

        <a class="listThumbImg" href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $node->field_thumbimg[0]['view']; ?></a>

        <span class="listExcerpt">
        <?php if ($page == 0): ?>

   <strong>    <a href="<?php print $baseurl; ?>node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a></strong>

        <?php if ($node->type== "expressevents"):?>
            <?php if ($node->field_express_evergreen[0]['value'] == "false"){ ?>
                <p class="dateline"><?php print $dtRng; ?></p>
            <?php } else { ?>
                <p class="dateline">Ongoing</p>
            <?php } ?>
        <?php endif; ?>

    <?php endif; ?>
            <?php print $node->content['body']['#value']; ?>
        </span>

        <div class="floatClear">&nbsp;</div>
    </div>

</div>

