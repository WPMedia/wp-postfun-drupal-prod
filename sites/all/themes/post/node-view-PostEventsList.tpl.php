<!-- THIS TEMPLATE IS FOR THE POST EVENT LIST ON THE POST EVENTS LANDING PAGE -->
<?php
    // $Id: sites/all/themes/post/node-view-PostEventsList.tpl.php 1.11 2010/02/17 14:43:34EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<?php $start = strtotime($node->field_event_date[0]['value']); ?>
<?php $stDt = date("D, F j, Y", $start); ?>
<?php if ($node->field_event_date[0]['value2']): ?>
    <?php $end = strtotime($node->field_event_date[0]['value2']); ?>
<?php else: ?>
    <?php $end = strtotime($node->field_event_date[0]['value']); ?>
<?php endif; ?>
<?php $endDt = date("D, F j, Y", $end); ?>

<?php if ($end != $start): ?>
    <?php $dtRng = $stDt . " - " . $endDt; ?>
<?php else: ?>
    <?php $dtRng = $stDt; ?>
<?php endif; ?>

<?php if ($end >= strtotime("today")):?>
    <?php // THIS BLOCK IS FOR EVENTS FILTERED BY DATE ARGUMENT PASSED ON URL ?>
    <?php $dt = $_GET['dt']; ?>
    <?php if ($dt): // EVERYTHING YOU DO IN THIS BLOCK HAS TO BE REDONE BELOW ?>
        <?php $date = strtotime($dt); ?>
        <?php if (($date >= $start) && ($date <= $end)): ?>
            <div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
                <?php if ($page == 0): ?>
                    <h3><a href="node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a></h3>

                    <?php if ($node->field_evergreen[0]['value'] == "false"){ ?>
                        <p class="dateline"><?php print $dtRng; ?></p>
                    <?php } else { ?>
                        <p class="dateline">Ongoing</p>
                    <?php } ?>

                <?php endif; ?>
                <div class="content clear-block">
                    <a class="listThumbImg" href="node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $node->field_thumbimg[0]['view']; ?></a>
                    <span class="listExcerpt">
                        <?php print $node->content['body']['#value']; ?>
                    </span>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endif; ?>

    <?php // THIS BLOCK IS FOR DEFAULT EVENTS DISPLAY ?>
    <?php else:  // EVERYTHING YOU DO IN THIS BLOCK HAS TO BE REDONE ABOVE ?>
        <div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> listItem">
            <?php if ($page == 0): ?>
                <h3><a href="node/<?php print($node->field_webform[0]['nid']); ?>"><?php print $title ?></a></h3>

                <?php if ($node->field_evergreen[0]['value'] == "false"){ ?>
                    <p class="dateline"><?php print $dtRng; ?></p>
                <?php } else { ?>
                    <p class="dateline">Ongoing</p>
                <?php } ?>

            <?php endif; ?>
            <div class="content clear-block">
                <a class="listThumbImg" href="<?php print($node->nid); ?>"><?php print $node->field_thumbimg[0]['view']; ?></a>
                <span class="listExcerpt">
                    <?php print $node->content['body']['#value']; ?>
                </span>
                <div class="clear"></div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
