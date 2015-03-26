<?php

function dbConnect()
{	
	// Get the connection information
	// Get the username and password to James
	$username = "cs4220";
	$password = "";
	$hostname = "james.cedarville.edu"; 
	$database = "cs4220";

	// Connect to the database
	$link = mysql_connect( $hostname, $username, $password );
	
	// If the connection could not be established
	if ( !$link )
	{
		die( 'Could not connect: ' . mysql_error() );
	}

	$db_selected = mysql_select_db( $database, $link );
	
	// Connect to a specific database
	if ( !$db_selected )
	{
		die ( "Can't use " . $database . ": " . mysql_error() );
	}
	
	//echo "Connected to MySQL<br />";
	
	return $link;
}

function dbClose( $link )
{
	// Close the database
	mysql_close( $link );
	
	//echo "Closed connection to MySQL<br />";
}

?>