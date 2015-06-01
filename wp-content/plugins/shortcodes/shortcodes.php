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

    // Mobile DETECTION
    require_once 'class/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    if ( $detect->isMobile() ) { // Is a Mobile Device
        if( $detect->isTablet() ){// Any tablet device.
            global $USER_DEVICE;
            $USER_DEVICE = 'TABLET';
            define('USER_DEVICE', 'TABLET');
        }else{ // is a Phone
            global $USER_DEVICE;
            $USER_DEVICE = 'PHONE';
            define('USER_DEVICE', 'PHONE');
        }
    }else{ // is not a Mobile Device
        global $USER_DEVICE;
        $USER_DEVICE = 'COMPUTER';
        define('USER_DEVICE', 'COMPUTER');
    }// end if is a mobile device

    $handle = 'apb_site_style';
    if(USER_DEVICE == 'PHONE'){
        $src = '/wp-content/themes/blankslate/css/healthstaff_mobile.css';
    }else{
        $src = '/wp-content/themes/blankslate/css/healthstaff.css';
    }
    $deps = '';
    $ver = rand(1, 10);
    $media = 'all';
    wp_enqueue_style( $handle, $src, $deps, $ver, $media );

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

add_shortcode('contactMap', 'contactMap');
function contactMap($args = array())
{
    // EXAMPLE: [printImage img="try.jpg"]
    $campus = $args['campus'];
    $key = 'AIzaSyB4Wlw9Bq2CjqMkPuwWZ0tcGB_JwoW30ZU';
    $address = "28671 Calle Cortez";
    $city_state_zip = "Temecula, CA 92590";
    if (strlen($address) >= 1 && strlen($city_state_zip) >= 1) {
        ob_start();
        ?>
        <iframe
            width="100%"
            accesskey="" height="450"
            frameborder="0" style="border:0px solid #0066a9; border-radius: 0px;"
            src="https://www.google.com/maps/embed/v1/place?key=<?php echo $key; ?>&q=<?php echo urlencode($address . "," . $city_state_zip);?>">
        </iframe>
        <?php
        return ob_get_clean();
    } else { // address is not set
        //echo do_shortcode( '[geoCampusMap key="'.$key.'" phone="'.$phone.'"]' );
    }
}

add_shortcode('miniMap', 'miniMap');
function miniMap($args = array())
{
    // EXAMPLE: [printImage img="try.jpg"]
    $campus = $args['campus'];
    $key = 'AIzaSyB4Wlw9Bq2CjqMkPuwWZ0tcGB_JwoW30ZU';
    switch($campus){
        case 'Riverside':
            $address = "28671 Calle Cortez";
            $city_state_zip = "Temecula, CA 92590";
            $key = '!1m18!1m12!1m3!1d3326.7805968735233!2d-117.15674200000001!3d33.507085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80db7e3330ed526d%3A0xbf1151156b7fa02f!2sHealthStaff+Training+Institute!5e0!3m2!1sen!2sus!4v1433191284220';
            break;
        case 'San Bernardino':
            $address = "601 S. Milliken Avenue";
            $city_state_zip = "Ontario, CA 91761";
            $key = '!1m14!1m8!1m3!1d1652.7168657211073!2d-117.5575831!3d34.0583941!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c33564385cc5b7%3A0xff46dd52836d4978!2sHealthStaff+Training+Institute!5e0!3m2!1sen!2sus!4v1433191077107';
            break;
        case 'Orange County':
            $address = "1970 Old Tustin Road";
            $city_state_zip = "Santa Ana, CA 92705";
            $key = '!1m14!1m8!1m3!1d3316.924879717714!2d-117.83605!3d33.762607!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd9814b61da69%3A0x70514a0a4c1a130!2sHealthstaff+Training+Institute!5e0!3m2!1sen!2sus!4v1433191332094';
            break;
        default:
            $address = "28671 Calle Cortez";
            $city_state_zip = "Temecula, CA 92590";
            $key = '!1m18!1m12!1m3!1d3326.7805968735233!2d-117.15674200000001!3d33.507085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80db7e3330ed526d%3A0xbf1151156b7fa02f!2sHealthStaff+Training+Institute!5e0!3m2!1sen!2sus!4v1433191284220';
            break;
    }

    if (strlen($address) >= 1 && strlen($city_state_zip) >= 1) {
        ob_start();
        ?>
        <iframe
            width="100%"
            accesskey="" height="300"
            frameborder="0" style="border:0px solid #0066a9; border-radius: 0px;"
            src="https://www.google.com/maps/embed?pb=<?php echo $key; ?>">
        </iframe>
        <?php
        return ob_get_clean();
    } else { // address is not set
        //echo do_shortcode( '[geoCampusMap key="'.$key.'" phone="'.$phone.'"]' );
    }
}

add_shortcode('general_sidebar','general_sidebar');
function general_sidebar($args = array()){
    ob_start();
    ?>
    <div id="sidebar_locations">
        <div id="location">
            <b>Riverside Location</b><br>
            28671 Calle Cortez, Suite F<br>
            Temecula, CA 92590<br>
            <a href="https://www.google.com/maps/place/HealthStaff+Training+Institute/@33.507085,-117.156742,17z/data=!3m1!4b1!4m2!3m1!1s0x80db7e3330ed526d:0xbf1151156b7fa02f?hl=en-US" target="_blank">View Map</a>
        </div>
        <div id="location">
            <b>San Bernardino Location</b><br>
            601 S. Milliken Avenue, Suite A<br>
            Ontario, CA 91761<br>
            <a href="https://www.google.com/maps/place/HealthStaff+Training+Institute/@34.0583941,-117.5575831,18z/data=!4m6!1m3!3m2!1s0x80c33564385cc5b7:0xff46dd52836d4978!2sHealthStaff+Training+Institute!3m1!1s0x80c33564385cc5b7:0xff46dd52836d4978!6m1!1e1?hl=en-US" target="_blank">View Map</a>
        </div>
        <div id="location">
            <b>Orange County Location</b><br>
            1970 Old Tustin Road, Suite C<br>
            Santa Ana, CA 92705<br>
            <a href="https://www.google.com/maps/place/Healthstaff+Training+Institute/@33.762607,-117.83605,17z/data=!4m7!1m4!3m3!1s0x80dcd9814b61da69:0x70514a0a4c1a130!2sHealthstaff+Training+Institute!3b1!3m1!1s0x80dcd9814b61da69:0x70514a0a4c1a130?hl=en-US" target="_blank">View Map</a>
        </div>
    </div>
    <?php
    ob_end_flush();
}

?>