<?php
// $Id: sites/all/themes/basicsub/page-post.tpl.php 1.3 2010/02/18 15:02:55EST Linda M. Williams (WILLIAMSLM) Production  $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $head; ?>
        <?php print $styles; ?>
        <?php print $scripts; ?>
    </head>
    <body class="<?php print $body_classes; ?>" style="background-color:#bcfffe;">
        <div id="page">
            <div id="page-inner">
                <a name="top" id="navigation-top"></a>

                <div id="header">
                    <div id="header-inner" class="clear-block">
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->

                <div id="main">
                    <div id="main-inner" class="clear-block<?php if ($search_box || $primary_links || $secondary_links || $navbar) { print ' with-navbar'; } ?>">

                        <div id="content">
                            <div id="content-inner">
                                <?php if ($mission): ?>
                                    <div id="mission"><?php print $mission; ?></div>
                                <?php endif; ?>
                                <?php if ($content_top): ?>
                                    <div id="content-top" class="region region-content_top">
                                        <?php print $content_top; ?>
                                    </div> <!-- /#content-top -->
                                <?php endif; ?>
                                <?php if ($breadcrumb || $title || $tabs || $help || $messages): ?>
                                    <div id="content-header">
                                        <?php print $breadcrumb; ?>
                                        <?php if ($title): ?>
                                            <h1 class="title"><?php print $title; ?></h1>
                                        <?php endif; ?>
                                        <?php print $messages; ?>
                                        <?php if ($tabs): ?>
                                            <div class="tabs"><?php print $tabs; ?></div>
                                        <?php endif; ?>
                                        <?php print $help; ?>
                                    </div> <!-- /#content-header -->
                                <?php endif; ?>
                                <div id="content-area">
                                    <?php print $content; ?>
                                </div>
                                <?php if ($feed_icons): ?>
                                    <div class="feed-icons"><?php print $feed_icons; ?></div>
                                <?php endif; ?>
                                <?php if ($content_bottom): ?>
                                    <div id="content-bottom" class="region region-content_bottom">
                                        <?php print $content_bottom; ?>
                                    </div> <!-- /#content-bottom -->
                                <?php endif; ?>
                            </div><!-- /#content-inner -->
                        </div><!-- /#content -->

                    </div><!-- /#main-inner -->
                </div><!-- /#main -->

            </div><!-- /#page-inner -->
        </div><!-- /#page -->

        <?php if ($closure_region): ?>
            <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
        <?php endif; ?>
        <?php print $closure; ?>
        
    </body>
</html>
