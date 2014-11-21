<?php
/**
 * Plugin Name: Add Advance Custom Fields to JSON API
 * Description: Add Advance Custom Fields to JSON API - from https://gist.github.com/rileypaulsen/9b4505cdd0ac88d5ef51
 * Author: @PanMan
 * Author URI: https://github.com/PanManAms/WP-JSON-API-ACF
 * Version: 0.1
 * Plugin URI: https://github.com/PanManAms/WP-JSON-API-ACF
 * Copied from https://gist.github.com/rileypaulsen/9b4505cdd0ac88d5ef51 - but a plugin is nicer
 */
function wp_api_encode_acf($data,$post,$context){
    $customMeta = (array) get_fields($post['ID']);

    $data['meta'] = array_merge($data['meta'], $customMeta );
    return $data;
}

add_filter('json_prepare_post', 'wp_api_encode_acf', 10, 3);
