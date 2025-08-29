<?php

/**
 * Plugin Name: Disable Update All
 * Plugin URI:  https://t.me/logbear1
 * Description: Tắt mọi cập nhật tự động, vô hiệu hóa WP Cron và ngăn sửa/xóa plugin theme theo cấu hình do người dùng cung cấp.
 * Version:     1.1
 * Author:      logbear
 * Author URI:  https://t.me/logbear1
 * License:     GPLv2 or later
 */

if (! defined('ABSPATH')) {
    exit; // Không cho chạy trực tiếp
}

/**
 * --- Constants ---
 * Nếu các hằng số đã được định nghĩa ở nơi khác (ví dụ wp-config.php) thì sẽ không ghi đè.
 * Một số hằng (ví dụ WP_AUTO_UPDATE_CORE, AUTOMATIC_UPDATER_DISABLED, DISALLOW_FILE_MODS, DISABLE_WP_CRON)
 * tốt nhất nên đặt trong wp-config.php vì plugin có thể load quá muộn để ảnh hưởng mọi hành vi.
 */
if (! defined('DISABLE_WP_CRON')) {
    define('DISABLE_WP_CRON', true);
}
if (! defined('WP_AUTO_UPDATE_CORE')) {
    define('WP_AUTO_UPDATE_CORE', false);
}
if (! defined('AUTOMATIC_UPDATER_DISABLED')) {
    define('AUTOMATIC_UPDATER_DISABLED', true);
}
if (! defined('DISALLOW_FILE_MODS')) {
    define('DISALLOW_FILE_MODS', true);
}
if (! defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

/**
 * --- Disable automatic updates via filters ---
 */
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
add_filter('auto_update_core', '__return_false');

// Cố gắng chặn thông báo update trong transient
add_filter('site_transient_update_plugins', '__return_empty_array');
add_filter('site_transient_update_themes', '__return_empty_array');
// Kết thúc plugin
