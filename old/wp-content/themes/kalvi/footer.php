    <?php
        /**
         * kalvi_hook_content_after hook.
         * 
         */
        do_action( 'kalvi_hook_content_after' );
    ?>

        <!-- **Footer** -->
        <footer id="footer">
            <div class="container">
            <?php
                /**
                 * kalvi_footer hook.
                 * 
                 * @hooked kalvi_vc_footer_template - 10
                 *
                 */
                do_action( 'kalvi_footer' );
            ?>
            </div>
        </footer><!-- **Footer - End** -->

    </div><!-- **Inner Wrapper - End** -->
        
</div><!-- **Wrapper - End** -->
<?php
    
    do_action( 'kalvi_hook_bottom' );

    wp_footer();
?>
</body>
</html>