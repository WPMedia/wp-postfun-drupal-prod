<?php
// $Id: sites/all/themes/post/page.tpl.php 1.21 2010/10/13 14:42:23EDT Linda M. Williams (WILLIAMSLM) Production  $
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
        <meta property="og:image" content="<?php print $baseurl ?>sites/all/themes/post/images/postfun_share.jpg"/>
        <base href="<?php print $baseurl; ?>" />
        
    </head>
    <!-- ****** BODY ****** -->
	<body class="eidos">
		<!-- START shell -->
		<div id="shell">

    <div id="header-v3" class="external" data-config="hotTopics=false"></div> 

                    
                    <div class="sectionTitle">
                    PostFun
                    </div>
                     <?php include "includes/title_breadcrumb.php"; ?>   
                    <?php include "includes/subnav.php"; ?>
                   
                   
                <div class="wp-row">
                    <div class="wp-column ten wp-pad-right">
                        <div class="module shade lightblue_bg">
                            <?php if ($tabs || $messages): ?>
                                <?php print $messages; ?>
                                <?php if ($tabs): ?>
                                  <div class="tabs"><?php print $tabs; ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php print $content; ?>
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
                        <?php if ($contactblock || $mailinglist || $socialnetwork): ?>
                            <div class="wp-column six">
                                <div class="module">
                                    <?php if ($socialnetwork):
                                        print $socialnetwork;
                                    endif; ?>
                                </div>
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
                
            
            <?php if ($closure_region): ?>
                <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
            <?php endif; ?>
            <?php print $closure; ?>

            <div class="wp-row wp-margin-bottom wp-pad-top">
                <div id="footer-v3" class="external"></div>
            </div>
            </div>
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
