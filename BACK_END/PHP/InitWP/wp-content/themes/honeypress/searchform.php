<form class="input-group" method="get" id="searchform" action="<?php echo esc_url( home_url('/') );?>">
	<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'honeypress' );?>" value="" name="s" id="s"/>
	<div class="input-group-append">
		<button class="btn btn-success" type="submit"><?php esc_html_e('Go','honeypress');?></button>
	</div>
</form>