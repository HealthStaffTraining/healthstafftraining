<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
  // tell people trying to access this file directly goodbye...
  exit('This file can not be accessed directly...');
}

/* E X A M P L E    U S E */
/*
include_once("dynEmail.php");

$className = new dynEmail();

$method = $dynEmail->sendEmail($to,$subject,$message);

unset($dynEmail);
*/

	class dynEmail{
		//constructor
		//=============================================
		function dynEmail(){
			//print "<br>Looks like you've made it, Bruv.<br>";
			$this->apikey = '8234f3aaf38c83e9054239232347bc56'; // the api key for the application
		}

		//function to parse the email addresses and send the email
		function sendEmail($to, $subject, $message){
			$to = trim($to);
			$to = explode(",", $to);
			$this->subject = $subject;
			$this->message = base64_encode($message);

			foreach($to AS $t){
				$s = $this->doEmail(trim($t));
				//echo $s['response']['status'] . "<hr>";
				if(trim($s['response']['status']) != "200"){
					return "There was a problem with ".$t.". - ".$response['response']['message'];
					break;
				}
			}

			return "200";
		}

		// this function does the actual sending
		function doEmail($to){
						// Define values
						//HTTP call type - POST
						$type = 'POST';

						//We will be encapsulating communication in JSON
						$returnType = 'json';
						$returnTypes =   array(
							'xml' => 'text/xml',
							'json' => 'application/json',
							'html' => 'text/html'
						);

						$params = array(
							//APIKEY must be setup on the integration page of the account
							//FROMADDRESS must be added as an approved sender for the account priot to sending
							'apikey' =>       $this->apikey,
							'from'           =>       'admissions@careercollege.edu',
							'to'             =>       $to,
							'subject'        =>       $this->subject,
							//'bodytext'       =>       'This is only a test.  TYVM',
							'bodyhtml' => $this->message
						);

						//Turn paramaters into REST style HTTP URI
						$data = http_build_query($params, '', '&');

						// Initialize curl
						$ch = curl_init();

						try{
							//Configure cURL fields
							curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
							curl_setopt($ch, CURLOPT_POST, 1);
							curl_setopt($ch, CURLOPT_TIMEOUT, 10);

							//Set REST URI for sending
							curl_setopt($ch, CURLOPT_URL, 'http://emailapi.dynect.net/rest/' .    $returnType . '/send');
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Accept: ' . $returnTypes[$returnType]));

							// Send request
							$responseBody = curl_exec($ch);

							// Get additional request information
							$responseInfo = curl_getinfo($ch);

							curl_close($ch);
						}catch (InvalidArgumentException $e){
							curl_close($ch);
							throw $e;
						}catch (Exception $e){
							curl_close($ch);
							throw $e;
						}
						// decode the response
						$response = json_decode($responseBody, true);
						// Display the returned value
						//echo '<pre>',$responseBody,'</pre>';

						return $response;

		}

	} // end class
?>