<?php
		
		// hibp-chk.php
		// 20180226-kc @RawInfoSec
				
		// Basic PHP function for determining if a POSTed password is in Troy Hunt's "Have I been pwned?" dataset.
		// Please see https://haveibeenpwned.com/API/v2 for more information on the service API behind this.
		
		// Provided as reference for others to build upon. Shortcuts were taken!
    
		// checkpassword() will return TRUE if currently POSTed password is safe to use.
		// (expects password field to be named "password", which it should anyway.)
		
    
		function checkpassword() {	
			$hash = utf8_encode(strtoupper(sha1(htmlspecialchars( $_POST['password'] ))));
			$k_anon = substr($hash,0,5);	
			
			$service_url = 'https://api.pwnedpasswords.com/range/'.$k_anon;
			$curl = curl_init($service_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
			$curl_response = curl_exec($curl);
			if ( $curl_response === false ) {
				echo "something bad happened";
			} else {
				if ( strpos( $curl_response, substr($hash,5) ) ) {
					return false;
				} else {
					return true;
				}
			}	
		}	
			
      
		// basic usage example

		if (isset( $_POST['password'] )) {		
			if ( checkpassword() ) {
				// password is safe for the moment, be well.
				echo "pwd seems good at the moment";
			} else {
				// password is pwned, mitigate here.
				echo "Password is pwned";
			}
		}
		
?>
		
	<!--- really ugly minimal test form -->
	
	<form action="" method="post">	
		<input type="password" name="password">
		<input type="submit">
	</form>
