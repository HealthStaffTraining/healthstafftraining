<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
	// tell people trying to access this file directly goodbye...
	exit('This file can not be accessed directly...');
}

// Define the class
class jf_form{
		//constructor
		//=============================================
		function __construct(){
                    //echo "You are here";
		}
                
        public function getRecipients(){
			GLOBAL $wpdb;
			$sql = "SELECT recipients FROM jf_form_settings LIMIT 1";
			$mydata = $wpdb->get_row($sql);
            //kim.e@healthstafftraining.com
			return $mydata->recipients;
		}
                
        public function getFormName(){
			GLOBAL $wpdb;
			$sql = "SELECT form_name FROM jf_form_settings LIMIT 1";
			$mydata = $wpdb->get_row($sql);
			return $mydata->form_name;
		}

        public function programList(){
			$list = array(
				"1"=>"Drug and Alcohol Counseling",
				"2"=>"Drug and Alcohol Counseling Online",
				"3"=>"Clinical & Administrative Medical Assistant",
				"31"=>"Administrative Medical Assistant",
				"32"=>"Clinical Medical Assistant",
				"5"=>"Computerized Office & Accounting",
				"7"=>"Pharmacy Technician",
                "9"=>"Medical Billing & Coding",
				//"8"=>"Pharmacy Technician Online",
			);
			
			return $list;
		}

        public function viewEntries($limit){
            GLOBAL $wpdb;
            $sql = "SELECT * FROM jf_submission ORDER BY ID DESC LIMIT $limit";
            $mydata = $wpdb->get_results($sql);
            return $mydata;
        }

        public function getLeadDetail($id){
            GLOBAL $wpdb;
            $sql = "SELECT * FROM jf_submission_values WHERE submission_id = '$id' ORDER BY ID ASC";
            $mydata = $wpdb->get_results($sql);
            return $mydata;
        }

        public function getLeadDetailName($id){
            GLOBAL $wpdb;
            $sql = "SELECT * FROM jf_submission_values WHERE submission_id = '$id' ORDER BY ID ASC";
            $mydata = $wpdb->get_results($sql);
            $name = '';
            foreach($mydata AS $key){
                switch($key->key_name){
                    case "name":
                        $name.=$key->submission_value." ";
                        break;
                    case "firstName":
                        $name.=$key->submission_value." ";
                        break;
                    case "first_name":
                        $name.=$key->submission_value;
                        break;
                    case "lastName":
                        $name.=$key->submission_value;
                        break;
                    case "last_name":
                        $name.=$key->submission_value;
                        break;
                }
            }
            return $name;
        }
                
        public function insertJFLead($data){
            $submissionID = $this->createSubmission();
            foreach($data AS $key => $value){
                $insertValues = $this->insertValues($submissionID, $key, $value);
            }
            return $submissionID;
        }
                
        public function emailJFLead($data){
            $form_name = $this->getFormName();
            $to = $this->getRecipients();
            $subject = 'A '.ucwords($form_name).' Submission';
            $message = 'The information captured is:<br>';
            foreach($data AS $key => $value){
                $message .= '<b>'.$key.':</b> '.strip_tags($value).'<br>';
            }
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: webmaster@healthstafftraining.com' . "\r\n" .
            'Reply-To: webmaster@healthstafftraining.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        }

        public function createSubmission(){
            GLOBAL $wpdb;
            $wpdb->insert(
                'jf_submission',
                array(
                    'status' => "y"
                ),
                array(
                    '%s'
                )
            );

            return $wpdb->insert_id;

        }

        public function insertValues($submissionID, $key, $value){
            GLOBAL $wpdb;
            $wpdb->insert(
                'jf_submission_values',
                array(
                    'submission_id' => $submissionID,
                    'key_name' => $key,
                    'submission_value'=>strip_tags($value),
                    'status'=>"y"
                ),
                array(
                    '%d',
                    '%s',
                    '%s',
                    '%s'
                )
            );

            return $wpdb->insert_id;
        }

        public function insertFormName($name){
            GLOBAL $wpdb;
            $wpdb->update(
                'jf_form_settings',
                array(
                    'form_name' => strip_tags($name)
                ),
                array( 'id' => 1 ),
                array(
                    '%s'
                ),
                array( '%d' )
            );

        }


        public function insertRecipients($list){
            GLOBAL $wpdb;
            $wpdb->update(
                'jf_form_settings',
                array(
                    'recipients' => strip_tags($list)
                ),
                array( 'id' => 1 ),
                array(
                    '%s'
                ),
                array( '%d' )
            );

        }

/*
		public function updateTestimonial($student_id,$student_name,$program,$campus,$school,$summary){
			GLOBAL $wpdb;
			$wpdb->update(
				'jf_testimonial',
				array(
					'student_id' => strip_tags(addslashes($student_id)),
					'student_name' => strip_tags(addslashes($student_name)),
					'program'=>strip_tags(addslashes($program)),
					'campus'=>strip_tags(addslashes($campus)),
					'school'=>strip_tags(addslashes($school)),
					'summary'=>strip_tags($summary)
				),
				array( 'student_id' => $student_id ),
				array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				),
				array( '%s' )
			);
		}
*/

}

?>