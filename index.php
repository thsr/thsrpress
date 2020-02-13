<?php
/**
 * The main template file
 */
get_header();
?>

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <div <?php post_class('post'); ?>>

                        <?php if (!get_post_format() == 'aside') : ?>

                            <?php $post_title_elem = is_single() ? 'h1' : 'h2'; ?>
                            <<?php echo $post_title_elem ?> class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $post_title_elem ?>>

                        <?php endif; ?>

                        <?php $post_type = get_post_type(); ?>

                        <?php if ( $post_type == 'post' ) : ?>

                            <div class="entry-subtitle">

                                <a href="<?php the_permalink(); ?>"><time datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time(get_option('date_format')); ?></time></a>
                                <span class="sep"></span>
                                <?php the_category( ', ' ); ?>

                            </div>

                        <?php endif; ?>

                        <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>

                            <a href="<?php the_permalink(); ?>" class="featured-image">
                                <?php the_post_thumbnail('post-image'); ?>
                            </a>

                        <?php endif; ?>

                        <div class="content">

                            <?php the_content(); ?>

                        </div><!-- .content -->

                        <?php if (is_singular()) wp_link_pages();

                        $post_type = get_post_type();

                        if ($post_type == 'post') : ?>

                            <div class="meta">

                                <?php if (is_singular('post')) : ?>

                                    <p><?php the_tags(' #', ' #', ' '); ?></p>

                                <?php endif; ?>

                            </div><!-- .meta -->

                        <?php endif; ?>

                        <?php if (($post_type == 'post' || comments_open() || get_comments_number()) && !post_password_required()) {
                            comments_template();
                        } ?>

                    </div><!-- .post -->

                <?php endwhile; ?>

            <?php else : ?>

                <div class="post">

                    <p><?php _e('Sorry, the page you requested cannot be found.', 'davis'); ?></p>

                </div><!-- .post -->

            <?php endif; ?>

            <?php if (!is_singular() && (get_previous_posts_link() || get_next_posts_link())) : ?>

                <div class="pagination">

                    <?php previous_posts_link('&larr; ' . __('Newer posts', 'davis')); ?>
                    <?php next_posts_link( __('Older posts', 'davis') . ' &rarr;'); ?>

                </div><!-- .pagination -->

            <?php endif; ?>

<?php
get_footer();
?>