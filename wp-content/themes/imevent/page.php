<?php
/** The main template file **/ 

get_header(); 
$show_sidebar =  get_post_meta(get_the_id(), "_cmb_show_sidebar", true) ? get_post_meta(get_the_id(), "_cmb_show_sidebar", true) : 'yes';
$show_title =  get_post_meta(get_the_id(), "_cmb_show_title", true) ? get_post_meta(get_the_id(), "_cmb_show_title", true) : 'yes';

 if($show_sidebar == 'yes'){
	$main_col = 'col-sm-8 col-md-9';
	$sidebar_col = 'col-sm-4 col-md-3';
}else{
	$main_col = 'col-sm-12';
}
?>
	<section class="page-section with-sidebar sidebar-right">
		<div class="container">
			<div class="row">

				<section id="page_content" class="content <?php echo esc_attr($main_col); ?>">
					
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="post">
								<?php  
										$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'full');
							 	?>
							 	<?php if($full_image_url){ ?>
									<div class="thumbnail">							
										 <img src="<?php echo esc_url($full_image_url[0]); ?>" alt="" class="img-responsive">						
									</div>
								<?php } ?>
								<?php if($show_title == 'yes'){ ?>
									<div class="title">
									    <h1><?php the_title();?></h1>
									</div>
								<?php } ?><!-- end title -->
								
								<div class="content-blog">
									<?php 
										the_content();
										wp_link_pages();
									?>
								</div>
								
							</div>

						<?php endwhile; else: ?>
							<p><?php _e('Sorry, no pages matched your criteria.', 'imevent'); ?></p>
						<?php endif; ?>
										
				</section>
				
				<?php if($show_sidebar == 'yes'){ ?>
					<hr class="page-divider transparent visible-xs"/>

					<aside id="sidebar" class="sidebar <?php echo esc_attr($sidebar_col); ?>">
						<?php dynamic_sidebar('sidebar-right' ); ?>
					</aside>
				<?php } ?>

			</div>
		</div> <!-- container -->
	</section> <!-- page-section -->
	

<?php get_footer(); ?>
