<?php // included subnav on all pages // ?>
<ul class="navigation">
    <li>
        <a id="contestLink" href="post/postcontestlist">Contests</a>
    </li>
    <li>
        <a id="eventLink" href="post/posteventslist">Events</a>
    </li>
    <li>
        <a id="faqLink" href="post/frequently-asked-questions">Frequently Asked Questions</a>
    </li>
    <li>
        <a id="faqLink" href="post/contact-us">Contact Us</a>
    </li>
    <?php if ($adminlink):
        print $adminlink;
    endif; ?>
</ul>
