<?php
/**
 * The main template file
 *
 * @package Tattva_Dental
 */

get_header();
?>

<div class="page-header">
    <div class="container">
        <h1><?php 
            if (is_home() && !is_front_page()) {
                single_post_title();
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                printf(__('Search Results for: %s', 'tattva-dental'), get_search_query());
            } else {
                _e('Latest Posts', 'tattva-dental');
            }
        ?></h1>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('service-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail" style="margin-bottom: 1rem; border-radius: 8px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('service-thumb'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <div class="post-meta" style="font-size: 0.875rem; color: var(--color-gray); margin-bottom: 1rem;">
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                        
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="service-link">
                            Read More →
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination" style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="no-posts" style="text-align: center; padding: 4rem 0;">
                <h2><?php _e('No posts found', 'tattva-dental'); ?></h2>
                <p><?php _e('Sorry, there are no posts to display.', 'tattva-dental'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

