<?php
/**
 * Footer template for Babarida Maintenance Theme
 *
 * @package Babarida_Maintenance
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

 $copyright_name = babarida_get( 'copyright', 'Babarida Dive Center' );
 $refresh_seconds = absint( babarida_get( 'refresh', 60 ) );
?>

        </div><!-- /.content-card -->
    </main>

    <!-- Footer -->
    <footer class="site-footer" role="contentinfo">
        <p class="footer-text">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-domain"><?php echo esc_html( babarida_get( 'site_name', 'babaridadive.com' ) ); ?></a>
            — <?php echo esc_html( $copyright_name ); ?>. All rights reserved.
        </p>
    </footer>

    <?php wp_footer(); ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {

        // Animate progress bar
        var progressFill = document.getElementById('progressFill');
        if (progressFill) {
            var targetWidth = progressFill.getAttribute('data-target');
            setTimeout(function() {
                progressFill.style.width = targetWidth + '%';
            }, 800);
        }

        <?php if ( $refresh_seconds > 0 ) : ?>
        // Auto refresh
        setTimeout(function() {
            location.reload();
        }, <?php echo esc_js( $refresh_seconds * 1000 ); ?>);
        <?php endif; ?>

    });
    </script>

</body>
</html>
