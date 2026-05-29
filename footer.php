<?php
/**
 * Footer template for Babarida Maintenance Theme
 *
 * @package Babarida_Maintenance
 * @version 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

 $copyright_name  = babarida_get( 'copyright', 'Babarida Dive Center' );
 $refresh_seconds = absint( babarida_get( 'refresh', 60 ) );
?>

        </div><!-- /.content-card -->
    </main>

    <!-- Footer -->
    <footer class="site-footer" role="contentinfo">
        <p class="footer-text">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-domain"><?php echo esc_html( babarida_get( 'site_name', 'babaridadive.com' ) ); ?></a>
            &mdash; <?php echo esc_html( $copyright_name ); ?>. All rights reserved.
        </p>
    </footer>

    <?php wp_footer(); ?>

    <!-- Semua JS di sini saja, tidak ada duplikasi -->
    <script>
    (function() {
        'use strict';

        document.addEventListener('DOMContentLoaded', function() {

            // 1. Animasi progress bar
            var progressFill = document.getElementById('progressFill');
            if (progressFill) {
                var target = parseInt(progressFill.getAttribute('data-target'), 10) || 0;
                target = Math.max(0, Math.min(100, target));
                setTimeout(function() {
                    progressFill.style.width = target + '%';
                }, 800);
            }

            // 2. Auto refresh (hanya jika > 0)
            <?php if ( $refresh_seconds > 0 ) : ?>
            var refreshMs = <?php echo intval( $refresh_seconds ) * 1000; ?>;
            if (refreshMs > 0) {
                setTimeout(function() {
                    window.location.reload(true);
                }, refreshMs);
            }
            <?php endif; ?>

        });

    })();
    </script>

</body>
</html>
