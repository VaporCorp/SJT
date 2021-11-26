<?php if( is_active_sidebar('home-header-sidebar_left') || is_active_sidebar('home-header-sidebar_right')) {?>
<header class="header-sidebar ">
		<div class="container">
				<div class="row">
						<div class="col-lg-9 col-md-7">
							<?php
							if( is_active_sidebar('home-header-sidebar_left') )
							{
								dynamic_sidebar( 'home-header-sidebar_left' );
							}
							?>
						</div>
						<div class="col-lg-3 col-md-5">
							<?php
							if( is_active_sidebar('home-header-sidebar_right') ) {
							dynamic_sidebar( 'home-header-sidebar_right' );
							}
							?>
						</div>
				</div>
		</div>
</header>
<?php }
