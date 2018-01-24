<?php get_header(); ?>

<h2><?php echo get_bloginfo('title'); ?></h2>

<div class="listings">

<?php
$terms = get_terms('portfolio_category');
foreach ($terms as $term):
    $term_link = esc_url(get_term_link($term));
    $term_name = $term->name;
    $args = [
        'post_type' => 'portfolio',
        'posts_per_page' => 1,
        'tax_query' => [[
            'taxonomy' => 'portfolio_category',
            'terms' => $term->term_id
        ]]
    ];
    $query = new WP_Query($args);
?>
<?php if ($query->have_posts()): ?>
<?php while ($query->have_posts()): $query->the_post(); ?>
<div class="category-listing-container">
    <a class="category-listing" href="<?php echo $term_link; ?>">
        <h4 class="category-heading"><?php echo $term_name; ?></h4>
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('category-thumb') ?>
        <?php endif; ?>
    </a>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php endforeach; ?>

</div>

<?php get_footer(); ?>
