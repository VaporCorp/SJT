<div class="h-column h-column-container d-flex h-col-lg-6 h-col-md-12 h-col-12  masonry-item style-140-outer style-local-25-m3-outer">
  <div data-colibri-id="25-m3" class="d-flex h-flex-basis h-column__inner h-px-lg-0 h-px-md-0 h-px-0 v-inner-lg-0 v-inner-md-0 v-inner-0 style-140 style-local-25-m3 position-relative">
    <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
      <div data-colibri-id="25-m4" class="h-row-container gutters-row-lg-0 gutters-row-md-0 gutters-row-0 gutters-row-v-lg-0 gutters-row-v-md-0 gutters-row-v-0 style-576 style-local-25-m4 position-relative">
        <div class="h-row justify-content-lg-center justify-content-md-center justify-content-center align-items-lg-stretch align-items-md-stretch align-items-stretch gutters-col-lg-0 gutters-col-md-0 gutters-col-0 gutters-col-v-lg-0 gutters-col-v-md-0 gutters-col-v-0">
          <div class="h-column h-column-container d-flex h-col-lg-auto h-col-md-auto h-col-auto style-577-outer style-local-25-m5-outer">
            <div data-colibri-id="25-m5" class="d-flex h-flex-basis h-column__inner h-px-lg-3 h-px-md-3 h-px-3 v-inner-lg-3 v-inner-md-3 v-inner-3 style-577 style-local-25-m5 position-relative">
              <div class="w-100 h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
                <?php teluro_layout_wrapper(array (
                  'name' => 'categories_container',
                  'slug' => 'categories-container-2',
                )); ?>
                <div data-colibri-id="25-m11" class="h-blog-title style-144 style-local-25-m11 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php teluro_post_title(array (
                      'heading_type' => 'h4',
                      'classes' => 'colibri-word-wrap',
                    )); ?>
                  </div>
                </div>
                <?php if ( \ColibriWP\Theme\Core\Hooks::prefixed_apply_filters( 'show_post_meta', true ) ): ?>
                <div data-colibri-id="25-m12" class="h-blog-meta style-539 style-local-25-m12 position-relative h-element">
                  <div name="1" class="metadata-item">
                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
                      <?php echo esc_html(get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) )); ?>
                    </a>
                    <span class="meta-separator">
                      <?php esc_html_e('-','teluro'); ?>
                    </span>
                  </div>
                  <div name="3" class="metadata-item">
                    <a href="<?php teluro_post_meta_time_url(); ?>">
                      <?php echo esc_html(get_the_time()); ?>
                    </a>
                  </div>
                </div>
                <?php endif; ?>
                <div data-colibri-id="25-m13" class="style-146 style-local-25-m13 position-relative h-element">
                  <div class="h-global-transition-all">
                    <?php teluro_post_excerpt(array (
                      'max_length' => '',
                    )); ?>
                  </div>
                </div>
                <div data-colibri-id="25-m14" class="h-x-container style-147 style-local-25-m14 position-relative h-element">
                  <div class="h-x-container-inner style-dynamic-25-m14-group">
                    <span class="h-button__outer style-538-outer style-local-25-m15-outer d-inline-flex h-element">
                      <a h-use-smooth-scroll="true" href="<?php the_permalink(); ?>" data-colibri-id="25-m15" class="d-flex w-100 align-items-center h-button justify-content-lg-center justify-content-md-center justify-content-center style-538 style-local-25-m15 position-relative">
                        <span class="h-svg-icon h-button__icon style-538-icon style-local-25-m15-icon">
                          <!--Icon by Icons8 Line Awesome (https://icons8.com/line-awesome)-->
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="minus" viewBox="0 0 512 545.5">
                            <path d="M80 272h352v32H80v-32z"></path>
                          </svg>
                        </span>
                        <span>
                          <?php esc_html_e('read more','teluro'); ?>
                        </span>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
