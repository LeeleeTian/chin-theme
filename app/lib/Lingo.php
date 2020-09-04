<?php
/**
 * Maintain Languages / constant labels in custom sections
 * By default uses Config class to return all label strings
 * Less work needed instead of using ACF
 * @uses Config
 */
class Lingo
{

    const LANG_ROOT = 'app/lang/';

    public static function get($value = '')
    {
        if (empty($value)) {
            return '';
        }

        $overridePath = self::LANG_ROOT . self::detectLocale() . '/';
        return Config::get($value, $overridePath);;
    }

    public static function detectLocale()
    {
        if (ICL_LANGUAGE_CODE == 'zh-hans') {
            return 'ch';
        } else {
            return 'en';
        }
    }
}
