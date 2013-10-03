<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if (is_front_page()) : ?>
<?php else: ?>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

<?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> .<?php post_class(); ?> -->
