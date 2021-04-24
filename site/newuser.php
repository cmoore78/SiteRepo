<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore 
CSC-155 -->
<html>
<head>
<title>Create New User</title>
<?php 

// php library loading first
require("library/functions.php");
$conn = getConn();

// local php functions go here 

// local php startup code goes here

$formerror = "&nbsp;";
lookupUsername($conn, "test");

if (isset ($_POST["submit"]))
{
    if ($_POST["submit"] == "Create New User")
    {
    // Right way to do it!
    // prepare and bind
    if (empty($_POST['username155']))
    {
        $formerror = 'USERNAME REQUIRED';
    } 
    else if (empty($_POST['password155']))
    {
        $formerror = 'PASSWORD REQUIRED';
    } 
    else if ( $_POST['password155'] != $_POST['password155confirm'])
    {
        $formerror = 'PASSWORDS DO NOT MATCH';
    } 
    else if ( lookupUsername($conn, $_POST['username155']) != 0 )
    {
        $formerror = 'USERNAME ALREADY EXISTS';
    }
    else {
        $stmt = $conn->prepare("INSERT INTO users (username, encrypted_password, email, usergroup) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $encrypted_password, $email, $usergroup);
        // set parameters and execute
        $username = getPost('username155');
        $encrypted_password = password_hash($_POST['password155'], PASSWORD_DEFAULT);
        $email = getPost('email155');
        $usergroup = getPost('usergroup155');
        
        $stmt->execute();
        header("Location: login.php");
    }
    }
    else  
    {
       header("Location: login.php");
    }
}
?>
</head>
<body>
<table align='center'>
<form method='POST'>
<tr><td align='right'>New Username:</td><td><input type='text' name='username155' value=''></td></tr>
<tr><td align='right'>New Password:</td><td><input type='password' name='password155' value=''></td></tr>
<tr><td align='right'>Confirm password:</td><td><input type='password' name='password155confirm' value=''></td></tr>
<tr><td align='right'>Email:</td><td><input type='text' name='email155' value=''></td></tr>
<tr><td align='right'>User Group:</td><td><select name='usergroup155'>
<option>user</option>
<option>admin</option>
</select>
</td></tr>
<tr><td colspan='2' align='center'><?php echo $formerror;?></td></tr>
<tr><td colspan='2' align='center'>
<input type='submit' name='submit' value='Create New User'>
<input type='submit' name='submit' value='Cancel'>
</td></tr>
</form>

</body>
</html>
