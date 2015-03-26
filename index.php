<?php

include( 'login/logon.php' );
include( 'session/session.php' );

/** BEGIN DEFINE FUNCTIONS **/
/* 
 * Prints out the name of the logged in user
 */
function display_full_name()
{
	// Connect to the database
	$link = dbConnect();
	
	// If it is set, then display the full name of the user
	if ( isset( $_SESSION[ 'username' ] ) )
	{
		$query 	= mysql_query( "SELECT first_name, last_name FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
		$row	= mysql_fetch_array( $query );
		
		echo $row[ "first_name" ] . ' ' . $row[ "last_name" ];
	}
	// If it is not set, just print guest
	else
	{
		echo "Guest";
	}
	
	// Close the database
	dbClose( $link );
}

/* 
 * Display secured information
 */
function display_secured_information()
{
	$link = dbConnect();
	
	$query 	= mysql_query( "SELECT account_type, last_name FROM BCD_User WHERE username = '" . $_SESSION[ 'username' ] . "'" );
	$row	= mysql_fetch_array( $query );
	
	// Set the account type
	$account_type = $row[ "account_type" ];
	
	if ( isset( $_SESSION[ 'username' ] ) )
	{
		echo '<p><a href="logout.php">Logout</a></p>';
	}
	
	dbClose( $link );
}
/** END DEFINE FUNCTIONS **/

// Start the session
start_session();

?>

<html>

<head>
	<title>Login</title>
</head>

<body>
	<strong>Hello, </strong>
	<?php
		echo "<strong>";
		display_full_name();
		display_secured_information();
		echo "</strong>";
	?>
	<form method="post" action="login/validate_user.php">
	<?php
		user_dropdown_populate();
	?>
	<p>Password: <input type="text" name="password" /></p>
	<p><input type="submit" value="Let me in" /></p>
	</form>
	
</body>

</html>