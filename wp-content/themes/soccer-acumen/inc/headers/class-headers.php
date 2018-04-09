<?php
/**
 * @Class headers
 *
 */
if (!class_exists('soccer_acumen_headers')) {

    class soccer_acumen_headers {

        function __construct() {
            add_action('soccer_acumen_init_headers', array(&$this, 'soccer_acumen_init_headers'));
            add_action('soccer_acumen_prepare_headers', array(&$this, 'soccer_acumen_prepare_header'));
        }

        /**
         * @Init headers
         * @return {}
         */
        public function soccer_acumen_init_headers() {
            if (function_exists('fw_get_db_settings_option')) {
                $maintenance = fw_get_db_settings_option('maintenance');
            } else {
                $maintenance = '';
            }

            $post_name = soccer_acumen_get_post_name();
            if (( isset($maintenance) && $maintenance == 'enable' && !is_user_logged_in()
                    ) ||
                    $post_name === "coming-soon"
            ) {
                $loaderDisbale = 'style=display:none;';
                get_template_part('template-parts/template', 'comingsoon'); //Coming Soon Template
            }
            ?>
            <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
                <!--************************************
                                Mobile Menu Start
                *************************************-->
                <div id="tg-navigationm-mobile" class="tg-navigationm-mobile tg-navigation collapse navbar-collapse">
                    <span id="tg-close" class="tg-close fa fa-close"></span>
                    <div class="tg-colhalf">
                        <?php $this->soccer_acumen_prepare_navigation('left-menu', $id = '', $class = '', $depth = '0'); ?>
                    </div>
                    <div class="tg-colhalf">
                        <?php $this->soccer_acumen_prepare_navigation('right-menu', $id = '', $class = '', $depth = '0'); ?>
                    </div>
                </div>
                <!--************************************
                                Mobile Menu End
                *************************************-->
                <header id="tg-header" class="tg-header tg-haslayout">
                    <div class="container">
                        <div class="col-md-12 col-sm-12 col-xs-121">
                            <div class="row">
                                <?php do_action('soccer_acumen_prepare_headers'); ?>
                            </div>
                        </div>
                    </div>
                </header>
                <?php do_action('soccer_acumen_prepare_subheaders'); ?>
                <main id="tg-main" class="tg-main tg-haslayout">
                    <?php
                }

                /**
                 * @Prepare headers
                 * @return {}
                 */
                public function soccer_acumen_prepare_header() {
                    global $post, $woocommerce;
                    if (function_exists('fw_get_db_settings_option')) {
                        $header_type = fw_get_db_settings_option('header_type');
                    } else {
                        $header_type = '';
                    }

                    $post_name = soccer_acumen_get_post_name();
                    if (isset($post_name) && $post_name === 'home-2') {
                        $header_type['gadget'] = 'header_v2';
                    }

                    ob_start();
                    if (isset($header_type['gadget']) && $header_type['gadget'] === 'header_v1') {
                        //Top strip
                        $is_enable = !empty($header_type['header_v1']['top_bar']['gadget']) ? $header_type['header_v1']['top_bar']['gadget'] : '';
                        if (isset($is_enable) && $is_enable == 'enable') {
                            $settings = !empty($header_type['header_v1']['top_bar']['enable']) ? $header_type['header_v1']['top_bar']['enable'] : '';
                            $this->soccer_acumen_prepare_top_strip($settings);
                        }

                        //Menu
                        $this->soccer_acumen_process_header_v1($header_type);
                    } else if (isset($header_type['gadget']) && $header_type['gadget'] === 'header_v2') {
                        $this->soccer_acumen_process_header_v2($header_type);
                    } else {
                        $this->soccer_acumen_process_header_default($header_type);
                    }
					
                    echo ob_get_clean();
                }

                /**
                 * @Prepare header V1
                 * @return {}
                 */
                public function soccer_acumen_process_header_v1($header_type = array()) {
                    if (function_exists('fw_get_db_settings_option')) {
                        $main_logo = fw_get_db_settings_option('main_logo');
                    } else {
                        $main_logo = '';
                    }

                    if (!empty($main_logo['url'])) {
                        $logo = $main_logo['url'];
                    } else {
                        $logo = get_template_directory_uri() . '/images/logo.png';
                    }
                    ?>
                    <nav id="tg-nav" class="tg-nav brand-center">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigationm-mobile"> 
                                <i class="fa fa-bars"></i>
                            </button>
                            <?php $this->soccer_acumen_prepare_logo($logo); ?>
                        </div>
                        <div id="tg-navigation" class="tg-navigation">
                            <div class="tg-colhalf">
                                <?php $this->soccer_acumen_prepare_navigation('left-menu', $id = '', $class = '', $depth = '0'); ?>
                            </div>
                            <div class="tg-colhalf">
                                <?php $this->soccer_acumen_prepare_navigation('right-menu', $id = '', $class = '', $depth = '0'); ?>
                            </div>
                        </div>
                    </nav>
                    <?php
                }

                /**
                 * @Prepare header V2
                 * @return{}
                 */
                public function soccer_acumen_process_header_v2($header_type = array()) {
                    global $woocommerce;
                    $header_data_attr = '';
                    $header_data_div = '';

                    if (function_exists('fw_get_db_settings_option')) {
                        $main_logo = fw_get_db_settings_option('main_logo');
                    } else {
                        $main_logo = '';
                    }

                    //prepare logo
                    if (!empty($main_logo['url'])) {
                        $logo = $main_logo['url'];
                    } else {
                        $logo = get_template_directory_uri() . '/images/logo.png';
                    }

                    $mini_cart = !empty($header_type['header_v2']['mini_cart']) ? $header_type['header_v2']['mini_cart'] : '';
                    $social_icons = !empty($header_type['header_v2']['social_icons']) ? $header_type['header_v2']['social_icons'] : '';
                    $social_icon_list = !empty($header_type['header_v2']['social_icon_list']) ? $header_type['header_v2']['social_icon_list'] : '';
                    ?>
                    <div class="tg-sidenav">
                        <strong class="tg-logo"><?php $this->soccer_acumen_prepare_logo($logo); ?></strong>
                        <div id="tg-navscrollbar" class="tg-navscrollbar">
                            <nav id="tg-nav" class="tg-nav">
                                <div id="tg-navigation" class="tg-navigation">
                                    <?php $this->soccer_acumen_prepare_navigation('vertical-menu', $id = '', $class = '', $depth = '0'); ?>
                                </div>
                            </nav>
                        </div>
                        <?php if (isset($social_icons) && $social_icons === 'enable') { ?>
                            <ul class="tg-socialiconslarge">
                                <?php
                                foreach ($social_icon_list as $icons) {
                                    if (!empty($icons['social_icons_list'])) {
                                        if (!empty($icons['social_url'])) {
                                            $url = $icons['social_url'];
                                        }
                                        $social_color = !empty($icons['social_color']) ? $icons['social_color'] : '#ffcc33';
                                        ?>
                                        <li class="tg-<?php echo esc_attr(strtolower($icons['social_name'])); ?>">
                                            <a href="<?php echo esc_url($url); ?>" style="background:<?php echo esc_attr($social_color); ?>">
                                                <i class="<?php echo esc_attr($icons['social_icons_list']) ?>"></i>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <button id="tg-btnnav" class="tg-btnnav"><span></span><?php echo force_balance_tags($header_data_div); ?></button>
                    <?php
                }

                /**
                 * @Prepare header V1
                 * @return {}
                 */
                public function soccer_acumen_process_header_default($header_type = array()) {
                    if (function_exists('fw_get_db_settings_option')) {
                        $main_logo = fw_get_db_settings_option('main_logo');
                    } else {
                        $main_logo = '';
                    }

                    if (!empty($main_logo['url'])) {
                        $logo = $main_logo['url'];
                    } else {
                        $logo = get_template_directory_uri() . '/images/logo.png';
                    }
                    ?>
                    <div class="col-sm-12 col-xs-12">
                        <?php $this->soccer_acumen_prepare_logo($logo); ?>
                        <nav id="tg-nav" class="tg-nav default-header">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigationm-mobile"> <i class="fa fa-bars"></i> </button>
                            </div>
                            <div id="tg-navigation" class="tg-navigation tg-fullnav">
                                <?php $this->soccer_acumen_prepare_navigation('main-menu', $id = '', $class = '', $depth = '0'); ?>
                            </div>
                        </nav>
                    </div>
                    <?php
                }

                /**
                 * @Prepare top strip
                 * @return {}
                 */
                public function soccer_acumen_prepare_top_strip($settings = array()) {
                    $social_icons = !empty($settings['social_icons']) ? $settings['social_icons'] : '';
                    $enable_login = !empty($settings['enable_login']) ? $settings['enable_login'] : '';
                    $registration = !empty($settings['registration']) ? $settings['registration'] : '';
                    $shoping_cart = !empty($settings['shoping_cart']) ? $settings['shoping_cart'] : '';
                    $search_bar = !empty($settings['search_bar']) ? $settings['search_bar'] : '';
                    $social_icon_list = !empty($settings['social_icon_list']) ? $settings['social_icon_list'] : '';
                    ?>

                    <div class="tg-topbar tg-haslayout">
                        <nav id="tg-topaddnav" class="tg-topaddnav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-addnavigationm-mobile">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                            <div id="tg-addnavigationm-mobile" class="tg-addnavigationm-mobile collapse navbar-collapse">
                                <div class="tg-colhalf pull-right">
                                    <?php
                                    if ($enable_login === 'enable' ||
                                            $registration === 'enable' ||
                                            $shoping_cart === 'enable' ||
                                            $search_bar === 'enable'
                                    ) {
                                        ?>
                                        <nav class="tg-addnav">
                                            <ul>
                                                <?php if (is_user_logged_in()) { ?>
                                                    <li><a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>"><i class="fa fa-sign-out"></i></a></li>
                                                <?php } else if ($enable_login === 'enable') { ?>
                                                    <li><a href="javascript();" data-toggle="modal" data-target="#tg-login"><?php esc_html_e('login', 'soccer-acumen') ?></a></li>
                                                <?php } ?>
                                                <?php if ($registration === 'enable' && !is_user_logged_in()) { ?>
                                                    <li><a href="javascript();" data-toggle="modal" data-target="#tg-register"><?php esc_html_e('Register', 'soccer-acumen') ?></a></li>
                                                <?php } ?>
                                                <li>
                                                    <?php if ($shoping_cart === 'enable') { ?>
                                                        <div class="tg-cart">

                                                            <a href="javascript:void(0)" class="dropdown-toggle" id="tg-cartdropdown" data-toggle="dropdown">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                            <div class="dropdown-menu tg-mini-cart">
                                                                <div class="widget_shopping_cart_content"></div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </li>
                                                <?php if ($search_bar === 'enable') { ?>
                                                    <li><?php $this->soccer_acumen_prepare_search(); ?></li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
                                    <?php }//endif ?>
                                </div>
                                <?php
                                if (isset($social_icons) && $social_icons === 'enable' && !empty($social_icon_list)
                                ) {
                                    ?>
                                    <div class="tg-colhalf">
                                        <ul class="tg-socialicons">
                                            <?php
                                            foreach ($social_icon_list as $icons) {

                                                $url = !empty($icons['social_url']) ? $icons['social_url'] : '#';

                                                if (!empty($icons['social_icons_list'])) {
                                                    ?>        
                                                    <li>
                                                        <a href="<?php echo esc_url($url); ?>">
                                                            <i class="<?php echo esc_attr($icons['social_icons_list']); ?>"></i>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                <?php }//endif ?>
                            </div>
                        </nav>
                    </div>
                    <?php
                }

                /**
                 * @Search Form
                 * @return {}
                 */
                public function soccer_acumen_prepare_search() {
                    ?>

                    <a id="tg-btn-search" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    <div class="tg-searchbox">
                        <a id="tg-close-search" class="tg-close-search" href="javascript:void(0)"><span class="fa fa-close"></span></a>
                        <div class="tg-searcharea">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <form action="<?php echo esc_url(home_url('/')); ?>" role="search" method="get" id="searchform" class="tg-form-search">
                                            <fieldset>
                                                <input type="search" name="s" id="s" class="form-control" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e('keyword', 'soccer-acumen') ?>">
                                            </fieldset>
                                        </form>
                                        <p><?php esc_html_e('Start typing and press Enter to search', 'soccer-acumen'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }

                /**
                 * @Main Logo
                 * @return {}
                 */
                public function soccer_acumen_prepare_logo($logo_url = '', $image_classes = '', $link_classes = '') {
                    ob_start();
                    ?>
                    <strong class="tg-logo">
                        <a class="<?php echo esc_attr($link_classes); ?>" href="<?php echo esc_url(home_url('/')); ?>"><img class="<?php echo esc_attr($image_classes); ?>" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>"></a>
                    </strong><?php
                    echo ob_get_clean();
                }

                /**
                 * @Main Navigation
                 * @return {}
                 */
                public static function soccer_acumen_prepare_navigation($location = '', $id = 'menus', $class = '', $depth = '0') {

                    if (has_nav_menu($location)) {
                        $defaults = array(
                            'theme_location' => "$location",
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => "$class",
                            'menu_id' => "$id",
                            'echo' => false,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => "$depth",
                        );

                        echo do_shortcode(wp_nav_menu($defaults));
                    } else {
                        $defaults = array(
                            'theme_location' => "",
                            'menu' => '',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => "$class",
                            'menu_id' => "$id",
                            'echo' => false,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => "$depth",
                            'walker' => '');
                        echo do_shortcode(wp_nav_menu($defaults));
                    }
                }

            }

            new soccer_acumen_headers();
        }