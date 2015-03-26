<?php

include( 'connect_to_database/connect_to_database.php' );

/*
 * Populate a dropdown menu with the usernames in the database
 */
function user_dropdown_populate()
{
	// Connect to database
	$link = dbConnect();
	
	// Get the query from the database
	$query = mysql_query( "SELECT username FROM BCD_User" );

	// Create the start of the pull down menu
	echo "<strong>Login: </strong>";
	echo '<br /><select name="username">';
	
	// Get the usernames and put them in the pull down menu
	while ( $row = mysql_fetch_array( $query ) )
	{
		echo "<option>" . $row{ 'username' };
	}
	
	echo "</select>";
}

?>

