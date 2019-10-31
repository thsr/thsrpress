<?php
/**
 * template name: Posts by category
 */
get_header();
?>

<div <?php post_class( 'post' ); ?>>
    <div class="content">

    <?php $cats = get_categories(); ?>

        <?php foreach ($cats as $cat) : ?>

            <?php $cat_id = $cat->term_id; ?>

            <h2><?php echo $cat->name ?></h2>

                <?php query_posts("cat=$cat_id&posts_per_page=100"); if ( have_posts() ) : ?>

                    <ul>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <li>
                                <span class="meta">
                                    <time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('M j, Y'); ?></time>
                                </span>
                                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                            </li>

                        <?php endwhile; ?>

                    </ul>

                <?php endif; ?>

        <?php endforeach; ?>

    </div>
</div>

<?php
get_footer();
?>