# hibp-chk
A PHP function for implementing password checks against  Troy Hunt's 'Have I been Pwned' dataset API.

		// hibp-chk.php
		// 20180226-kc @RawInfoSec
				
		// Basic PHP function for determining if a POSTed password is in Troy Hunt's "Have I been pwned?" dataset.
		// Please see https://haveibeenpwned.com/API/v2 for more information on the service API behind this.
		
		// Provided as reference for others to build upon. Shortcuts were taken!
    
		// checkpassword() will return TRUE if currently POSTed password is safe to use.
    // (expects password field to be named "password", which it should anyway.)
