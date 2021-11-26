<?php 
/**
 * Helper functions.
 *
 * @package Honeypress
 */
if (!function_exists('honeypress_custom_navigation')) :

    function honeypress_custom_navigation() {
        if (!is_rtl()) {
            the_posts_pagination(array(
                'mid_size' => 5,
                'prev_text' => __('<i class="fa fa-angle-double-left"></i>', 'honeypress'),
                'next_text' => __('<i class="fa fa-angle-double-right"></i>', 'honeypress'),
            ));
        } else {
            the_posts_pagination(array(
                'mid_size' => 5,
                'prev_text' => __('<i class="fa fa-angle-double-right"></i>', 'honeypress'),
                'next_text' => __('<i class="fa fa-angle-double-left"></i>', 'honeypress'),
            ));
        }
    }

endif;
add_action( 'honeypress_post_navigation', 'honeypress_custom_navigation' );


function honeypress_comment($comment, $args, $depth) {
  $tag       = 'div';
  $add_below = 'comment';
  ?>
  <div class="media comment-box">
    <span class="pull-left-comment">
          <?php echo get_avatar( $comment,100, null,'comments user', array( 'class' => array( 'img-fluid comment-img') )); ?>
    </span>
    <div class="media-body">
      <div class="comment-detail">
        <h5 class="comment-detail-title"><?php esc_html(comment_author()); ?><time class="comment-date"><?php printf( esc_html__('%1$s  %2$s','honeypress'), esc_html(get_comment_date()),  esc_html(get_comment_time()) ); ?></time></h5>
            <?php comment_text(); ?>      
        <div class="reply">
          <?php comment_reply_link (array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
      </div>       
    </div>      
  </div>
  <?php
}

/**
* Displays the author name
*/
function honeypress_get_author_name( $post ){
  $user_id = $post->post_author;
  if( empty( $user_id ) ){
    return;
  }
  $user_info = get_userdata( $user_id );
  echo esc_html( $user_info->display_name );
}


if ( ! function_exists( 'honeypress_posted_content' ) ) :
    function honeypress_posted_content() { 
      $honeypress_blog_content  = get_theme_mod('honeypress_blog_content','excerpt');
      $honeypress_excerpt_length  = get_theme_mod('honeypress_blog_content_length',30);

      if ( 'excerpt' == $honeypress_blog_content ){
      $honeypress_excerpt = honeypress_the_excerpt( absint( $honeypress_excerpt_length ) );
      if ( !empty( $honeypress_excerpt ) ) :                   
          echo wp_kses_post( wpautop( $honeypress_excerpt ) );
           endif; 
      } else{ 
       the_content(); 
        }
 }
endif;

if ( ! function_exists( 'honeypress_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function honeypress_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;

function honeypress_footer_section_hook()
{
?>
<footer class="site-footer">  
  <div class="container">
    <?php 
    if(is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3')): ?>
    <div class="seprator-line"></div>   
      <?php get_template_part('sidebar','footer');
    endif;?>  
  </div>
  <?php
  $honeypress_user=get_option('honeypress_user_before_1_3_8');
  if($honeypress_user='old'){ ?>
    <div class="site-info text-center">
       <?php $honeypress_footer_copyright = get_theme_mod('footer_copyright','<p>'. __( 'Proudly powered by <a href="https://wordpress.org"> WordPress</a> | Theme: <a href="https://spicethemes.com" rel="nofollow">HoneyPress</a> by SpiceThemes', 'honeypress' ).'</p>'); ?>  
       <?php echo wp_kses_post($honeypress_footer_copyright);?> 
    </div>
  <?php }else{?>
    <div class="site-info text-center">
         <p><?php esc_html_e( 'Proudly powered by', 'honeypress' ); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org', 'honeypress' ) ); ?>"><?php esc_html_e( 'WordPress', 'honeypress' ); ?> </a> <?php esc_html_e( '| Theme:', 'honeypress' ); ?> <a href="<?php echo esc_url( __( 'https://spicethemes.com', 'honeypress' ) ); ?>" rel="nofollow"> <?php esc_html_e( 'HoneyPress', 'honeypress' ); ?></a> <?php esc_html_e( 'by SpiceThemes', 'honeypress' );?></p>
    </div>  
<?php } ?>
</footer>
<?php  
}
add_action('honeypress_footer_section_hook','honeypress_footer_section_hook');

if( ! function_exists( 'honeypress_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function honeypress_register_custom_controls( $wp_customize ) {
    require ( HONEYPRESS_THEME_DIR . '/inc/customizer/sortable/class-sortable-control.php' );
    $wp_customize->register_control_type( 'Honeypress_Control_Sortable' );
}
endif;
add_action( 'customize_register', 'honeypress_register_custom_controls' );