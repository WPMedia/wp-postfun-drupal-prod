<?php
// $Id: sites/all/themes/post/page-post-admin-userguide.tpl.php 1.6 2010/08/20 12:06:13EDT Linda M. Williams (WILLIAMSLM) Production  $
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
                    <div class="wp-column four wp-pad-right">
                        <div class="module shade grey_bg">
                            <h4>Overview</h4>
                            <ul>
                                <li><a href="#" class="help-topic" name="admin_login">Admin Login</a></li>
                            </ul>
                            <br />
                            <h4>Creating a Contest/Event</h4>
                            <ul>
                                <li><a href="#" class="help-topic" name="rules">Create Rules</a></li>
                                <li><a href="#" class="help-topic" name="clone">Clone Webform</a></li>
                                <li><a href="#" class="help-topic" name="contest">Create Contest</a></li>
                            </ul>
                            <br />
                        </div>
                        <div class="ctl grey"></div>
                        <div class="ctr grey"></div>
                        <div class="cbl grey"></div>
                        <div class="cbr grey"></div>
                    </div>
                    <div class="wp-column twelve">
                        <div class="module shade lightblue_bg">
                            <?php if ($tabs || $messages): ?>
                                <?php print $messages; ?>
                                <?php if ($tabs): ?>
                                  <div class="tabs"><?php print $tabs; ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!--WITMER'S STUFF GOES HERE-->
                            <div class="postfun-help" id="postfun-help-admin_login">
                                <img class="userguide-img" src="sites/all/themes/post/images/userguide/admin_login.jpg" />
                                <div class="userguide-txt">
                                    <h3>Login</h3>
                                    <p><a href="http://washpost.com/projects/postfun/doc/video_admin_login.html" target="_blank">Watch video tutorial</a> (username: washpost / password: wpni+washpost)</p>
                                    <ol>
                                        <li>In browser, <strong>navigate</strong> to: <a href="http://postfun.washingtonpost.com/post/login" target="_blank">http://postfun.washingtonpost.com/post/login</a></li>
                                        <li><strong>Login</strong> with your network username &amp; password </li>
                                        <li>If you have <strong>problems</strong> logging in, contact IT Web Solutions.</li>
                                        <li>Once logged-in you should see a link in the main nav 'Administor', and four quick links to start editing/creating.</li>
                                    </ol>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="postfun-help" id="postfun-help-rules">
                                <img class="userguide-img" src="sites/all/themes/post/images/userguide/rules_landing.jpg" />

                                <div class="userguide-txt">
                                    <h3>Create Rules</h3>
                                    <p><a href="http://washpost.com/projects/postfun/doc/video_rules.html" target="_blank">Watch Rules Video Tutorial</a> (username: washpost / password: wpni+washpost)</p>
                                    <ol>
                                        <li>In Navigation, click on<strong> add content</strong>.</li>
                                        <li>Click on <strong>Rules</strong></li>
                                        <li><strong>Title</strong> (enter contest name <strong>PLUS the ending 'rules'</strong>)</li>
                                        <li><strong>Contest Type</strong> (select post or express)</li>
                                        <li><strong>Body </strong>(copy and paste the rules here)</li>
                                        <li>Input format (ignore)</li>
                                        <li>Revision information (ignore)</li>
                                        <li><strong>Scheduling options</strong> (publish on: 2009:09:30 12:44:30 = year:month:day hour:min:sec (military time)*to note: noon=12:00:00, last minute of day=23:59:59, midnight=24:00:00, first minute of day=00:01:00</li>
                                        <li>Authoring information (ignore)</li>
                                        <li><strong>Publishing options:</strong> (select published ONLY if scheduling options selected)</li>
                                        <li><strong>Click save</strong> (done!)</li>
                                        <li>* close the window and return back to the website.</li>
                                    </ol>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="postfun-help" id="postfun-help-clone">
                                <img class="userguide-img" src="sites/all/themes/post/images/userguide/clone_contest.jpg" />

                                <div class="userguide-txt">
                                    <h3>Clone Webform (Detail Page)</h3>
                                    <p><a href="http://washpost.com/projects/postfun/doc/video_webform.html" target="_blank">Watch Webform video tutorial</a> (username: washpost / password: wpni+washpost)</p>
                                    <ol>
                                        <li>Left Navigation - Click on <strong>manage content </strong>
                                        <li>Select the bullet 'type', <strong>sort by node type: webform</strong>, click 'filter' (If you do not see these options, select 'reset')</li>
                                        <li>Click on the title of the template that best reflects your contest. the most popular is = (<strong>Form Template - Standard Profile & Age (Name, Address, Email, Age - 13 and over</strong>)</li>
                                        <li>Click '<strong>clone</strong>' tab</li>
                                        <li><strong>Large Graphic</strong> - browse for the top banner graphic from your desktop, upload graphic</li>
                                        <li><strong>Contest Type</strong> (post/express)</li>
                                        <li><strong>Page Type</strong> (contest/event)</li>
                                        <li><strong>Terms of Use</strong> - select yes if you would like the 'terms of use' to be displayed</li>
                                        <li><strong>Rules</strong> - choose a rules to associate w/ your contest/event (if not in drop down, see step 1. 'creating rules' instructions)</li>
                                        <li><strong>Contact Information</strong> - select your contact info (if not in drop down, see 'creating contact information')</li>
                                        <li><strong>Title</strong> - erase clone name, and replace with your contest/event title (this will be shown in the header on the detail page, and in the admin tool drop down)</li>
                                        <li>Description - update w/ <strong>long description</strong> (this is what will show on the contest/event page above form)</li>
                                        <li><strong>Confirmation message</strong> - leave as-is . (if you would like to have a unique thank you page - see 'creating unique thank you page'.)</li>
                                        <li>Webform access control (ignore)</li>
                                        <li>Webform mail settings (ignore)</li>
                                        <li><strong>Webform advanced settings</strong> - allows you to<strong> limit entry of information by user</strong>, and if you want to use age field --- (<strong>select limit to 1 submission ever</strong>, or according to your own rules including, ever, every day, every week.)</li>
                                        <li><strong>Vote Pictures</strong> - browse from your desktop .jpg, include text (if using url links, use 'tiny url', sample: )</li>
                                        <li>Platinum Sponsors (100px x 100px) - Logo will appear below associated heading in the footer of the page (if not in the drop down, see step 'creating sponsor logos')</li>
                                        <li>Gold Sponsors (100px x 100px) - Logo will appear below associated heading in the footer of the page (if not in the drop down, see step 'creating sponsor logos')</li>
                                        <li>Silver Sponsors (100px x 100px) - Logo will appear below associated heading in the footer of the page (if not in the drop down, see step 'creating sponsor logos')</li>
                                        <li><strong>Sponsors</strong> (100px x 100px) - Logo will appear below associated heading in the footer of the page (if not in the drop down, see step 'creating sponsor logos')</li>
                                        <li>Revision information (ignore)</li>
                                        <li><strong>Scheduling</strong> options (publish on: 2009:09:30 12:44:30 = year:month:day hour:min:sec (military time) *to note: noon=12:00:00, last minute of day=23:59:59, midnight=24:00:00, first minute of day=00:01:00</li>
                                        <li>Authoring information (ignore)   </li>
                                        <li><strong>Publishing</strong> options: (select published ONLY if scheduling options selected)</li>
                                        <li>click <strong>save</strong></li>
                                    </ol>

                                    <h3>Form Components</h3>
                                    <ol>
                                        <li>make any edits, or additional form elements necessary here. (if additional qs, see detail section "form components")</li>
                                        <li>publish or submit.</li>
                                    </ol>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="postfun-help" id="postfun-help-contest">
                                <img class="userguide-img" src="sites/all/themes/post/images/userguide/create_contest.jpg" />
                                <div class="userguide-txt">
                                    <h3>Create Contest (Thumbnail List Page)</h3>
                                    <p><a href="http://washpost.com/projects/postfun/doc/video_postcontest.html" target="_blank">Watch 'Post Contest' Video Tutorial</a> (username: washpost / password: wpni+washpost)</p>
                                    <ol>
                                        <li>In navigation, click on <strong>add content</strong></li>
                                        <li>Click on<strong> post contest</strong></li>
                                        <li><strong>Enter title</strong> to show on website (this will be shown on the list view)</li>
                                        <li>Upload <strong>thumbnail</strong> (75px x 75px, show on list page)</li>
                                        <li>Enter the <strong>body info</strong> (two sentences, this will show on list page)</li>
                                        <li><strong>Form</strong> - from the drop down <strong>select the webform you previously created</strong></li>
                                        <li>Contest <strong>type</strong> (post/express)</li>
                                        <li><strong>Contact info</strong> (select accordingly)</li>
                                        <li>Revision information (ignore) </li>
                                        <li><strong>Scheduling</strong> options (publish / unpublish --- exactly as used on webform)</li>
                                        <li>Authoring information (ignore)</li>
                                        <li><strong>Publishing</strong> options: (select published ONLY if scheduling options selected)</li>
                                        <li><strong>click Save </strong>(done!)</li>
                                    </ol>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!--WITMER'S STUFF GOES HERE-->
                        </div>
                        <div class="ctl lightblue"></div>
                        <div class="ctr lightblue"></div>
                        <div class="cbl lightblue"></div>
                        <div class="cbr lightblue"></div>
                    </div>
                </div>
            </div>
            <?php if ($closure_region): ?>
                <div id="closure-blocks" class="region region-closure"><?php print $closure_region; ?></div>
            <?php endif; ?>
            <?php print $closure; ?>
            <div class="wp-row wp-margin-bottom wp-pad-top">
                <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/wpost/javascript/module/module.external-footer-1.0.0.js">
                    $("document").ready(setHelp());
                </script>
            </div>
            <!--div class="wp-row wp-margin-bottom">
                <script type="text/javascript">
                    var f = TWP.Module.get('TWP-Footer', {});
                    $("document").ready(setHelp());
                </script>
            </div-->

        </div>

    </body>
</html>
