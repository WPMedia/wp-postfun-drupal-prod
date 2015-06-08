<?php
// $Id: sites/all/themes/express/page.tpl.php 1.9 2010/02/18 15:03:07EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $head; ?>
        <?php print $styles; ?>
        <?php print $scripts; ?>
        <base href="<?php print $baseurl; ?>" />
    </head>
    <body class="<?php print $body_classes; ?>
        <div id="header"></div><!-- /#header -->

        <div id="content">
            <div id="content-header">
                <?php if ($title || $tabs || $messages): ?>
                    <?php if ($title): ?>
                    <?php endif; ?>
                    <?php print $messages; ?>
                    <?php if ($tabs): ?>
                        <div class="tabs"><?php print $tabs; ?></div>
                    <?php endif; ?>
                </div> <!-- /#content-header -->
            <?php endif; ?>
            <div id="content-area">
                <?php print $content; ?>
            </div>
        </div><!-- /#content -->

        <?php if ($closure_region): ?>
            <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
        <?php endif; ?>
        <?php print $closure; ?>
        
    </body>
</html>
