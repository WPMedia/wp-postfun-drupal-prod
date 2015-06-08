<?php
// $Id: sites/all/themes/post/node-webform.tpl.php 1.22 2010/02/17 14:43:37EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
    <?php if ($terms): ?>
        <?php
            $vocabularies = taxonomy_get_vocabularies();
            global $formtype;
            foreach($vocabularies as $vocabulary) {
                if ($vocabularies) {
                    $terms = taxonomy_node_get_terms_by_vocabulary($node, $vocabulary->vid);
                    if ($terms) {
                        foreach ($terms as $term) {
                            $formtype = $term->name;
                        }
                    }
                }
            }
        ?>
    <?php endif; ?>
    <?php if ($page == 0): ?>
        <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
    <?php endif; ?>
    <div class="content clear-block">
        <?php print($node->field_mainimg[0]['view']); ?>
        <?php print($node->field_optout[0]['view']); ?>
        <p><?php print($node->content['body']['#value']); ?></p>
             

        <?php if ($node->field_rules[0]['nid']){ ?>
            <?php $rulesurl = ($baseurl . "node/" . $node->field_rules[0]['nid']); ?>
            <p><a href="#" onclick="window.open('<?php print $rulesurl; ?>', 'Rules', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;"><?php print($node->field_rules[0]['view']); ?></a></p>
        <?php } ?>
        <?php if($node->field_votepix != ""): ?>
            <?php foreach($node->field_votepix as $pix){ ?>
                <?php if ($pix['view'] != ""): ?>
                    <div class="votePic">
                        <div class="votePicImg">
                            <?php print $pix['view']; ?>
                        </div>
                        <div class="votePicDesc">
                            <p><?php print $pix['data']['description']; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php } ?>
        <?php endif; ?>
        <?php if ($node->field_votepix[0]['view'] != ""): ?>
            <div class="clear"></div>
        <?php endif; ?>
        <?php print($node->content['webform']['#value']); ?>
        <?php if ($node->field_terms[0]['value'] == "Yes"){ ?>
            <div class="terms-use">By Submitting this form, I understand and agree to the Rules for this promotion and to the <a href="#" onclick="window.open('<?php print $termsurl; ?>', 'Rules', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;">TERMS OF USE</a> for this website.</div>
               <?php } ?>
            <div class="terms-use">Read our <a href="#" onclick="window.open('<?php print $privacyurl; ?>', 'Rules', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;">Privacy Policy</a> to learn how we use your personal information.</div>
            <?php if ($node->field_return_policy[0]['value'] == "Yes"){ ?>
            <div class="terms-use">Read our <a href="#" onclick="window.open('<?php print $returnpolicyurl; ?>', 'Rules', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,width=460,height=500');return false;">Return Policy</a> to learn about ticket purchase returns.</div>
               <?php } ?>

        <?php if ($node->field_platlogo1[0]['view'] || $node->field_platlogo2[0]['view'] || $node->field_platlogo3[0]['view'] || $node->field_platlogo4[0]['view'] || $node->field_platlogo5[0]['view'] || $node->field_platlogo6[0]['view'] || $node->field_platlogo7[0]['view'] || $node->field_platlogo8[0]['view']){ ?>
            <div class="sponsorBlock">
                <h2>Platinum Sponsors</h2>
                <?php print($node->field_platlogo1[0]['view']); ?>
                <?php print($node->field_platlogo2[0]['view']); ?>
                <?php print($node->field_platlogo3[0]['view']); ?>
                <?php print($node->field_platlogo4[0]['view']); ?>
                <?php print($node->field_platlogo5[0]['view']); ?>
                <?php print($node->field_platlogo6[0]['view']); ?>
                <?php print($node->field_platlogo7[0]['view']); ?>
                <?php print($node->field_platlogo8[0]['view']); ?>
            </div>
            <div class="clear"></div>
        <?php } ?>
        <?php if ($node->field_goldlogo1[0]['view'] || $node->field_goldlogo2[0]['view'] || $node->field_goldlogo3[0]['view'] || $node->field_goldlogo4[0]['view'] || $node->field_goldlogo5[0]['view'] || $node->field_goldlogo6[0]['view'] || $node->field_goldlogo7[0]['view'] || $node->field_goldlogo8[0]['view']){ ?>
            <div class="sponsorBlock">
                <h2>Gold Sponsors</h2>
                <?php print($node->field_goldlogo1[0]['view']); ?>
                <?php print($node->field_goldlogo2[0]['view']); ?>
                <?php print($node->field_goldlogo3[0]['view']); ?>
                <?php print($node->field_goldlogo4[0]['view']); ?>
                <?php print($node->field_goldlogo5[0]['view']); ?>
                <?php print($node->field_goldlogo6[0]['view']); ?>
                <?php print($node->field_goldlogo7[0]['view']); ?>
                <?php print($node->field_goldlogo8[0]['view']); ?>
            </div>
            <div class="clear"></div>
        <?php } ?>
        <?php if ($node->field_silverlogo1[0]['view'] || $node->field_silverlogo2[0]['view'] || $node->field_silverlogo3[0]['view'] || $node->field_silverlogo4[0]['view'] || $node->field_silverlogo5[0]['view'] || $node->field_silverlogo6[0]['view'] || $node->field_silverlogo7[0]['view'] || $node->field_silverlogo8[0]['view']){ ?>
            <div class="sponsorBlock">
                <h2>Silver Sponsors</h2>
                <?php print($node->field_silverlogo1[0]['view']); ?>
                <?php print($node->field_silverlogo2[0]['view']); ?>
                <?php print($node->field_silverlogo3[0]['view']); ?>
                <?php print($node->field_silverlogo4[0]['view']); ?>
                <?php print($node->field_silverlogo5[0]['view']); ?>
                <?php print($node->field_silverlogo6[0]['view']); ?>
                <?php print($node->field_silverlogo7[0]['view']); ?>
                <?php print($node->field_silverlogo8[0]['view']); ?>
            </div>
            <div class="clear"></div>
        <?php } ?>
        <?php if ($node->field_logo1[0]['view'] || $node->field_logo2[0]['view'] || $node->field_logo3[0]['view'] || $node->field_logo4[0]['view'] || $node->field_logo5[0]['view'] || $node->field_logo6[0]['view'] || $node->field_logo7[0]['view'] || $node->field_logo8[0]['view'] || $node->field_logo9[0]['view'] || $node->field_logo10[0]['view'] || $node->field_logo11[0]['view'] || $node->field_logo12[0]['view'] || $node->field_logo13[0]['view'] || $node->field_logo14[0]['view'] || $node->field_logo15[0]['view'] || $node->field_logo16[0]['view'] || $node->field_logo17[0]['view'] || $node->field_logo18[0]['view'] || $node->field_logo19[0]['view'] || $node->field_logo20[0]['view']){ ?>
            <div class="sponsorBlock">
                <h2>Sponsors</h2>
                <div class="sponsorLogos">
                    <?php print($node->field_logo1[0]['view']); ?>
                    <?php print($node->field_logo2[0]['view']); ?>
                    <?php print($node->field_logo3[0]['view']); ?>
                    <?php print($node->field_logo4[0]['view']); ?>
                    <?php print($node->field_logo5[0]['view']); ?>
                    <?php print($node->field_logo6[0]['view']); ?>
                    <?php print($node->field_logo7[0]['view']); ?>
                    <?php print($node->field_logo8[0]['view']); ?>
                    <?php print($node->field_logo9[0]['view']); ?>
                    <?php print($node->field_logo10[0]['view']); ?>
                    <?php print($node->field_logo11[0]['view']); ?>
                    <?php print($node->field_logo12[0]['view']); ?>
                    <?php print($node->field_logo13[0]['view']); ?>
                    <?php print($node->field_logo14[0]['view']); ?>
                    <?php print($node->field_logo15[0]['view']); ?>
                    <?php print($node->field_logo15[0]['view']); ?>
                    <?php print($node->field_logo17[0]['view']); ?>
                    <?php print($node->field_logo18[0]['view']); ?>
                    <?php print($node->field_logo19[0]['view']); ?>
                    <?php print($node->field_logo20[0]['view']); ?>
                </div>
            </div>
            <div class="clear"></div>
        <?php } ?>
        <div class="clear"></div>
        <div class="contactBlock">
            <h2>Contact Information</h2>
            <?php print($node->field_contact[0]['view']); ?>
        </div>
    </div>
</div>
