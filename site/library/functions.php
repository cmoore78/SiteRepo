<?php
/// library functions ... version 1

function footer()
{
    echo "</hr><center>";
    echo "<a href='welcome.php'>Home Page</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item1.php'>Bitcoin</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item2.php'>Ethereum</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item3.php'>Binance Coin</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item4.php'>Cardano</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='checkout.php'>Checkout</a>"; 
    echo " &nbsp; | &nbsp; ";
    echo "<a href='logout.php'>Logout</a>";

    if ($_SESSION['group'] == "admin")
    {
        echo " &nbsp; | &nbsp; ";
        echo "<a href='userdata.php'>User Data</a>";
        echo " &nbsp; | &nbsp; ";
        echo "<a href='purchasedata.php'>Purchase Data</a>";

    }
    echo "</center>";
    
    echo "<center>"; 
    echo "<img src='images/btc.jpg'></img>";
    echo "</center>";
}

function admin_startup()
{
    session_start();
    
    if ( !isset( $_SESSION['user'] ) )
    {
    // bounce on invalid login
    header("Location: login.php");
    }    
    if ( $_SESSION['group'] == 'user' ) 
    {
    // return to welcome
    echo "ACCESS DENIED! This page may only be acessed by an administrator.";
    echo "SESSION: " . $_SESSION['group'];
    echo "group parameter " . $group; 
    header("Location: welcome.php");
    }
}

function secure_startup($group='user')
{
    session_start();
    
    if ( !isset( $_SESSION['user'] ) )
    {
    // bounce on invalid login
    header("Location: login.php");
    }    
    if ( $group != 'user' && $_SESSION['group'] != $group ) 
    {
    // return to welcome
    echo "Bounce to welcome";
    echo "SESSION: " . $_SESSION['group'];
    echo "group parameter " . $group; 
    // header("Location: welcome.php");
    }
}

function pageheader()
{
    echo "</hr><center>";
    echo "<p>CSC-155</p>";
    echo "<p>Caleb Moore</p>";
    echo "<img src='images/icon.jpg'></img>";
    echo "</center>";
}

function getSession( $name )  #version 1
{
# check to see if it been used, if it has, return it
    if ( isset($_SESSION[$name]) ) 
    {
        return $_SESSION[$name];
    }
    return "";
}

function lookupUsername($conn, $username)
{
    // echo "looking up $username";
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0)
    {
    // not found 
    // echo 'not found';
    return 0;
    }
    else if ($num_rows > 1)
    {
    // too many results ... exit!
    // echo 'too many found';
    header("Location: logout.php");
    }
    else 
    {
    // one result, return the row.
    // echo 'one found';
    return $result->fetch_assoc();     
    }
}    

function getConn()
{
    // Create connection object
    $user = "cmoore78";  
    $conn = mysqli_connect("localhost",$user,$user,$user);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
    }
    return $conn;
}

function getPost( $name )  #version 1
{
# check to see if it been used, if it has, return it
    if ( isset($_POST[$name]) ) 
    {
        return htmlspecialchars($_POST[$name]);
    }
    return "";
}


?>
