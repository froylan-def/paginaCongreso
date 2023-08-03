<div class="vc_row-full-width vc_clearfix"></div>
<?php global $theme_option; ?>
<?php 
    $footer_global = get_post_meta(get_the_id(), "_cmb_footer_global", true);
    if($footer_global != 'no'){
?>
    <footer class="footer">
        <div class="footer-meta">
            <div class="container1 text-center">

                <?php 

                    if(isset($theme_option['footer']) && $theme_option['footer_style'] == 2)

                        echo wp_kses($theme_option['footer_square'],true);

                    else if(isset($theme_option['footer']) && $theme_option['footer_style'] == 1)
                        echo wp_kses($theme_option['footer_cricle'],true); 

                    else if(isset($theme_option['footer']) && $theme_option['footer'] != '' )
                        echo  wp_kses($theme_option['footer'],true);
                    ?>

            </div>
        </div>
    </footer>
    
    <?php } ?>
    <!-- /FOOTER -->

	<?php if($theme_option['go_top']){ ?>
    	<div class="to-top"><i class="fa fa-angle-up"></i></div>
    <?php } ?>

</div> <!-- /wrapper -->
</div> <!-- /content-area -->
<?php wp_footer();?>
</body></html>