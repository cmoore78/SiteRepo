<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore 
CSC-155 -->

<html>
<head>
<title>Caleb's Site</title>
<?php

require("library/functions.php");

session_start();
$conn = getConn();

if ( isset($_POST["submit"]) )
{ 
    $row = lookupUsername($conn, getPost("155username"));
    if ($row == 0) 
    {
    echo "Invalid -->username and/or password";
    }
    else if ( password_verify($_POST["155password"], $row['encrypted_password']
))
    {
    $_SESSION["user"] =  getPost("155username");
    $_SESSION["group"] =  $row['usergroup'];
    header("Location: welcome.php");
    }
    else 
    {
    echo "Invalid username and/or -->password";
    }
}

?>
</head>
<body>
<form method='POST'>
Username: <input type='text' name='155username' value='<?php echo
getPost("155username");?>'> <br>
Password: <input type='password' name='155password' value='<?php echo
getPost("155password");?>'> <br>
Preferred Name: <input type='text' name='name' value='<?php echo
getPost("name");?>'> <br>
<input type='submit' name='submit' value='Log In'>
</form>
<a href='newuser.php'>Create new account</a>
<p>Hint: The user is 'caleb' and the password is '5555'</p>

<?php
$name = getPost("name");
setcookie("nameCookie", $name, time() + 6000);

?>

</body>
</html>
