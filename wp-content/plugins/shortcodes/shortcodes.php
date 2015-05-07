<?php
/*
Plugin Name: Joe_Shortcodes
Plugin URI: http://www.nuovometo.com
Description: This plugin puts short codes into content pages
Version: 1.0
Author: Joe Fitzgerald
Author URI: http://www.nuovometo.com
License: GPL2
*/

// Version
define('JOE_SHORTCODE_VERSION', '1.0');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

add_filter('widget_text', 'do_shortcode');//Allows shortcodes to be put into widgets in the admin

	define('JOE_SHORTCODES_URL', plugin_dir_url(__FILE__));
	define('JOE_SHORTCODES_PATH', plugin_dir_path(__FILE__));

	$ver = rand(1, 10);
	//wp_register_script( 'joe_short_scripts' , JOE_SHORTCODES_URL.'js/joe_shortcodes.js', array('jquery'), $ver );
	//wp_enqueue_script( 'joe_short_scripts', array('jquery') );

	$handle = 'joe_shortcode_style';
	$src = JOE_SHORTCODES_URL.'css/joe_shortcodes.css';
	$deps = '';
	$ver = rand(1, 10);
	$media = 'all';
	wp_enqueue_style( $handle, $src, $deps, $ver, $media );
        
        function joe_shortcode_scripts() {
            wp_enqueue_script( 'joe_short_js', JOE_SHORTCODES_URL . '/js/joe_shortcodes.js', array(), $ver, false );
            wp_enqueue_script( 'angularjs_js', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js', array(), $ver, false );
        }

        add_action( 'wp_enqueue_scripts', 'joe_shortcode_scripts' );

require_once('class/joe_shortcodes.php');

add_shortcode('angular_form', 'angular_form');
function angular_form($args = array()) {
	ob_start();
	include('pgs/angular_form.php');
	return ob_get_clean();
}

add_shortcode('coming_soon', 'coming_soon');
function coming_soon($args = array()){
	ob_start();
		include('pgs/coming_soon.php');
	return ob_get_clean();
}

add_shortcode('copyright_year', 'copyright_year');
function copyright_year($args = array()) {
	$year = DATE('Y');
	ob_start();
?>
	&copy; <?php echo $year; ?>
<?php
	return ob_get_clean();
}


add_shortcode('landingMap', 'landingMap');
function landingMap($args = array())
{
    // EXAMPLE: [printImage img="try.jpg"]
    $campus = $args['campus'];
    $key = $args['key'];
    $address = $args['address'];
    $city_state_zip = $args['city_state_zip'];
    $phone = $args['phone'];
    if (strlen($address) >= 1 && strlen($city_state_zip) >= 1) {
        ob_start();
        ?>
                <iframe
                    width="100%"
                    accesskey="" height="450"
                    frameborder="0" style="border:2px solid #0066a9; border-radius: 5px;"
                    src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key; ?>&q=<?php echo urlencode($address . "," . $city_state_zip);?>">
                </iframe>
        <?php
        return ob_get_clean();
    } else { // address is not set
        //echo do_shortcode( '[geoCampusMap key="'.$key.'" phone="'.$phone.'"]' );
    }
}

add_shortcode('general_sidebar','general_sidebar');
function general_sidebar($args = array()){
    echo "Booya!!";
}

?>