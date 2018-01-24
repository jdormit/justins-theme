<?php get_header(); ?>

<div class="blogIndex">
    <h1><?php echo get_bloginfo('title'); ?></h1>
    <h3 class="caption"><?php echo get_bloginfo('description'); ?></h3>

    <div class="posts">
        <h2>Blog Posts</h2>
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <span class="small postDate caption"><?php the_date(); ?></span>
                    <h3 class="postTitle"><?php the_title(); ?></h3>
                    <div class="postContent"><?php the_content(); ?></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
