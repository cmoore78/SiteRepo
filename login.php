<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore 
CSC-155 -->

<html>
<head>
<title>Caleb's Site</title>
<?php

require("library/functions.php");

function getPost( $name )
{

    if ( isset($_POST[$name]) ) 
    {
        return htmlspecialchars($_POST[$name]);
    }
    return "";
}

session_start();

if ( isset($_POST["submit"]) )
{ 
    if ( $_POST["155username"] == "caleb" and  $_POST["155password"] == "5555" )
    {
    $_SESSION["user"] = $_POST["155username"];
    header("Location: welcome.php");
    }
    else 
    {
    echo "Invalid username and password, use 'caleb' with the password '5555'";
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
<input type='submit' name='submit' value='Log In'>
</form>
<p>Hint: The user is 'caleb' and the password is '5555'</p>


</body>
</html>
