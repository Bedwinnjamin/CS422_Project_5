<?php

include( '../connect_to_database/connect_to_database.php' );

/** BEGIN DEFINE FUNCTIONS **/
/* 
 * Allows the admin to create a user
 */
function create_user()
{
	// Check to see if the account is admin
	$account_type = account_type();
	
	if ( $account_type == 0 )
	{
		// Connect to the database
		$link = dbConnect();
		
		$query = mysql_query( "SELECT first_name, last_name FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
		
		// Close the database
		dbClose( $link );
	}
}
/** END DEFINE FUNCTIONS **/

?>