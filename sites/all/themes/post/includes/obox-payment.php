<style type="text/css">
    .obox .container {
        width: 650px;
    }
    .obox-overlay {
        top:0px;
    }
</style>
<script type="text/javascript">
    TWP.Module.Webform = function(args) {

        var self = this;

        if (args.max) {
            this.max = args.max;
        }

        // Overlay Trigger
        $("button[href='#payment-services']").obox({
            windowId: 'obox-payment-services',
            windowTitle: 'Washington Post Payment Services',
            draggable: false,
            showTitleBar: true,
            bindTo: self,
            backgroundOverlayOpacity:0.1,
            beforeRevealCallback : function(trigr, windr) {
                self.setupPayment(trigr, windr);
            }
        });
    };

    TWP.Module.Webform.prototype = {
        setupPayment : function() {

            // overwrite hard-coded relative urls for obox close button
            $("div.close img").attr("src", "http://www.washingtonpost.com/wpost/images/icons/icon-close.png");
            // preload images
            var preload = [ new Image(), new Image(), new Image() ];
            preload[0].src = "http://www.washingtonpost.com/wpost/images/icons/icon-close.png";
            preload[1].src = "http://www.washingtonpost.com/wpost/images/icons/icon-close-over.png";

            $("div.titleBar div.window-actions a[rel='close'] img", this.windr).hover(function() {
                // over
                $(this).attr("src", preload[1].src);
            }, function() {
                // out
                $(this).attr("src", preload[0].src);
            });
        }
    };

    TWP.register('Module.Webform', TWP.Module.Webform);

</script>


<div id="payment-services" class="obox-data">
    <?php
        global $sub;
        global $dom;
    ?>
    <iframe frameborder="0" src="<?php print PAYMENTTECHURL ?>?appid=1&sid=<?php print $sub; ?>&dom=<?php print $dom; ?>" width="100%" height="500"></iframe>
</div>

<script type="text/javascript">
    try {
        var webform_args = {};
        var webform = TWP.Module.get('Module.Webform', webform_args);
    } catch (e) {
        console.log("Error setting up Webform", e);
    }
</script>
