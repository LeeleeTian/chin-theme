<?php
    /* -------------------------------------------------- */
    /* TrueLib
    /* -------------------------------------------------- */
    /*
     * The holder of various functions that we use across our sites!
     */
    class TrueLib
    {

        public static function init()
        {
            add_filter('acf/format_value/type=wysiwyg', array(__CLASS__, 'formatWysiwygFieldValue'), 20, 3);
        }

        public static function formatWysiwygFieldValue( $value, $post_id, $field ) 
        {
            return '<div class="true-wysiwyg-field entry-content">' . $value . '</div>';
        }

        public static function getThemeUrl()
        {
            return get_template_directory_uri();
        }

        public static function getThemeDir($path = '')
        {
            return get_template_directory() . $path;
        }

        public static function getCSS($css)
        {
            return get_template_directory_uri() . '/assets/css/' . $css . '.css';
        }

        public static function getJS($js)
        {
            return get_template_directory_uri() . '/assets/js/' . $js . '.js';
        }

        public static function createSocialButton($title, $key, $image, $url, $suffix = '')
        {
            if(trim($url) != '')
            {
                ?>
                <li class="social-<?= $image ?>">
                    <a href="<?=$url?>" class="social-button <?=$image?>" target="_blank">
                        <img src="<?=self::getImageURL('social/social-' . $image . $suffix  . '.png')?>" alt="<?=$title?>" class="retina-image normal" />
                    </a>
                </li>
                <?php
            }

        }

        /**
         * [getTheExcerpt get the excerpt but limited to a specific number of characters
         * @param  integer $count [Number of characters to show]
         * @return [type]         [Trimmed string]
         */
        public static function getTheExcerpt($count = 100)
        {
            $permalink = get_permalink();
            $excerpt = strip_shortcodes(get_the_content());
            $excerpt = strip_tags($excerpt);
            $excerpt = substr($excerpt, 0, $count);
            $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
            $excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
            return $excerpt;
        }

        /**
         * Print social links using font awesome
         * Need to make sure font awesome is included
         * @param  string $iconModifier [description]
         * @return [type]               [description]
         */
        public static function printSocialAwesome($iconModifier = '')
        {
            if(get_field('social_accounts', 'option'))
            {
                while(has_sub_field('social_accounts', 'option'))
                {  
                    $type = get_sub_field('account_type');
                    $url = get_sub_field('account_url');
                    $iconType = $type;
                    if ($type == 'youtube') {
                        $iconType = 'youtube-play';
                    }
                    if(trim($url) != '')
                    {
                        ?>
                        <li class="social-<?= $type ?>">
                            <a href="<?=$url?>" class="social-button <?=$type?>" target="_blank" title="<?= ucfirst($type) ?>">
                                <i class="fa fa-<?= $iconType ?> <?= $iconModifier ?>"></i>
                            </a>
                        </li>
                        <?php
                    }
                }
            }
        }

        public static function printSocialButtons($suffix = '')
        {
            if(get_field('social_accounts', 'option'))
            {
                while(has_sub_field('social_accounts', 'option'))
                {
                    TrueLib::createSocialButton(ucfirst(strtolower(get_sub_field('account_type'))), 'social-' . get_sub_field('account_type'), get_sub_field('account_type'), get_sub_field('account_url'), $suffix);
                }
            }
        }

        public static function getFooterCopyright()
        {
            if (function_exists('get_field')) {
                return str_replace('%year%', date('Y'), get_field('footer_copyright', 'option'));
            } else {
                return '';
            }
        }

        public static function getTemplatePart($name)
        {
            get_template_part('page-templates/partials/' . $name);
        }


        /* Get Image with ACF
        /* name = acf key / filename
        /* class = string
        /*
        /* ACF Specific:
        /* id = integer
        /* acf = true / false
        /* size = string
        /* subfield = true / false

        /* Standard Image:
        /* retina = true / false - not applicable to acf

        /* -------------------------------------------------- */
        public static function getImage($args)
        {
            $name = $size = $alt = $class = '';
            $acf = true;
            $retina = false;
            $subfield = false;
            $id = get_the_ID();
            extract($args);

            if($acf)
            {
                if($subfield)
                {
                    $image = get_sub_field($name);
                } else {

                  $image = get_field($name, $id);
                }

                  //If we have an image, display it!
                if($image)
                {
                    if($size != '')
                    {
                        $imageURL = $image['sizes'][$size];
                    } else {
                        $imageURL = $image['url'];
                    }

                    $str = '<img ';
                    if($class != '')
                    {
                        $str .= 'class="' . $class . '"';
                    }

                    return $str . ' src="' . $imageURL . '" alt="' . $image['alt'] . '">';
                }
              } else {
                  if($retina)
                  {
                      $class .= ' retina-image';
                  }

                  $str = '<img ';
                  if($class != '')
                  {
                      $str .= 'class="' . trim($class) . '"';

                  }
                  return  $str . ' src="' . self::getImageUrl($url) . '" alt="' . $alt  . '">';
              }
              return '';
          }


        /* Get Image with ACF
        /* Args, an array for acf images, or string for a standard image from assets
        /*
        /* name = acf key / filename
        /* subfield = true / false
        /* id = postid
        /* acf = true / false
        /* size = string
        /* ---------------------------------------*/
        public static function getImageUrl($args)
        {
            if(is_array($args))
            {
                $name = $size = $alt = $class = '';
                $subfield = false;
                $id = get_the_ID();
                extract($args);
                if($subfield)
                {
                    $image = get_sub_field($name);
                } else {

                    $image = get_field($name, $id);
                }


                if($image)
                {
                    if($size != '')
                    {
                        $imageURL = $image['sizes'][$size];
                    } else {
                        $imageURL = $image['url'];
                    }

                    return $imageURL;
                }
            } else {
                return get_template_directory_uri() . '/assets/img/' . $args;
            }

            return '';
        }

        public static function getChildPages($post_id)
        {
            $pages_children = get_pages('child_of='.$post_id.'&hierarchical=0&parent='.$post_id.'&sort_column=menu_order');
            return $pages_children;
        }

        /**
         * Debug utilities
         */

        public static function printVar($var)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }

        /**
         * To use this, add hook somewhere in theme.php file
         * add_action('admin_init', array('TrueLib', 'showMenuStructure'));
         * 
         */
        public static function showMenuStructure()
        {
            echo '<pre>'.print_r($GLOBALS['menu'], true).'</pre>';
        }
    }

    TrueLib::init();
