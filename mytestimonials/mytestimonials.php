<?php
/*
* Plugin Name: TestiFlex
* Description: TestiFlex offers flexibility and style in one package. Customize your testimonials and let them flex their visual appeal with our array of design options.
* Version: 1.0
* Author: We Think North
* Author URI: https://wethinknorth.com/
* Text Domain: testiflex
* Tags: testimonials, flexible, design, customization
* Requires at least: 4.0
* Tested up to: 5.9
* Requires PHP: 7.0
* Stable tag: 1.0
*/
if(!defined('ABSPATH')){
        header("Location: /wtnwordpress");  
        die("");
    }
function my_activation_plugin(){
    global $wpdb;
    $table =  $wpdb->prefix.'testimonial';
    $q = "CREATE TABLE IF NOT EXISTS $table (ID INT(9) NOT NULL AUTO_INCREMENT , 
            username VARCHAR(50) NOT NULL , 
            designation VARCHAR(255) NOT NULL , 
            review  TEXT NOT NULL , 
            profile_photo VARCHAR(255) NOT NULL,
            facebook_link VARCHAR(255),
            linkedin_link VARCHAR(255),
            instagram_link VARCHAR(255),
            PRIMARY KEY (ID)) 
            ENGINE = InnoDB;" ;

    $wpdb->query($q);  
   

}
function my_deactivation_plugin(){
    global $wpdb;
    $table=$wpdb->prefix.'testimonial';
    $q ="TRUNCATE '$table'";
    $wpdb->query($q);
}

register_activation_hook(__FILE__,'my_activation_plugin');
register_deactivation_hook(__FILE__,'my_activation_plugin');

function lib_enqueue_styles() {
  wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
  wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('fontawesome','https://use.fontawesome.com/releases/v5.6.1/css/all.css');
  wp_enqueue_style('my-bootstrapcdn','https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
  
}
add_action('wp_enqueue_scripts', 'lib_enqueue_styles');


function my_custom_scripts(){
    $path =  plugins_url('js/main.js',__FILE__);   
    $dep = array('jquery');
    $ver = filemtime(plugin_dir_path(__FILE__).'js/main.js');         
    wp_enqueue_script('my-custom-js',$path, $dep, $ver, true);  
    
  }

add_action('wp_enqueue_scripts','my_custom_scripts');

function my_custom_style(){
    $path =  plugins_url('css/style.css',__FILE__);   
    $path1 =  plugins_url('css/review-form.css',__FILE__); 
    $path2 =  plugins_url('css/settings.css',__FILE__); 
    $path3 =  plugins_url('css/testimonial-custom-css.css',__FILE__); 
    $dep = array('jquery'); //dependencies
    $ver = filemtime(plugin_dir_path(__FILE__).'css/style.css');   
    $ver1 = filemtime(plugin_dir_path(__FILE__).'css/review-form.css');       // version
    $ver2 = filemtime(plugin_dir_path(__FILE__).'css/settings.css');  
    $ver3 = filemtime(plugin_dir_path(__FILE__).'css/testimonial-custom-css.css');  
    wp_enqueue_style('my-style',$path, '', $ver);     //used to include style
    wp_enqueue_style('my-settings',$path2, '', $ver2);
    wp_enqueue_style('my-review-form',$path1, '', $ver1);
    wp_enqueue_style('my-testimonial-gallery',plugins_url('css/testimonial-gallery.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/testimonial-gallery.css'));
    wp_enqueue_style('my-testimonial-slider2',plugins_url('css/slider-layout2.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/slider-layout2.css'));
    wp_enqueue_style('my-testimonial-gallery2',plugins_url('css/testimonial-gallery-2.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/testimonial-gallery-2.css'));
    wp_enqueue_style('my-testimonial-slider3',plugins_url('css/slider-layout3.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/slider-layout3.css'));
    wp_enqueue_style('my-testimonial-slider4',plugins_url('css/slider-layout4.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/slider-layout4.css'));
    wp_enqueue_style('my-testimonial-gallery3',plugins_url('css/testimonial-gallery3.css',__FILE__), '',filemtime(plugin_dir_path(__FILE__).'css/testimonial-gallery3.css'));
    wp_enqueue_style('my-testimonial-custom-css',$path3, '', $ver3);
  
}
add_action('wp_enqueue_scripts','my_custom_style');
add_action('admin_init', 'my_custom_style');


function testimonial_form( $atts ){
    ob_start ();
    include('templates/testimonials-form.php');
    $content = ob_get_clean(); 

    return $content; 
}
add_shortcode('testimonial-form','testimonial_form');


function display_testimonials( $atts ) {
    ob_start ();
    $selected_layout = get_option('testimonial_layout', 'slider'); // Default to 'slider' if not set
    if ($selected_layout === 'slider') {
        include('layouts/view_testimonials.php');
    } 
    elseif ($selected_layout === 'sliderlayout2') {    
        include('layouts/slider-layout2.php');
    }
    elseif ($selected_layout === 'gallery') {    
        include('layouts/gallery_testimonials.php');
    }
    elseif ($selected_layout === 'gallerylayout2') {    
        include('layouts/gallery-testimonial-2.php');
    }
    elseif ($selected_layout === 'sliderlayout3') {
        include('layouts/slider-layout3.php');
    }
    elseif ($selected_layout === 'sliderlayout4') {
        include('layouts/slider-layout4.php');
    }
    elseif ($selected_layout === 'gallerylayout3') {
        include('layouts/gallery-testimonial3.php');
    }
    $content = ob_get_clean(); 
    return $content;
}
add_shortcode('view-testimonials', 'display_testimonials');


function testimonial_settings_page() {
    add_menu_page(
        'TestiFlex',
        'TestiFlex',
        'manage_options',
        'testimonial-settings',
        'render_testimonial_settings_page',
        'dashicons-testimonial'
        
    );
    add_submenu_page(
        'testimonial-settings',     
        'About Testimonial',         
        'About Testimonial',       
        'manage_options',            
        'testimonial-about',        
        'render_testimonial_about_page' 
    );
}
function render_testimonial_about_page()
{
    include('templates/testimonial-about.php');
}

function render_testimonial_settings_page() {
    ?>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_identifier'])) {
        $form_identifier = sanitize_text_field($_POST['form_identifier']);

        if ($form_identifier === 'testimonial-elements' && isset($_POST['save_elements_button'])) {
            $display_profile = isset($_POST['display_profile']) ? '1' : '0';
            $display_username = isset($_POST['display_username']) ? '1' : '0';
            $display_designation = isset($_POST['display_designation']) ? '1' : '0';
            $display_social_media = isset($_POST['display_social_media']) ? '1' : '0';
            $display_facebook_link = isset($_POST['display_facebook_link']) ? '1' : '0';
            $display_linkedin_link = isset($_POST['display_linkedin_link']) ? '1' : '0';
            $display_instagram_link = isset($_POST['display_instagram_link']) ? '1' : '0';
            $display_rating = isset($_POST['display_rating']) ? '1' : '0';
          
            update_option('display_profile', $display_profile);
            update_option('display_username', $display_username);
            update_option('display_designation', $display_designation);
            update_option('display_social_media', $display_social_media);
            update_option('display_facebook_link', $display_facebook_link);
            update_option('display_linkedin_link', $display_linkedin_link);
            update_option('display_instagram_link', $display_instagram_link);
            update_option('display_rating', $display_rating);

            echo '<div class="notice notice-success is-dismissible"><p>Testimonial elements settings saved.</p></div>';
        } 
        
        elseif ($form_identifier === 'testimonial-color-settings' && isset($_POST['save_color_button'])) {
       $selected_color = sanitize_text_field($_POST['testimonial_color']);
       $selected_bg = sanitize_text_field($_POST['testimonial_bg_color']);
    
        update_option('testimonial_color',$selected_color)    ;
        update_option('testimonial_bg_color', $selected_bg);
     
            echo '<div class="notice notice-success is-dismissible"><p>Testimonial color settings saved.</p></div>';
        }
        
        elseif ($form_identifier === 'testimonial-style' && isset($_POST['save_style_button'])) {
           $selected_layout = sanitize_text_field($_POST['testimonial_layout']);
           $selected_perview = sanitize_text_field($_POST['testimonial_perview']);
        
            $testimonial_autoplay = isset($_POST['testimonial_autoplay']) ? '1' : '0';
            $testimonial_navigation = isset($_POST['testimonial_navigation']) ? '1' : '0';
            $testimonial_coverflow = isset($_POST['testimonial_coverflow']) ? '1' : '0';
          //  $testimonial_view_more = isset($_POST['testimonial_view_more']) ? '1' : '0';
            $testimonial_count = sanitize_text_field($_POST['testimonial_count']);
          
            update_option('testimonial_perview',$selected_perview)    ;
            update_option('testimonial_autoplay', $testimonial_autoplay);
            update_option('testimonial_navigation', $testimonial_navigation);
            update_option('testimonial_layout', $selected_layout);
            update_option('testimonial_count', $testimonial_count);
           // update_option('testimonial_view_more', $testimonial_view_more);
           
            update_option('testimonial_coverflow', $testimonial_coverflow);
          
            echo '<div class="notice notice-success is-dismissible"><p>Testimonial style settings saved.</p></div>';
        }
    }
}
?>
    <div class="wrap">
        <h1>Testimonial Settings</h1>
        <div class="settings-content">
        <?php 
        include('templates/testimonial-elements.php');
        include('templates/testimonial-color-settings.php'); 
        include('templates/testimonial-style.php'); 
        include('templates/testimonial-add-css.php'); 
        ?>
        
        </div>  
    </div>
    <?php
}
       
  
function testimonial_custom_css() 
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['save_css_button'])){
        $testimonial_add_css = sanitize_text_field($_POST['testimonial_add_css']);
        update_option('testimonial_add_css', $testimonial_add_css);
             $custom_css = get_option('testimonial_add_css', '');

          
            if (is_writable($plugin_css_file)) {

                file_put_contents($plugin_css_file, "\n\n/* Custom CSS */\n" . $custom_css, FILE_APPEND);
            } else {
                echo 'Error: The plugin style.css file is not writable. Please check file permissions.';
            } 
            echo '<div class="notice notice-success is-dismissible"><p>Additional CSS Added.</p></div>';
   

        }
        if(isset($_POST['undo_css_button'])){
           $cssFilePath =plugin_dir_path(__FILE__) . 'css/testimonial-custom-css.css';

          
            $cssContent = file_get_contents($cssFilePath);

           
            $lines = explode("\n", $cssContent);
           
            if (count($lines) >= 2) {
                array_splice($lines, -3);
            }

        
            $newCssContent = implode("\n", $lines);
            file_put_contents($cssFilePath, $newCssContent);
            update_option('testimonial_add_css',file_get_contents($cssFilePath));
            echo '<div class="notice notice-success is-dismissible"><p>Last Additional CSS has been Undo.</p></div>';
   

        }
        if(isset($_POST['reset_css_button'])){
                          // Path to your CSS file
                          $cssFilePath =plugin_dir_path(__FILE__) . 'css/testimonial-custom-css.css';

                          file_put_contents($cssFilePath, '');

                          // Optionally, you can check if the operation was successful
                          if (file_get_contents($cssFilePath) === '') {
                            echo '<div class="notice notice-success is-dismissible"><p>Additional CSS has been Reset.</p></div>';
                        } else {
                            echo '<div class="notice notice-fail is-dismissible"><p>Additional CSS cannot be Reset.</p></div>';
                   
                          }
                          update_option('testimonial_add_css', '');
        }
        
      
    }
    
}

add_action('admin_init', 'testimonial_custom_css');
    

function register_testimonial_settings() {
    register_setting('testimonial-color-settings-group', 'testimonial_color');
    register_setting('testimonial-color-settings-group', 'testimonial_bg_color');
    register_setting('testimonial-layout-settings-group', 'testimonial_layout');
    register_setting('testimonial-layout-settings-group', 'testimonial_perview');
    register_setting('testimonial-layout-settings-group', 'testimonial_autoplay');
    register_setting('testimonial-layout-settings-group', 'testimonial_navigation');
    register_setting('testimonial-layout-settings-group', 'testimonial_coverflow');
    register_setting('testimonial-layout-settings-group', 'testimonial_count');
   // register_setting('testimonial-layout-settings-group', 'testimonial_view_more');
 
    register_setting('testimonial-element-settings-group', 'display_profile');
    register_setting('testimonial-element-settings-group', 'display_username');
    register_setting('testimonial-element-settings-group', 'display_social_media');
    register_setting('testimonial-element-settings-group', 'display_facebook_link');
    register_setting('testimonial-element-settings-group', 'display_instagram_link');
    register_setting('testimonial-element-settings-group', 'display_linkedin_link');
    register_setting('testimonial-element-settings-group', 'display_designation');
    register_setting('testimonial-element-settings-group', 'display_rating');
    register_setting('testimonial-add-css-group', 'testimonial_add_css');
}


add_action('admin_menu', 'testimonial_settings_page');
add_action('admin_init', 'register_testimonial_settings');



?>