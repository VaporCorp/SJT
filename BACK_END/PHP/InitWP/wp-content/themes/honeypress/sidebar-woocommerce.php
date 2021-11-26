<?php
/**
 * side bar template
 *
 */
?>
<div class="col-lg-4 col-md-5 col-sm-12">
	<div class="sidebar">
	<?php if ( is_active_sidebar( 'woocommerce' )  ) : 
		 	dynamic_sidebar( 'woocommerce' );
		endif; ?>
	</div>
</div>	