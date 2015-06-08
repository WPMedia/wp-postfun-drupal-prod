<?php
// $Id: sites/all/themes/post/page-post-rules.tpl.php 1.9 2010/02/17 14:45:34EST Williams, Linda M (WILLIAMSLM) Production Williams, Linda M (WILLIAMSLM)(2010/08/20 11:50:06EDT) $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $scripts; ?>
        <?php include "includes/wpd-global.php"; ?>
        <?php print $head; ?>
        <?php print $styles; ?>
        <base href="<?php print $baseurl; ?>" />
    </head>
    <body class="<?php print $body_classes; ?> popup">
        <div id="popup-wrapper">
            <div class="module">
                <?php print $content; ?>
            </div>
        </div>
    </body>
</html>
