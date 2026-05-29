/**
 * Babarida Maintenance — Main JavaScript
 *
 * Handles: Progress bar animation, auto-refresh
 */

(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {

        // Animate progress bar
        var progressFill = document.getElementById('progressFill');
        if (progressFill) {
            var targetWidth = progressFill.getAttribute('data-target') || '0';
            setTimeout(function() {
                progressFill.style.width = targetWidth + '%';
            }, 800);
        }

    });

})();
