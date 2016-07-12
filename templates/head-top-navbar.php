<?php if (!is_page_template('page-content-only.php')): ?>
    <?php

    if ((ct_get_option('navbar_type', 'standard') == 'sticky')) {
        $custom = get_post_custom(get_the_ID());
        if (!isset($custom["navbar_transparent"][0])) {
            $custom["navbar_transparent"][0] = 'no';
        }

        if ($custom["navbar_transparent"][0] == 'yes') {
            $navbarType = 'navbar-fixed-top swapLogo navbar-transparent';
        } else {
            $navbarType = 'navbar-fixed-top';
        }
    } else {
        //draw standard
        $navbarType = 'navbar-static-top';
    } ?>
    <nav class="navbar navbar-default <?php echo $navbarType; ?>" role="navigation">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <?php

            if ((ct_get_option('navbar_type', 'standard') == 'sticky')) {
                $custom = get_post_custom(get_the_ID());
                if (!isset($custom["navbar_transparent"][0])) {
                    $custom["navbar_transparent"][0] = 'no';
                }

                if ($custom["navbar_transparent"][0] == 'yes') {
                    if (ct_get_option('logo_sticky_transparent','') != '') {
                        echo '<a data-logo="' . esc_url(ct_get_option('logo_sticky')) . '" class="navbar-brand" href="' . home_url() . '"><img src="' . esc_url(ct_get_option('logo_sticky_transparent')
                            ) . '" alt=" "></a>';
                    }


                } else {
                    if (ct_get_option('logo_sticky','') != '') {
                        echo '<a data-logo="' . esc_url(ct_get_option('logo_sticky')) . '" class="navbar-brand" href="' . home_url() . '"><img src="' . esc_url(ct_get_option('logo_sticky')) . '" alt=" "></a>';
                    }
                }

            } else {

                if (ct_get_option('logo_standard','')!=''){
                    echo '<a class="navbar-brand" href="' . home_url() . '"><img src="' . esc_url(ct_get_option('logo_standard')) . '" alt=" "></a>';
                }

            }

            ?>
            <?php   if (ct_is_woocommerce_active()) {
                global $woocommerce;
                $basketTotal = $woocommerce->cart->get_cart_total();
                $basketCounter = sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'ct_theme'), $woocommerce->cart->cart_contents_count);
            } ?>

            <?php if (ct_is_woocommerce_active()) { ?>
                <?php if (is_user_logged_in()) { ?>
                    <span class="visible-xs pull-left">
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                    title="<?php _e('My Account', 'ct_theme'); ?>"><?php _e('My Account', 'ct_theme'); ?>
                    </a>
                    </span>
                <?php } else { ?>
                    <span class="visible-xs pull-left">
                    <a href="#" data-toggle="modal" data-target="#loginform" title="<?php _e('Login / Register', 'ct_theme'); ?>"><?php _e('Login / Signup', 'ct_theme'); ?>
                    </a>
                    </span>
                <?php } ?>
                <span class="visible-xs pull-left">&nbsp; | &nbsp;
                <a href="#" title="<?php _e('Cart', 'ct_theme'); ?>" class="getcart"><i class="fa fa-shopping-cart"></i></a>
                </span>
            <?php }?>
        </div>
        <?php global $wp_query;
        $arrgs = $wp_query->query_vars;
        ?>


        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="navbar-collapse collapse">
        <?php get_template_part('templates/shoptopnav'); ?>
            <?php
                if (ct_is_location_contains_menu('primary_navigation')) {
                    ct_wp_nav_menu(
                        array(
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-search"><a href="#" id="showHeaderSearch" class="hidden-xs"><i class="fa fa-search"></i></a></li></ul>',
                            'theme_location' => 'primary_navigation',
                            'menu_class' => 'nav navbar-nav navbar-right',
                            'menu_id' => 'nav'
                        )
                    );
                }

            ?>

        </div>
        <!-- /.navbar-collapse -->

    
    <?php get_template_part('templates/shoptopmodal'); ?>
    </div>
    <!-- / container -->

    </nav>
    <?php if ((ct_get_option('navbar_search', 1))): ?>

        <div class="hide-xs pull-right header-search" style="display:none;">
                <div class="container">

<?php $my_search = new WP_Advanced_Search('my-form'); ?>
                    <?php $my_search->the_form(); ?>

                </div>
                <div class="clearfix"></div>
        </div>
    <?php endif; ?>
    <?php endif; ?>
