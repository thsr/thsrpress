<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

    <head>

        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="profile" href="http://gmpg.org/xfn/11">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/atelier-forest-light.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

        <?php if (function_exists('wp_body_open')) { wp_body_open(); } ?>

        <a class="skip-link screen-reader-text" href="#site-content"><?php _e( 'Skip to the content', 'davis' ); ?></a>
        <a class="skip-link screen-reader-text" href="#menu-menu"><?php _e( 'Skip to the main menu', 'davis' ); ?></a>

        <header class="site-header" role="banner">

            <button type="button" class="toggle-menu" onclick="document.querySelector('body').classList.toggle('show-menu')">&#9776;</button>

            <?php if (has_nav_menu('primary-menu')) : ?>

                <nav role="navigation">
                    <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                </nav>

            <?php endif; ?>

            <?php $site_title_elem = is_front_page() ? 'h1' : 'div'; ?>

            <<?php echo $site_title_elem; ?> class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></<?php echo $site_title_elem; ?>>

            <?php if (get_bloginfo('description')) : ?>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            <?php endif; ?>

        </header><!-- header -->

        <main class="wrapper" id="site-content" role="main">

            <?php if (is_archive() || is_search()) : ?>

                <?php if (is_search()) {
                    global $wp_query;
                    // Translators: %s = The search query
                    $archive_title = sprintf(_x('Search Results: &ldquo;%s&rdquo;', '%s = The search query', 'davis'), get_search_query());
                    $archive_description = sprintf(_nx('%s result was found.', '%s results were found.', $wp_query->found_posts, '%s = The search query', 'davis'), $wp_query->found_posts);
                } else {
                    $archive_title = get_the_archive_title();
                    $archive_description = get_the_archive_description();
                }
                ?>

                <header class="archive-header">

                    <?php if ($archive_title) : ?>

                        <h1 class="archive-title"><?php echo $archive_title; ?></h1>

                    <?php endif; ?>

                    <?php if ($archive_description) : ?>

                        <div class="archive-description"><?php echo $archive_description; ?></div>

                    <?php endif; ?>
                </header>

            <?php endif; ?>