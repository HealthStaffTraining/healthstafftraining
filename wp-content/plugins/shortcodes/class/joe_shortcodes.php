<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
	// tell people trying to access this file directly goodbye...
	exit('This file can not be accessed directly...');
}

// Define the class
class anthem_shortcodes{
		//constructor
		//=============================================
		function __construct(){
			//echo "you made it bruva";
			$this->myURL = "http://www.anthem.edu/anthem-programs/";
			//$this->myURL = 'http://staging.anthem.amazon/anthem-programs/';
		}

		public function getNursingFeed(){
			GLOBAL $wpdb;
			$query = "SELECT * FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY ID DESC LIMIT 2";
			$myResponse = $wpdb->get_results($query);
			$html = "";
			$x = 0;
			foreach($myResponse AS $m){
				$html.= "<div id='feed_title'><a href='". $m->guid. "' class='feed_link'>".$m->post_title . "&raquo;</a></div><div>".substr($m->post_content, 0, 200)."... <a href='". $m->guid. "'>Full Article&raquo;</a></div>";
				if($x == 0){
					$html.="<hr>";
				}
				$x++;
			}

			return $html;
		}

		public function getVideoInfo($student_id){
			GLOBAL $wpdb;
			$sql = "SELECT id, student_name, program, campus FROM jf_testimonial WHERE student_id = '".$student_id."' LIMIT 1";
			$mydata = $wpdb->get_row($sql);
			return $mydata;
		}

		public function getStudentImg($student_id){
			GLOBAL $wpdb;
			$mydata = $wpdb->get_row("SELECT img_path FROM jf_testimonial_imgs WHERE student_id = '".$student_id."' and status = 'y' ORDER BY id DESC LIMIT 1");
			return $mydata;
		}

		public function getLocationInfo($campus){
			$result = '';

			// initialize the cURL session
			$ch = curl_init();
			$myURL = $this->myURL."?list=3&campus=".$campus;

			//  Specify headers
			$headers = array("Content-Type: application/json");
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			//print out reply headers: 0 no 1 yes
			curl_setopt($ch, CURLOPT_HEADER, 0);

			//print out reply headers: 0 no 1 yes
			curl_setopt($ch, CURLOPT_NOPROGRESS, 0);

			// Follow any Location headers
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

			// Set the URL
			curl_setopt($ch, CURLOPT_URL, $myURL);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //FALSE to stop cURL from verifying the peer's certificate.
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);// 2 to check the existence of a common name and also verify that it matches the hostname provided.

			// Tell cURL to return the results into the $ch variable as opposed to printing them out
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// Optionally set a timeout
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);

			// Execute your cURL script
			//curl_exec($ch);
			$output = curl_exec($ch);

			// close your session and free up the resources taken up by cURL
			curl_close($ch);


			/*
			$cc = array();
			$locations = $this->listAnthemLocations();
			$l = explode(',', $locations);
			foreach($l AS $L){
				$a = explode("_", $L);
					if(strlen($a[0]) > 1 && $a[0] != 'AOL'){
						$result .= $a[0]. " = " . strlen($a[0]) . "<br>";
						$p = $this->listCampusPrograms($a[0]);
						$b = explode(",", $p);
						foreach($b AS $B){
							$c = explode("_", $B);
							if($c[0] == $pid){// this campus offers the program
								$cc[] = $a[0];
							}
						}
					}
			}
			echo "<hr><hr>";
			print_r($cc);
			*/
			return $output;
		}

		public function formatPhone($phone){
			$phone = str_replace("(","",$phone);
			$phone = str_replace(")",".",$phone);
			$phone = str_replace("-",".",$phone);
			return $phone;
		}

}

?>