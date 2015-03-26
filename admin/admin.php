<?php

include( '../connect_to_database/connect_to_database.php' );
include( '../session/session.php' );

/** BEGIN DEFINE FUNCTIONS **/
function account_type()
{
	$link = dbConnect();
	
	$query 	= mysql_query( "SELECT account_type FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
	$row	= mysql_fetch_array( $query );
	
	// Set the account type
	$account_type = $row[ "account_type" ];
	
	dbClose( $link );
	
	// Check to see if the account type is admin
	if ( $account_type == '0' )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function create_user()
{
	// Connect to the database
	$link = dbConnect();
	
	// Get the account type from the database
	$query 	= mysql_query( "SELECT account_type FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
	$row	= mysql_fetch_array( $query );
	
	// Set the account type
	$account_type = $row[ "account_type" ];
	
	// Close the database
	dbClose( $link );
}
/** END DEFINE FUNCTIONS **/

// Start session
start_session();

?>

<html>

<head>

	<!-- Check to see if the user logged in is admin. If it is not, then print correct title -->
	<?php
	
		$is_admin = account_type();
		
		if ( $is_admin )
		{
			echo "<title>Admin Page</title>";
		}
		else
		{
			echo "<title>Forbidden</title>";
		}
	
	?>
</head>

<body>
	
	<!-- Check to see if the user logged in is admin. If it is not, then print error message -->
	<?php
	
		$is_admin = account_type();
		
		if ( !$is_admin )
		{
			echo "You do not have permission to view this page!<br />";
			echo 'Click <a href="../index.php">here</a> to go back';
		}
		
		if ( $is_admin )
		{
			
		}
	
	?>
	
</body>

</html>