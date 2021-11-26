<article class="post" id="post-<?php the_ID(); ?>">			
		<?php 
		if(has_post_thumbnail()){
		if ( is_single() ) {
			the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => esc_attr( get_the_title() ) ) );
		}else{
			echo '<figure class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-responsive','alt' => esc_attr( get_the_title() ) ) );
			echo '</figure>';
		}}?>
			
	<div class="entry-content">
		<?php the_content(); wp_link_pages();?>
	</div>	
</article>