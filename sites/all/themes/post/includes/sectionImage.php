<?php global $formtype;
    if ($formtype == "Contest"):
        if ($contestsimage): ?>
            <div class="wp-pad-bottom"><?php print $contestsimage; ?></div>
            <script type="text/javascript">setTabs('contests');</script>
        <?php endif;
    elseif ($formtype == "Event"):
        if ($eventsimage): ?>
            <div class="wp-pad-bottom"><?php print $eventsimage; ?></div>
            <script type="text/javascript">setTabs('events');</script>
        <?php endif;
    elseif ($formtype == "FAQs"):
        if ($faqsimage): ?>
            <div class="wp-pad-bottom"><?php print $faqsimage; ?></div>
            <script type="text/javascript">setTabs('faqs');</script>
        <?php endif;
    endif;
?>
