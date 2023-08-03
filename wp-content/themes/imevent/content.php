<?php $show_title =  get_post_meta(get_the_id(), "_cmb_show_title", true) ? get_post_meta(get_the_id(), "_cmb_show_title", true) : 'yes'; ?>
<article class="post-wrap <?php echo is_sticky()?'sticky':''; ?>" data-animation="fadeInUp" data-animation-delay="100">
    

    <div class="post-media">

        <?php if(has_post_format('video')){ ?>
            <?php if(!is_single()){ ?>
                <div class="post-type">
                    <i class="fa fa-video-camera"></i>
                </div>
            <?php } ?>
            <div class="js-video">
                <?php echo wp_oembed_get(get_post_meta(get_the_id(), "_cmb_embed_media", true)); ?>
            </div>

        <?php } elseif(has_post_format('audio')){ ?>
            <?php if(!is_single()){ ?>
                <div class="post-type">
                    <i class="fa fa-music"></i>
                </div>
            <?php } ?>
            <div class="js-video">
                <?php echo wp_oembed_get(get_post_meta(get_the_id(), "_cmb_embed_media", true)); ?>
            </div>

        <?php }else{ ?>

            <?php $thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id()); ?>
            <?php if($thumbnail_url){ ?>
                <?php if(!is_single()){ ?>
                    <div class="post-type">
                        <i class="fa fa-picture-o"></i>
                    </div>
                <?php } ?>
                <img  src="<?php  echo esc_url($thumbnail_url); ?>" alt="" class="img-responsive">
            <?php } ?>

        <?php } ?>
    </div>

    <div class="post-header">

        <?php if($show_title == 'yes'){ ?>
            <?php if( is_single() ){ ?>
                <h1 class="post-title"><?php the_title( ); ?></h1>
            <?php }else{ ?>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h2>
            <?php } ?>
        <?php } ?>

        <div class="post-meta">
            <span class="post-date">
                <?php _e('Posted on', 'imevent'); ?>                
                <span class="day"> <?php the_time( get_option( 'date_format' ));?></span>                
            </span>
            <span class="pull-right">
                <i class="fa fa-comment"></i> 
                <a href="<?php the_permalink();?>">
                    <?php comments_popup_link(__(' 0', 'imevent'), __(' 1', 'imevent'), ' %'.__('', 'imevent')); ?>
                </a>
            </span>
        </div>
    </div>
    <div class="post-body">
        <div class="post-excerpt">
            <?php if(is_single()){ /* Single */
                the_content();
                wp_link_pages();                
            }else{
                the_excerpt(); /* Category */
            } ?>
            
        </div>
    </div>
    <?php if(!is_single()){ ?> <!-- Category -->
        <div class="post-footer">
            <span class="post-readmore">
                <a href="<?php the_permalink(); ?>" class="btn btn-theme btn-theme-transparent"><?php  _e('Read more', 'imevent'); ?></a>
            </span>
        </div>
    <?php }else{ ?> <!-- Single -->
        <footer class="post-meta">
            <?php if(has_tag()){ ?>
                <span class="post-tags"><i class="fa fa-tag"></i> 
                    <?php the_tags('',',',''); ?>
                </span> &nbsp;
            <?php } ?>
            <?php if(has_category( )){ ?>
                <span class="post-categories"><i class="fa fa-folder-open"></i> 
                    <?php the_category(','); ?>
                </span>
            <?php } ?>
        </footer>
    <?php } ?>
</article>