<?php

// Inialize session
include( '../connect_to_database/connect_to_database.php' );
include( '../session/session.php' );

// Connect to the database
$link = dbConnect();

// Start the session
start_session();

// Retrieve username and password from database according to user's input
$login = mysql_query( "SELECT * FROM BCD_User WHERE ( username = '" . 
					   mysql_real_escape_string( $_POST[ 'username' ] ) . 
					   "' ) AND ( password = '" . mysql_real_escape_string( $_POST[ 'password' ] ) . "' )" );

// Check username and password match
if ( mysql_num_rows( $login ) == 1 )
{
	// Set username session variable
	$_SESSION[ 'username' ] = $_POST[ 'username' ];
	
	$query 	= mysql_query( "SELECT account_type, last_name FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
	$row	= mysql_fetch_array( $query );
	
	// Set the account type
	$account_type = $row[ "account_type" ];
	
	dbClose( $link );
	
	// Check to see if the account type is admin
	if ( $account_type == '0' )
	{
		header( 'Location: ../admin/admin.php' );
	}
	else
	{
		header( 'Location: ../index.php' );
	}
}
else
{
	// Jump to login page
	header( 'Location: ../index.php' );
}

dbClose( $link );

?>