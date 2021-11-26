<?php return
    array(
        'navigation'  =>
            array(
                'props' =>
                    array(
                        'showTopBar' => true,
                        'sticky'     => true,
                        'overlap'    => true,
                        'width'      => 'boxed',
                        'layoutType' => 'logo-spacing-menu',
                    ),
                'style' =>
                    array(
                        'ancestor'   =>
                            array(
                                'sticky' =>
                                    array(
                                        'background' =>
                                            array(
                                                'color' => '#ffffff',
                                            ),
                                    ),
                            ),
                        'background' =>
                            array(
                                'color' => 'transparent',
                            ),
                        'padding'    =>
                            array(
                                'top' =>
                                    array(
                                        'value' => '20',
                                    ),
                            ),
                    ),
            ),
        'logo'        =>
            array(
                'props' =>
                    array(
                        'layoutType' => 'image',
                    ),
            ),
        'header-menu' =>
            array(
                'props' =>
                    array(
                        'sticky'              => true,
                        'hoverEffect'         =>
                            array(
                                'type'        => 'bordered-active-item bordered-active-item--bottom',
                                'group'       =>
                                    array(
                                        'border' =>
                                            array(
                                                'transition' => 'effect-borders-grow grow-from-center',
                                            ),
                                    ),
                                'activeGroup' => 'border',
                                'enabled'     => true,
                            ),
                        'showOffscreenMenuOn' => 'has-offcanvas-tablet',
                    ),
            ),
        'title'       =>
            array(
                'style' =>
                    array(
                        'textAlign' => 'center',
                    ),
            ),
        'hero'        =>
            array(
                'style' =>
                    array(
                        'background'      =>
                            array(
                                'type'      => 'image',
                                'color'     => '#03a9f4',
                                'overlay'   =>
                                    array(
                                        'shape'    =>
                                            array(
                                                'value'  => 'none',
                                                'isTile' => false,
                                            ),
                                        'light'    => false,
                                        'color'    =>
                                            array(
                                                'value'   => '${theme.colors.5}',
                                                'opacity' => '0.45',
                                            ),
                                        'enabled'  => true,
                                        'type'     => 'color',
                                        'gradient' =>
                                            array(
                                                'angle' => '-20',
                                                'steps' =>
                                                    array(
                                                        0 =>
                                                            array(
                                                                'color'    => 'rgba(183, 33, 255, 0.8)',
                                                                'position' => '0',
                                                            ),
                                                        1 =>
                                                            array(
                                                                'color'    => 'rgba(33, 212, 253, 0.8)',
                                                                'position' => '100',
                                                            ),
                                                    ),
                                                'name'  => 'october_silence',
                                            ),
                                    ),
                                'image'     =>
                                    array(
                                        0 =>
                                            array(
                                                'source'      =>
                                                    array(
                                                        'url'      => 'home-page-header-scaled.jpg',
                                                        'gradient' =>
                                                            array(
                                                                'name'  => 'october_silence',
                                                                'angle' => 0,
                                                                'steps' =>
                                                                    array(
                                                                        0 =>
                                                                            array(
                                                                                'position' => '0',
                                                                                'color'    => '#b721ff',
                                                                            ),
                                                                        1 =>
                                                                            array(
                                                                                'position' => '100',
                                                                                'color'    => '#21d4fd',
                                                                            ),
                                                                    ),
                                                            ),
                                                    ),
                                                'attachment'  => 'fixed',
                                                'position'    => 'center center',
                                                'repeat'      => 'no-repeat',
                                                'size'        => 'cover',
                                                'useParallax' => false,
                                            ),
                                    ),
                                'slideshow' =>
                                    array(
                                        'slides'   =>
                                            array(
                                                0 =>
                                                    array(
                                                        'id'  => 1,
                                                        'url' => get_template_directory_uri() . '/resources/images/leaf-nature-water-green-freshness-dew-1440543-pxhere.com.jpg',
                                                    ),
                                                1 =>
                                                    array(
                                                        'id'  => 2,
                                                        'url' => get_template_directory_uri() . '/resources/images/landscape-tree-water-nature-grass-outdoor-1327743-pxhere.com.jpg',
                                                    ),
                                                2 =>
                                                    array(
                                                        'id'  => 3,
                                                        'url' => get_template_directory_uri() . '/resources/images/beach-landscape-sea-water-nature-sand-1061655-pxhere.com.jpg',
                                                    ),
                                            ),
                                        'duration' =>
                                            array(
                                                'value' => 1500,
                                            ),
                                        'speed'    =>
                                            array(
                                                'value' => 1500,
                                            ),
                                    ),
                                'video'     =>
                                    array(
                                        'videoType'   => 'external',
                                        'externalUrl' => 'https://www.youtube.com/watch?v=coYirc_qoSA',
                                        'internalUrl' => 'https://static.colibriwp.com/assets/sources/colibri-demo-video.mp4',
                                        'poster'      =>
                                            array(
                                                'url' => 'https://static.colibriwp.com/assets/sources/colibri-demo-video-cover.jpg',
                                            ),
                                    ),
                            ),
                        'padding'         =>
                            array(
                                'top'    =>
                                    array(
                                        'value' => '200',
                                        'unit'  => 'px',
                                    ),
                                'bottom' =>
                                    array(
                                        'value' => '320',
                                        'unit'  => 'px',
                                    ),
                            ),
                        'separatorBottom' =>
                            array(
                                'enabled' => true,
                                'height'  =>
                                    array(
                                        'value' => '90',
                                    ),
                            ),
                    ),
                'props' =>
                    array(
                        'layoutType'  => 'textWithMediaOnRight',
                        'heroSection' =>
                            array(
                                'layout' => 'textWithMediaOnRight',
                            ),
                    ),
            ),
    );
