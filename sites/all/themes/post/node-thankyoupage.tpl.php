<?php
// $Id: sites/all/themes/post/node-thankyoupage.tpl.php 1.3 2010/02/17 14:43:29EST Linda M. Williams (WILLIAMSLM) Production  $
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
        <?php print $content ?>
    </div>
</div>
