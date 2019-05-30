<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package verticalmenu
 * 
 * @since verticalmenu 1.0
 */
?>


<div class="col-sm-4 col-xs-12 verticalmenu_masonry_thumbnail"> 


 	<?php
		// Post thumbnail.
		verticalmenu_post_thumbnail();
	?> 
    
    
    <header class="entry-header"> <!-- -->
		
        <?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
        
	</header><!-- .entry-header -->
    
    
    
  
    
    
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
	
    
            
            $content = strip_tags(get_the_content_with_formatting());
            if(strlen($content) > 300)
              {
                $content = substr($content, 0,300);
                $content = trim(substr($content, 0,300));
                $pos = strrpos($content,' ');
                $content = substr($content, 0, $pos);
                $content .= '<br><br><a href="'.get_permalink().'">'. __("Read more","verticalmenu"). '</a>';
              }
            echo $content;          
            
            
            
			
            
            
            wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'verticalmenu' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'verticalmenu' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
    
<!-- 	</div>.entry-header --> 
    
    
	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>
	<footer class="entry-footer">
		<?php verticalmenu_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'verticalmenu' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
    
    
    

    
 </div>
<!-- </article> <!-- #post-## -->
