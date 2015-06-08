<?php
// $Id: sites/all/themes/post/page-post-error.tpl.php 1.6 2010/10/08 09:54:04EDT Linda M. Williams (WILLIAMSLM) Production  $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $scripts; ?>
        <?php include "includes/wpd-global.php"; ?>
        <?php print $head; ?>
        <?php print $styles; ?>
        <?php global $formtype; ?>
        <base href="<?php print $baseurl; ?>" />
    </head>
    <body class="<?php print $body_classes; ?>">
        <div id="wrapper">
            <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/wpost/javascript/module/module.external-shell-1.0.0.js">({'disableLeaderboard' : 'true'})</script>
                <div  class="wp-pad-top wp-pad-bottom"  id="slug_leaderboard" style="display:none;">
                    <script type="text/javascript">placeAd2(commercialNode,"leaderboard",false,"");</script>
                </div>
            <div class="content-wrapper">
                <div class="wp-row wp-pad-top wp-pad-bottom">
                    <div class="wp-column sixteen">
                        <ul class="navRightLinks noprint"></ul>
                        <?php include "includes/title_breadcrumb.php"; ?>
                        <?php include "includes/subnav.php"; ?>
                    </div>
                </div>
                <div class="wp-row">
                    <div class="wp-column ten wp-pad-right">
                        <div class="module shade lightblue_bg">
                            <?php if ($tabs): ?>
                                <?php if ($tabs): ?>
                                  <div class="tabs"><?php print $tabs; ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!--div class="messages error"-->
                                <?php print $content; ?>
                            <!--/div-->
                        </div>
                        <div class="ctl lightblue"></div>
                        <div class="ctr lightblue"></div>
                        <div class="cbl lightblue"></div>
                        <div class="cbr lightblue"></div>
                    </div>
                    <div class="wp-column six">
                        <div class="wp-column six">
                            <?php include "includes/sectionImage.php"; ?>
                        </div>
                        <?php if ($contactblock || $mailinglist): ?>
                            <div class="wp-column six">
                                <div class="module shade grey_bg">
                                    <?php if ($mailinglist):
                                        print $mailinglist;
                                    endif; ?>
                                    <?php if ($contactblock && $mailinglist): ?>
                                        <div class="hrule grey-dots">&nbsp;</div>
                                    <?php endif; ?>
                                    <?php if ($contactblock):
                                        print $contactblock;
                                    endif; ?>
                                </div>
                                <div class="ctl grey"></div>
                                <div class="ctr grey"></div>
                                <div class="cbl grey"></div>
                                <div class="cbr grey"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($closure_region): ?>
                <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
            <?php endif; ?>
            <?php print $closure; ?>

            <div class="wp-row wp-margin-bottom wp-pad-top">
                <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/wpost/javascript/module/module.external-footer-1.0.0.js"></script>
            </div>

        </div>

        <script type="text/javascript">
            <!--
            <?php global $formtype; ?>
            var wp_page_name = "wp - postfun - <?php print $formtype; ?> - <?php print $title; ?>";
            var wp_channel = "site services";
            var wp_subsection = "site services - postfun";
            var wp_hierarchy = "site services|postfun|<?php print $formtype; ?>";
            var wp_application = "application - postfun - <?php print $formtype; ?>";
            -->
        </script>
        <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/javascript/placeSiteMetrix.js"></script>
        <script type="text/javascript">placeSiteMetrix();</script>

    </body>
</html>
