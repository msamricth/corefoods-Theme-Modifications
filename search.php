<?php
/*
Template Name: search results Template
*/
?>
<!--container!--></div>

<?php get_template_part('templates/page', 'head'); ?>
<?php $pageTitle = __('Search results', 'ct_theme'); ?>
<?php $my_search = new WP_Advanced_Search('my-form'); ?>
<?php $breadcrumbs = ct_show_index_post_breadcrumbs('post') ? 'yes' : 'no'; ?>

</div>


<section class="content-area <?php echo (ct_get_option("posts_show_index_as", 1) == 'blog_list') ? 'bg1' : 'bg2' ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php 
                $temp = $wp_query;
                $wp_query = $my_search->query();
                ?>
                    <h4 class="results-count">
                    Displaying <?php echo $my_search->results_range(); ?> 
                    of <?php echo $wp_query->found_posts; ?> results
                    </h4> 
                <?php

                if ( have_posts() ) : ?>
                <div id="blog-list" class="clearfix row">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php $post_type = get_post_type_object($post->post_type); ?>
                    <article  id="post-<?php the_ID(); ?>" class="col-md-12 item-bigger format-standard">
                        <div class="innerMargin" style="background:white;">
                            <div class="entry-meta">
                                <span class="entry-date"><?php the_time('F j, Y'); ?></span>
                            </div>
                            <h4 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <span class="cat-links">
                                <strong>Post Type:</strong> <?php echo $post_type->labels->singular_name; ?> &nbsp;&nbsp;
                            </span>
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <div class="clearfix"></div>
                    <?php endwhile; ?>
                </div>

                    <?php else : ?>
                    <article>
                        <h2 class="no-result-found">
                            <?php _e('No search results found', 'ct_theme'); ?>
                        </h2>
                    </article>
                   <?php endif; 

                    $my_search->pagination();

                    $wp_query = $temp;
                    wp_reset_query();
                    ?>
                </div>
            <!--col-md-9 end!-->

            <?php if (ct_use_blog_index_sidebar()): ?>
            <div class="col-md-3">
                <?php get_template_part('templates/sidebar') ?>
            </div>
            <?php endif ?>
        </div>
    <!--row_end!-->
    </div>
</section>
