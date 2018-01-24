<footer class="pageFooter">
    <?php if (!empty(get_theme_mod('copyright_holder'))): ?>
    <?php $endDate = (empty(get_theme_mod('copyright_end'))) ? date('Y') : get_theme_mod('copyright_end'); ?>
    <?php $dateSpan = (empty(get_theme_mod('copyright_begin'))) ? $endDate : get_theme_mod('copyright_begin') . " - " . $endDate ?>
    <span>&#169; <?php echo get_theme_mod('copyright_holder'); ?> <?php echo $dateSpan; ?></span>
    <?php endif; ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
