<?php get_header(); ?>

<?php
$terms = get_terms('portfolio_category');
foreach ($terms as $term):
    $term_link = esc_url(get_term_link($term));
    $term_name = $term->name;
?>
<a href="<?php echo $term_link; ?>">
    <?php echo $term_name ?>
</a>
<?php endforeach; ?>

<?php get_footer(); ?>
