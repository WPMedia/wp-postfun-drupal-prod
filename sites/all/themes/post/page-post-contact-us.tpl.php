<?php
// $Id: sites/all/themes/post/page-post-contact-us.tpl.php 1.15 2010/08/20 12:06:15EDT Linda M. Williams (WILLIAMSLM) Production  $
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
                        <?php global $formtype;
                            if ($formtype == "Contest"):
                                if ($contestsimage): ?>
                                    <div class="wp-pad-bottom"><?php print $contestsimage; ?></div>
                                <?php endif;
                            elseif ($formtype == "Event"):
                                if ($eventsimage): ?>
                                    <div class="wp-pad-bottom"><?php print $eventsimage; ?></div>
                                <?php endif;
                            endif;
                        ?>
                        <?php if ($contactus): ?>
                            <div class="module shade grey_bg">
                            <h4>Contacts</h4>
                                <?php print $contactus; ?>
                            </div>
                            <div class="ctl grey"></div>
                            <div class="ctr grey"></div>
                            <div class="cbl grey"></div>
                            <div class="cbr grey"></div>
                        <?php endif; ?>
                    </div>
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

        <script type="text/javascript">
            <!--
            var wp_page_name = "wp - postfun - Contact Us - <?php print $title; ?>";
            var wp_channel = "site services";
            var wp_subsection = "site services - postfun";
            var wp_hierarchy = "site services|postfun|ContactUs";
            var wp_application = "application - postfun - Contact Us";
            -->
        </script>
        <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/javascript/placeSiteMetrix.js"></script>
        <script type="text/javascript">placeSiteMetrix();</script>

    </body>
</html>
