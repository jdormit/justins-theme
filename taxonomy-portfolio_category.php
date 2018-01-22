<?php
$term = get_query_var('term');
$args = [
    'post_type' => 'portfolio',
    'tax_query' => [[
        'taxonomy' => 'portfolio_category',
        'field' => 'slug',
        'terms' => $term
    ]]
];
$category = new WP_Query($args);
?>
<?php if ($category->have_posts()): ?>
<?php while ($category->have_posts()): $category->the_post() ?>
<p><?php echo the_title(); ?></p>
<?php endwhile; ?>
<?php endif; ?>
