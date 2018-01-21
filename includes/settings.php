<?php
/**
 * wordpress的一些常用配置
 * author zengxiaoluan.com
 * created 2017-11-19
 */

/* Automatic updates for All themes: */
add_filter( 'auto_update_theme', '__return_true' );

/* Automatic updates for All plugins: */
add_filter( 'auto_update_plugin', '__return_true' );

/* To enable automatic updates for major releases or development purposes, the place to start is with the WP_AUTO_UPDATE_CORE constant. Defining this constant one of three ways allows you to blanket-enable, or blanket-disable several types of core updates at once.
 */
define( 'WP_AUTO_UPDATE_CORE', true );

if (!function_exists('revision_times')) {
    function revision_times( $num, $post ) {
        return 1;
    }
    // set revision time as one
    add_filter( 'wp_revisions_to_keep', 'revision_times', 10, 2 );
}

add_filter('user_row_actions', function($actions, $user){
    $capability = (is_multisite())?'manage_site':'manage_options';
    if(current_user_can($capability)){
        $actions['login_as']    = '<a title="以此身份登陆" href="'.wp_nonce_url("users.php?action=login_as&users=$user->ID", 'bulk-users').'">以此身份登陆</a>';
    }
    return $actions;
}, 10, 2);

add_filter('handle_bulk_actions-users', function($sendback, $action, $user_ids){
    if($action == 'login_as'){
        wp_set_auth_cookie($user_ids, true);
        wp_set_current_user($user_ids);
    }
    return admin_url();
},10,3);
