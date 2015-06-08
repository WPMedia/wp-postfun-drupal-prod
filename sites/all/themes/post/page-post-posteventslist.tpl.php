<?php
// $Id: sites/all/themes/post/page-post-posteventslist.tpl.php 1.22 2010/10/08 10:23:54EDT Linda M. Williams (WILLIAMSLM) Production  $
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
                    <div class="wp-column seven wp-pad-right">
                        <div class="wp-row wp-pad-bottom">
                            <div class="wp-column seven">
                                <div class="module shade lightblue_bg">
                                    <?php if ($tabs || $messages): ?>
                                        <?php print $messages; ?>
                                        <?php if ($tabs): ?>
                                          <div class="tabs"><?php print $tabs; ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php $dt = $_GET['dt']; ?>
                                    <?php if ($dt): ?>
                                        <?php $date = strtotime($dt); ?>
                                        <?php $d = date("l, F j, Y", $date); ?>
                                        <h2>Events for <?php print $d; ?></h2>
                                        <?php if ($eventfilteredlist): ?>
                                            <?php print $eventfilteredlist; ?>
                                        <?php else: ?>
                                            <p>There are currently no events.</p>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <h2>Current Events</h2>
                                        <?php if ($eventlist): ?>
                                            <?php print $eventlist; ?>
                                        <?php else: ?>
                                            <p>There are currently no events.</p>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="ctl lightblue"></div>
                                <div class="ctr lightblue"></div>
                                <div class="cbl lightblue"></div>
                                <div class="cbr lightblue"></div>
                            </div>
                        </div>
                        <?php include "includes/related-contestevents.php"; ?>
                    </div>
                    <div class="wp-column we-three wp-pad-right">
                        <div class="wp-row wp-pad-bottom">
                            <div class="wp-column we-three">
                                <?php if ($calendar): ?>
                                    <?php print $calendar; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="wp-row">
                            <div class="wp-column we-three">
                                <?php if ($twitter): ?>
                                    <div id="twitter-area" class="module shade twitterblue_bg">
                                        <?php print $twitter; ?>
                                    </div>
                                    <div class="twitterBottom">&nbsp;</div>
                                    <div class="ctl twitterblue"></div>
                                    <div class="ctr twitterblue"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="wp-column six">
                        <?php if ($eventsimage): ?>
                            <div class="wp-column six wp-pad-bottom">
                                <?php print $eventsimage; ?>
                            </div>
                        <?php endif; ?>
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
                </div>
            
            <?php if ($closure_region): ?>
                <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
            <?php endif; ?>
            <?php print $closure; ?>
            <?php if ($twitter): ?>
                <?php print $twitterscripts; ?>
            <?php endif; ?>

            <div class="wp-row wp-margin-bottom wp-pad-top">
                <div id="footer-v3" class="external"></div>
            </div>
        </div>
</div>
        <script type="text/javascript">
            <!--
            var wp_page_name = "wp - front - Events Section Front";
            var wp_channel = "site services";
            var wp_subsection = "site services - postfun";
            var wp_hierarchy = "site services|postfun|events";
            var wp_application = "application - postfun - events";
            -->
        </script>
        <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/javascript/placeSiteMetrix.js"></script>
        <script type="text/javascript">placeSiteMetrix();</script>
    </body>
</html>
