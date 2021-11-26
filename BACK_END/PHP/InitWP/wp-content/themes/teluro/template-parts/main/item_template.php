<div class="h-column h-column-container d-flex h-col-lg-12 h-col-md-12 h-col-12  masonry-item style-73-outer style-local-16-m4-outer">
  <div data-colibri-id="16-m4" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-73 style-local-16-m4 position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <div data-colibri-id="16-m5" class="colibri-post-thumbnail <?php teluro_post_thumbnail_classes(); ?> style-74 style-local-16-m5 h-overflow-hidden position-relative h-element">
        <div class="h-global-transition-all colibri-post-thumbnail-shortcode style-dynamic-16-m5-height">
          <?php teluro_post_thumbnail(array (
            'link' => false,
          )); ?>
        </div>
        <div class="colibri-post-thumbnail-content align-items-lg-center align-items-md-center align-items-center flex-basis-100">
          <div class="w-100 h-y-container"></div>
        </div>
      </div>
      <div data-colibri-id="16-m6" class="h-row-container gutters-row-lg-0 gutters-row-md-0 gutters-row-0 gutters-row-v-lg-0 gutters-row-v-md-0 gutters-row-v-0 style-75 style-local-16-m6 position-relative">
        <div class="h-row justify-content-lg-start justify-content-md-start justify-content-start align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-0 gutters-col-md-0 gutters-col-0 gutters-col-v-lg-0 gutters-col-v-md-0 gutters-col-v-0">
          <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-76-outer style-local-16-m7-outer">
            <div data-colibri-id="16-m7" class="d-flex h-flex-basis h-column__inner h-px-lg-3 h-px-md-3 h-px-3 v-inner-lg-3 v-inner-md-3 v-inner-3 style-76 style-local-16-m7 position-relative">
              <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
                <?php teluro_layout_wrapper(array (
                  'name' => 'categories_container',
                  'slug' => 'categories-container-1',
                )); ?><?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
                <div data-colibri-id="16-m13" class="h-blog-meta style-115 style-local-16-m13 position-relative h-element">
                  <div name="1" class="metadata-item">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                      <span class="h-svg-icon">
                        <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="user" viewBox="0 0 512 545.5">
                          <path d="M240 112c61.666 0 112 50.334 112 112 0 38.54-19.698 72.834-49.5 93 57.074 24.477 97.5 81.1 97.5 147h-32c0-70.89-57.11-128-128-128s-128 57.11-128 128H80c0-65.9 40.426-122.522 97.5-147-29.802-20.166-49.5-54.46-49.5-93 0-61.666 50.334-112 112-112zm0 32c-44.372 0-80 35.628-80 80s35.628 80 80 80 80-35.628 80-80-35.628-80-80-80z"></path>
                        </svg>
                      </span>
                      <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
                    </a>
                    <span class="meta-separator">
                      <?php esc_html_e('-','teluro'); ?>
                    </span>
                  </div>
                  <div name="3" class="metadata-item">
                    <a href="<?php teluro_post_meta_time_url(); ?>">
                      <span class="h-svg-icon">
                        <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="clock-o" viewBox="0 0 512 545.5">
                          <path d="M256 96c105.85 0 192 86.15 192 192s-86.15 192-192 192S64 393.85 64 288 150.15 96 256 96zm0 32c-88.555 0-160 71.445-160 160s71.445 160 160 160 160-71.445 160-160-71.445-160-160-160zm-16 32h32v112h80v32H240V160z"></path>
                        </svg>
                      </span>
                      <?php echo esc_html(get_the_time()); ?>
                    </a>
                  </div>
                </div>
                <?php endif; ?>
                <div data-colibri-id="16-m14" class="style-78 style-local-16-m14 position-relative h-element">
                  <div class="colibri-post-content h-global-transition-all">
                    <?php the_content(); ?>
                  </div>
                </div>
                <?php teluro_layout_wrapper(array (
                  'name' => 'tags_container',
                  'slug' => 'tags-container-1',
                )); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php teluro_layout_wrapper(array (
        'name' => 'navigation_container',
        'slug' => 'navigation-container-1',
      )); ?>
    </div>
  </div>
</div>
