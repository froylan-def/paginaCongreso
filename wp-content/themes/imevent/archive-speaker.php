<?php get_header(); ?>        
        
        <?php
            $speaker_archive_show_sidebar = $theme_option['speaker_archive_show_sidebar'];
            
            $main_col = ( $speaker_archive_show_sidebar == 'yes' ) ? 'col-sm-8 col-md-9' : 'col-md-12';
            $sidebar_col = 'col-sm-4 col-md-3';

            $speaker_archive_orderby = $theme_option['speaker_archive_orderby'];
            $speaker_archive_order = $theme_option['speaker_archive_order'];
        ?>

        <!-- Page Blog -->
        <section class="page-section with-sidebar sidebar-right">
            <div class="container">
                <div class="row">

                    <!-- Content -->
                    <section id="content" class="content <?php echo esc_attr($main_col); ?>">

                    	<?php 
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                            $args_basic = array(
                                'paged' => $paged,
                                'post_type' => 'speaker',
                                'post_status' => 'publish',
                                'order'     => $speaker_archive_order,
                            );
                            

                            switch ($speaker_archive_orderby) {
                                case 'cus_order':
                                    $args_orderby = array(
                                        'meta_key'   => '_cmb_speaker_order_by',
                                        'orderby'  => 'meta_value_num'
                                    );
                                    break;

                                 case 'name':
                                    $args_orderby = array(
                                        'orderby'  => 'name'
                                    );
                                    break; 

                                default:
                                    $args_orderby = array(
                                        'orderby'  => 'ID'
                                    );
                                    break;
                            }

                            $args = array_merge_recursive( $args_basic, $args_orderby );
                            $speakers = new WP_Query($args);
                            $i = 0;
			 			?>
			 			<?php  if($speakers->have_posts()) :
                                while($speakers->have_posts()) : $speakers->the_post(); ?>

                                    <div class="col-md-6">
                                        <div class="container-fluid">
                                            <div class="row">

                                                <article class="post-wrap">
                                                    <div class="archive-speakers row">

                                                        <div class="col-md-3">
                                                            <?php $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
                                                            <?php if($thumbnail_url){ ?>
                                                                <img  src="<?php  echo esc_url($thumbnail_url); ?>" alt="" class="img-responsive">
                                                            <?php } ?>    
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h3 class="title"><a href="<?php echo get_the_permalink(); ?>"> <?php echo get_the_title(); ?></a></h3>
                                                            <div class="intro"><?php  the_excerpt();  ?></div>   
                                                        </div>
                                                        

                                                    </div>                
                                                </article>

                                            </div>
                                        </div>
                                    </div>

                                    <?php $i++;
                                        if( $i == 2 ){ ?>
                                            <div class="clearfix"></div>
                                        <?php $i = 0;}
                                    ?>

                                <?php endwhile; wp_reset_postdata();?>
                        <?php else: ?>
                            <h1><?php _e('Nothing Found Here!', 'imevent'); ?></h1>
                        <?php endif; ?>

                        <!-- Pagination -->
                        <div class="pagination-wrapper" style="clear:both;">                           

                            <ul class="pagination">
                                <li>
                                    <?php

                                        $big = 999999999; // need an unlikely integer
                                        echo paginate_links(array(
                                                     'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                                     'format' => '?paged=%#%',
                                                     'current' => max(1, get_query_var('paged') ),
                                                     'total' => $speakers->max_num_pages,
                                                     'next_text'    => __('&raquo;', 'imevent'),
                                                     'prev_text'    => __('&laquo;', 'imevent'),
                                                 ) );
                                    ?>
                                </li>
                            </ul>

                        </div>
                        <!-- /Pagination -->

                    </section>
                    <!-- Content -->



                    <?php if( $speaker_archive_show_sidebar == 'yes' ){ ?>

                        <hr class="page-divider transparent visible-xs"/>

                        <aside id="sidebar" class="sidebar <?php echo esc_attr($sidebar_col); ?>">
                            <?php dynamic_sidebar('sidebar-right' ); ?>
                        </aside>

                    <?php } ?>
                



                    

                </div>
            </div>
        </section>
        <!-- /Page Blog -->

    
    
<?php get_footer(); ?>