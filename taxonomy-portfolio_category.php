<?php get_header(); ?>

<?php
$term_slug = get_query_var('term');
$term = get_term_by('slug', $term_slug, 'portfolio_category');
?>

<h1 class="category-heading"><?php echo $term->name ?></h1>

<?php
$args = [
    'post_type' => 'portfolio',
    'tax_query' => [[
        'taxonomy' => 'portfolio_category',
        'field' => 'slug',
        'terms' => $term_slug
    ]]
];
$category = new WP_Query($args);
?>

<div class="listings">

<?php if ($category->have_posts()): ?>
<?php while ($category->have_posts()): $category->the_post() ?>

<div class="portfolio-listing-container">
    <a class="portfolio-listing" href="<?php the_permalink(); ?>">
        <h4 class="image-heading"><?php the_title(); ?></h4>
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('listing-thumb') ?>
        <?php endif; ?>
    </a>
</div>

<?php endwhile; ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
