<?php
/**  
 * Template Name: Subscription
 */


get_header();
?>

<section class="subscription  pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="error-message">
                    <p>An error has occurred, please try again.</p>
                </div>
                <div id="subscribed">
                    <p>A confirmation has been sent to you by email.</p>
                    <p> To complete your subscription, simply click the "Confirm my email" button that you will find in
                        this email.</p>
                    <p> If this email is not in your inbox, check your junk mail box. To receive future emails and
                        benefit from your
                        subscription, make sure to add our address to your safe senders’ list.</p>
                </div>
                <div id="already-subscribe">
                    <p>You already sent a request for this email address in the last hour. Please verify your inbox, or
                        try again later.
                    </p>

                    <p> If this email is not in your inbox, check your junk mail box. To receive future emails and
                        benefit from your
                        subscription, make sure to add our address to your safe senders’ list.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>