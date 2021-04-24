<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore 
CSC-155 -->

<html>
<head>
<title>Caleb's Site</title>
<?php
require("library/functions.php");
secure_startup();
pageheader();
?>
</head>
<body>
<h2> Welcome [<?php echo $_SESSION['group'];?>] <?php echo $_SESSION['user']; ?> </h2>
<?php
if(isset($_COOKIE["nameCookie"])) {
    echo "Or should I call you " . $_COOKIE["nameCookie"];
}
?>
<?php footer() ?>
</body>
</html>
<html>
