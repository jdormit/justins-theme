<?php get_header(); ?>

<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>

<?php
// TODO this will fall apart if a post has more than one category
// the proper solution would be to put the category in the slug for the post,
// so that we know which category the post was accessed from
$term = get_the_terms(get_the_ID(), 'portfolio_category')[0];
$items = get_posts([
    'post_type' => 'portfolio',
    'tax_query' => [[
        'taxonomy' => 'portfolio_category',
        'terms' => $term->term_id
    ]]
]);
$item_IDs = array_map(function($item) { return $item->ID; }, $items);
$current = array_search(get_the_ID(), $item_IDs);
$has_next = $current < count($item_IDs) - 1;
if ($has_next) {
    $next = $item_IDs[$current + 1];
}
$has_previous = $current > 0;
if ($has_previous) {
    $previous = $item_IDs[$current - 1];
}
?>

<?php if ($has_previous): ?>
<a href="<?php echo get_permalink($previous); ?>">Previous</a>
<?php endif; ?>

<h1 class="portfolioTitle"><?php the_title(); ?></h1>
<div class="portfolioContent">
    <?php the_content(); ?>
</div>

<?php if ($has_next): ?>
<a href="<?php echo get_permalink($next); ?>">Next</a>
<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
