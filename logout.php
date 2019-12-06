<!DOCTYPE html>
<html>
<head>
	<title>Tyne Events</title>
	<meta charset="UTF-8" />
</head>
<body>
<?php	
session_start();     				/* starting the session */
session_destroy();					/* starting the session */	
header('Location:index.php');		/* redirect the user to index page after logging out */

?>
</body>
</html>

