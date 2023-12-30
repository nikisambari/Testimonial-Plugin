<?php
if(!define('WP_UNINSTALL_PLUGIN')){
    header("Location:/wordpress");
    die();
}

global $wpdb;
$table=$wpdb->prefix.'testimonial';
$q ="DROP TABLE '$table'";
$wpdb->query($q);


?>