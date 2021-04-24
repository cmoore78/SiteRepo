<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->

<html>
<head>
<title>Logout complete!</title>
<?php
require("library/functions.php");
secure_startup(); 

unset($_SESSION['user']);

header( "refresh:5;url=login.php" );
?>
</head>
<body>

<h1>Logout Complete!</h1>

</body>
