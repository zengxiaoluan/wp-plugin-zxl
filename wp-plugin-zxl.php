<?php
/**
 * Plugin Name: WP-Plugin-ZXL
 * Text Domain: wp-plugin-zxl
 * Domain Path: /languages/
 * Plugin URI: https://zengxiaoluan.com/wp-plugin-zxl
 * Description: It's a normal wp plugin for basical usage.
 * Version: 0.1
 * Author: zengxiaoluan
 * Author URI: https://zengxiaoluan.com/wp-plugin-zxl
 */

// Prevent direct call
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/* include email notice code */
require_once plugin_dir_path( __FILE__ ) . 'includes/notice.php';

/* include settings */
require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';

/* disable emoji */
require_once plugin_dir_path( __FILE__ ) . 'includes/disable-emoji.php';