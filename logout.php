<?php

include( 'session/session.php' );

// Start session
start_session();

// End the session
end_session();

// Redirect to the main page
header( 'Location: index.php' );

?>