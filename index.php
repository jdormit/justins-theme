<?php get_header(); ?>

<h1><?php echo get_bloginfo('title'); ?></h1>
<h2><?php echo get_bloginfo('description'); ?></h2>

<div class="posts">

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <span class="postDate"><?php the_date(); ?></span>
        <h3 class="postTitle"><?php the_title(); ?></h3>
        <div class="postContent"><?php the_content(); ?></div>
    <?php endwhile; ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
