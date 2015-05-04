<?php
/*
Plugin Name: JF Form
Plugin URI: http://www.joelucky39.com
Description: This plugin puts a dynamic contact form on your site.
Version: 1.0
Author: Joe Fitzgerald
Author URI: http://www.joelucky39.com
License: GPL2
*/

// Version
define('JOE_FORM_VERSION', '1.0');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

If (is_plugin_active('jf_form/jf_form.php')) {
	define('JOE_FORM_URL', plugin_dir_url(__FILE__));
	define('JOE_FORM_PATH', plugin_dir_path(__FILE__));
} else {
	define('JOE_FORM_URL', trailingslashit(get_template_directory_uri() . '/jf_form'));
	define('JOE_FORM_PATH', trailingslashit(get_template_directory() . '/jf_form'));
}
	$upload_dir = wp_upload_dir();
	define('JOE_FORM_UPLOADS_PATH', $upload_dir['basedir'] . "/JOE");
	define('JOE_FORM_UPLOADS_URL', $upload_dir['baseurl'] . "/JOE");
        
// Localization textdomain
define('uds_billboard_textdomain', 'uBillboard');
load_plugin_textdomain(uds_billboard_textdomain, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/');

// instantiate the JF_FORM class
require_once('class/jf_form.php');

// Load jf_form javascripts
 function joe_form_scripts() {
            $ver = rand(1, 10);
            wp_enqueue_script( 'joe_form_js', JOE_FORM_URL . 'js/joe_form.js', array(), $ver, false );
            wp_enqueue_script( 'angularjs_js', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js', array(), $ver, false );
}
add_action( 'wp_enqueue_scripts', 'joe_form_scripts' );

// Load jf_form Styles
	$handle = 'joe_form_style';
	$src = JOE_FORM_URL.'css/joe_form.css';
	$deps = '';
	$ver = rand(1, 10);
	$media = 'all';
	wp_enqueue_style( $handle, $src, $deps, $ver, $media );

//================================================================
// Admin Menu Items
//================================================================
add_action('admin_menu', 'jf_form_menu');
function jf_form_menu (){
	$page_title = "JF Form";
	$menu_title = "JF Form";
	$capability = "edit_pages";
	$menu_slug = "jf_form_menu";
	$function = "jf_form_main";
	$icon_url = "dashicons-media-text";
	$position = "90.00";
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	$parent_slug = $menu_slug;
	$page_title = "View Entries";
	$menu_title = "View Entries";
	$capability = $capability;
	$menu_slug = "jf_form_view";
	$function = "jf_form_views";
	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
}

function jf_form_main()
{
	if(!current_user_can('edit_pages')) {
		wp_die(__('You do not have sufficient permissions to access this page', uds_billboard_textdomain));
	}
    $ver = rand(1, 10);
    wp_register_script( 'jf_scripts' , JOE_FORM_URL.'js/joe_form.js', array('jquery'), $ver );
    wp_enqueue_script( 'jf_scripts', array('jquery') );
    $jf_form = new jf_form();
    $formName = $jf_form->getFormName();
    $recipients = $jf_form->getRecipients();
    if($_POST['jf_action'] == 'insertFormName'){
        $insertFormName = $jf_form->insertFormName($_POST['formName']);
    }
    if($_POST['jf_action'] == 'insertRecipients'){
        $insertRecipients = $jf_form->insertRecipients($_POST['recipients']);
    }
	include 'pgs/jf_form_admin.php';
}
function jf_form_views()
{
	if(!current_user_can('edit_pages')) {
		wp_die(__('You do not have sufficient permissions to access this page', uds_billboard_textdomain));
    }
    $ver = rand(1, 10);
    wp_register_script( 'jf_scripts' , JOE_FORM_URL.'js/joe_form.js', array('jquery'), $ver );
    wp_enqueue_script( 'jf_scripts', array('jquery') );
    $jf_form = new jf_form();
    $max_results = 20;
    if($_GET['limit']){
        $limit = $_GET['limit'].','.$max_results;
        $next_set = $_GET['limit'] + $max_results;
    }else{
        $limit = "0,".$max_results;
        $next_set = $max_results;
    }
    $entries = $jf_form->viewEntries($limit);
	include 'pgs/jf_form_admin_view.php';
}

// Adds dashicons to the admin section
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
//================================================================
// End Admin Menu Items
//================================================================

//================================================================
// Page Insert Items
//================================================================
	//======== User Form Page ===============
	// for adding a shortcode into a wp page's content
        add_shortcode('jf_form', 'jf_form');
        function jf_form($args = array()){
                $jf_form = new jf_form(); // instantiate jf_class object
                $programs = $jf_form->programList();
                $formName = $jf_form->getFormName();
                ob_start();
                ?>
                <form method="post" action="/form_cgi/" onsubmit="return checkForm()" id="jf_form_form">
                <?php include('pgs/stripped_form.php'); ?>
                <input type="hidden" name="action" id="action" value="submit">
                </form>
                <?php
                return ob_get_clean();
        }
	//======== End User Form Page ===============
        //
        //========== FORM HANDLER ===================
        add_shortcode('form_cgi', 'form_cgi');
        function form_cgi($args = array()){
            $jf_form = new jf_form();
            ob_start();
            foreach($_POST AS $key => $value){
                echo $key." = ". $value . "<br>";
            }
                if($_POST['action']=="submit") {
                    $insertLead = $jf_form->insertJFLead($_POST);
                    echo "LeadID=".$insertLead."<br>";
                    $emailLead = $jf_form->emailJFLead($_POST);
                    
                    	$postfields = "firstName=".$_POST['firstName']."&lastName=".$_POST['lastName']."&email=".$_POST['email']."&phone=".$_POST['phone']."&ddlprogram=".$_POST['ddlprogram'];

                        // Initialize your cURL session
                        $ch = curl_init();

                        // Follow any Location headers
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

                        // tell cURL what file to open
                        curl_setopt($ch, CURLOPT_URL, 'https://secure.velocify.com/Import.aspx?Provider=Nuovometo&Client=HealthstaffTrainingInstitute&CampaignId=1042');
                        // tell cURL to populate the $ch variable with resutls
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        // Alert cURL to the fact that we're doing a POST, and pass the associative array for POSTing
                        curl_setopt($ch, CURLOPT_POST, 1);

                        // Post your values to the opened script
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

                        // Execute your cURL script
                        $output = curl_exec($ch);
                        // Free system resources taken by cURL
                        curl_close($ch);
                    
                }
            ?>
            <script language="JavaScript">
                jQuery( document ).ready(function() {
                    // Handler for .ready() called.
                    window.location.assign("thank-you/");
                });
            </script>
            <?php
            //If relocation does not work.. apply a blank template to the form_cgi page.
            header("Location: /thank-you", true, 301);
            ob_end_flush();
            exit();
        }
//================================================================
// End Page Insert Items
//================================================================


////////////////////////////////////////////////////////////////////////////////
// HOOK FUNCTIONS
////////////////////////////////////////////////////////////////////////////////
    //============= ACTIVATION HOOKS =====================
    register_activation_hook(__FILE__, 'jf_form_install_hook');
    register_uninstall_hook(__FILE__, 'jf_form_uninstall_hook');
    register_deactivation_hook(__FILE__, 'jf_form_uninstall_hook');

global $jf_db_version;
$jf_db_version = "1.0";

function jf_form_install_hook(){
	global $wpdb;
	global $jf_db_version;
	$prefix = 'jf_';

	$table_name = $prefix . "submission";
	$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		create_time timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
		status enum('y','n') NULL DEFAULT 'y',
		PRIMARY KEY id (id),
		KEY status (status)
	);";
	$table_name = $prefix . "submission_values";
	$sql .= "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		create_time timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
		submission_id int(11) NOT NULL,
        key_name varchar(100) NOT NULL,
        submission_value varchar(250) NULL,
		status enum('y','n') NULL DEFAULT 'y',
		PRIMARY KEY id (id),
                KEY submission_id (submission_id),
                KEY key_name (key_name),
		        KEY status (status)
	);";
	$table_name = $prefix . "form_settings";
	$sql .= "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		create_time timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
		form_name varchar(50) NULL,
                recipients text NULL,
		PRIMARY KEY id (id),
		KEY form_name (form_name)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( "jf_db_version", $jf_db_version );

    $table_name = $prefix . "form_settings";
    $sql = "INSERT INTO $table_name (form_name) VALUES ('Contact Form');";
    $wpdb->query($sql);
}

function jf_form_uninstall_hook(){
	global $wpdb;
	$prefix = 'jf_';
        
	$table_name = $prefix . "submission";
	$sql = "DROP TABLE IF EXISTS $table_name;";
    $wpdb->query($sql);
        
	$table_name = $prefix . "submission_values";
	$sql = "DROP TABLE IF EXISTS $table_name;";
	$wpdb->query($sql);
        
        $table_name = $prefix . "form_settings";
	$sql = "DROP TABLE IF EXISTS $table_name;";
	$wpdb->query($sql);
}

////////////////////////////////////////////////////////////////////////////////
// END HOOK FUNCTIONS
////////////////////////////////////////////////////////////////////////////////