<?php

if (!function_exists('settings')) {
    /**
     * Get the setting saved in settings.json file
     * based on the library anlutro/l4-settings
     *
     * @param null $key
     * @return mixed
     */
    function settings($key = null)
    {
        return Setting::get($key);
    }
}

if (!function_exists('theme_url')) {
    function theme_url($path = null)
    {
        if (null == $path) {
            return url(settings('theme_folder'));
        }

        return url(settings('theme_folder') . $path);
    }
}

if (!function_exists('site_name')) {
    function site_name($char_pos = null)
    {

        if (null === $char_pos) {
            return settings('site_name');
        }

        return isset(settings('site_name')[$char_pos])?settings('site_name')[$char_pos]:'';
    }
}
