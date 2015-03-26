<?php

include( 'connect_to_database.php' );
include( 'session.php' );

// Connect to the database
dbConnect();

// Get the query from the database
$query = mysql_query( "SELECT id FROM BCD_Voting" );

// Get the data from the database
while ( $row = mysql_fetch_array( $query ) )
{
	echo "ID:" . $row{'id'} . "<br>";
}

// Start the session
start_session();

// Print the number of times a user has visited the page
echo page_count();
	
?>