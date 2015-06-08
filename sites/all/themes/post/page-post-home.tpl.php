<?php
// $Id: sites/all/themes/post/page-post-home.tpl.php 1.30 2010/10/13 14:42:24EDT Linda M. Williams (WILLIAMSLM) Production  $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
    <head>
        <title><?php print $head_title; ?></title>
        <?php print $scripts; ?>
        <?php include "includes/wpd-global.php"; ?>
        <?php print $head; ?>
        <?php print $styles; ?>
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
                    
                    <?php include "includes/subnav.php"; ?>
                    
               
                	<div class="row1">
                        <div id="slideshow">
                            <?php if ($slideshow): ?>
                                            <?php print $slideshow; ?>
                            <?php endif; ?>
                        </div>
                    
                        <div class="contestList">
                            <div class="contestP">
							<?php if ($posthome): ?>
                                <h3>Win Free Stuff.</h3>
                                <p>We checked—today could be your lucky day.</p>
                                <ul>
                                    <?php print $posthome; ?>
                                </ul>
                                <div class="see-more">
                                <a href="post/postcontestlist">View All Contests<img src="sites/all/themes/post/images/more-icon.gif" /></a>
                                </div>
                            <?php else: ?>
                                <p>There are currently no contests.</p>
                            <?php endif; ?>
                            </div>
                        </div>
                       
                        <div class="eventList">
                            <div class="eventP">
							<?php if ($eventhome): ?>
                                <h3>Come on Down!</h3>
                                <p>You’re invited.  Yes, you!  So join us at a Post event.</p>
                                <ul>
                                    <?php print $eventhome; ?>
                                </ul>
                                   <div class="see-more">
                                   <a href="post/posteventslist">View All Events<img src="sites/all/themes/post/images/more-icon.gif" /></a>
                                   </div>
                             <?php else: ?>
                                There are currently no events.
                            <?php endif; ?>
                            </div>
                        </div>
                  	</div>
                    
                    <div class="row2">
                  		<div class="welcome">
							<?php if ($welcome): ?>
                                <?php print($welcome); ?>
                            <?php endif; ?>
                        </div>
                    	
                        <div class="twitterModule">
                            <?php if ($twitter): ?>
                                <div class="wp-column we-three">
                                    <div id="twitter-area" class="module shade twitterblue_bg">
                                        <?php print $twitter; ?>
                                    </div>
                                    <div class="twitterBottom">&nbsp;</div>
                                    <div class="ctl twitterblue"></div>
                                    <div class="ctr twitterblue"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                    	<div class="social">
                              <h2>Share with your friends</h2>
                              <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=392028247512843";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://postfun.washingtonpost.com/" data-send="false" data-width="450" data-show-faces="false"></div>
							  
                              
                                <?php if ($contactblock || $mailinglist): ?>
                                    <div class="mail">
                                        <?php if ($mailinglist):
                                            print $mailinglist;
                                        endif; ?>
                                    </div>   
                                <?php endif; ?>
                         </div>
 <a href="http://www.thecapitoldeal.com/"><img width="auto" height="auto" alt="Capital Deal" src="http://postfun.washingtonpost.com/sites/default/files/cap_deal.png" /></a>
<br>
  <a href="http://postpoints.washingtonpost.com/"><img width="auto" height="auto" alt="Capital Deal" src="http://postfun.washingtonpost.com/sites/default/files/points.png" /></a>
<br>
   <a href="http://dcscout.washingtonpost.com/"><img width="auto" height="auto" alt="Capital Deal" src="http://postfun.washingtonpost.com/sites/default/files/scout.png" /></a>
                       

                	  </div>
            
            
            <?php if ($twitter): ?>
                <?php print $twitterscripts; ?>
            <?php endif; ?>

            <div class="wp-row wp-margin-bottom wp-pad-top">
               <div id="footer-v3" class="external"></div>
            </div>

        </div>
        
        <script type="text/javascript">
            <!--
            var wp_page_name = "wp - postfun - Homepage";
            var wp_channel = "site services";
            var wp_subsection = "site services - postfun";
            var wp_hierarchy = "site services|postfun|Homepage";
            var wp_application = "application - postfun - Homepage";
            -->
        </script>
        <script type="text/javascript" src="http://media.washingtonpost.com/wp-srv/javascript/placeSiteMetrix.js"></script>
        <script type="text/javascript">placeSiteMetrix();</script>

    </body>
</html>
