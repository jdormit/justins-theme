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

<?php
if (has_post_thumbnail()):
    // TODO figure out how to make this an actual thumbnail instead of the full-size image
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-thumbnail', true)[0];
else:
    // TODO add fallback image
endif;
?>
<a class="portfolio-listing" href="TODO">
    <h4 class="image-heading"><?php the_title(); ?></h4>
    <img class="portfolio-listing" src="<?php echo esc_url($image) ?>" width="230px" height="230px">
</a>
<?php endwhile; ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
