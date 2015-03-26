<?php

/*
 * Starts the session
 * Should be used when a user wants to log on
 */
function start_session()
{
	// Start the session
	session_start();
}

/*
 * Ends the session
 * Should be destroyed when the user logs out
 */
function end_session()
{
	// End the session
	session_destroy();
}

/*
 * Calculates how many times a user has visited a page
 */
function page_count()
{
	// If view has been set, it will increment views
	if( isset( $_SESSION[ 'views' ] ) )
	{
		$_SESSION[ 'views' ] = $_SESSION[ 'views' ] + 1;
	}
	// If view has not been set, it will be set
	else
	{
		$_SESSION[ 'views' ] = 1;
	}

	return $_SESSION[ 'views' ];
}

?>