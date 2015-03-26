<?php

include( '../session/session.php' );

start_session();

if ( !isset( $_SESSION[ 'username' ] ) )
{
	header( 'Location: index.php' );
}

?>

<html>

<head>
	<title>Secured Page</title>
</head>

<body>
	<p>This is a secured page with session: <b>
		<?php
			echo $_SESSION[ 'username' ];
		?>
	</b>
	<br />
	You can put your restricted information here.</p>
	<p><a href="../logout.php">Logout</a></p>
		
</body>

</html>