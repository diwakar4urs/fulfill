<?php
/**
 * The template for displaying search results pages.
 *
 * @package Ecomatic
 */
$section_width	 = 'col-sm-8';
get_header(); ?>
<div class="container">
    <div class="row">
        <div id="tg-twocolumns-upper" class="tg-twocolumns tg-haslayout archive-none tg-main-section">
			<?php if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : ?>
                <div class="row">
                    <div class="<?php echo esc_attr( $section_width );?> page-section">
                       <div id="tg-content" class="tg-content tg-haslayout tg-latest-technology">
                           <div class="search-found">
                                <h2><?php printf( esc_attr( 'Search Results for: %s', 'soccer-acumen' ), get_search_query() ); ?></h2>
                                <p><?php  esc_html_e('If you are not happy with the results below please search another keyword.','soccer-acumen');?></p>
                                <form class="form-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <div class="search-bar row">
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="s" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>" placeholder="<?php esc_attr_e('Type any keyword','soccer-acumen');?>"></div> 
                                        <div class="col-sm-6 col-xs-12">    
                                        <button type="submit" class="tg-btn"><em><?php esc_html_e('search', 'soccer-acumen'); ?></em></button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                                get_template_part( 'template-parts/content', 'search' );
                            ?>
                        </div>
                    </div>
                   <div class="col-sm-4 aside sidebar-section" id="sidebar">
                    <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout">
                        <?php get_sidebar();?>
                    </aside>
                   </div>
                </div>
            <?php else: ?>
               <div class="row">
                   <div class="<?php echo esc_attr( $section_width );?> page-section">
                        <div id="tg-content" class="tg-content tg-haslayout tg-latest-technology">
                        	<div class="search-none">
                            <h2><?php  esc_html_e('Nothing Found','soccer-acumen');?></h2>
                            <p><?php  esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.','soccer-acumen');?></p>
                            <div class="tg-suggestions">
                                <h4><?php  esc_html_e('Suggestions: ','soccer-acumen');?> </h4>
                                <ul>
                                    <li> <?php  esc_html_e('Make sure all words are spelled correctly ','soccer-acumen');?> </li>
                                    <li> <?php  esc_html_e('Try more general keywords, especially if you are attempting a name ','soccer-acumen');?> </li>
                                </ul>
                            </div>
                            <form class="form-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="search-bar row">
                                    <div class="col-sm-6 col-xs-6 col-xs-offset-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="s" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>" placeholder="<?php esc_attr_e('Type any keyword','soccer-acumen');?>">
                                        </div>
                                        <div class="search-button">
                                            <button type="submit" class="tg-btn"><em><?php esc_html_e('search', 'soccer-acumen'); ?></em></button>
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </div>
                       	</div>
                    </div>
                   <div class="col-sm-4 aside sidebar-section" id="sidebar">
                    <aside id="tg-sidebar-upper" class="tg-sidebar tg-haslayout">
                        <?php get_sidebar();?>
                    </aside>
                   </div>
               </div>
            <?php endif; ?>
		</div>
    </div>
</div>
<?php get_footer(); ?>
