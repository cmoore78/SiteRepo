<?php
/// library functions ... version 1

function footer()
{
    echo "</hr><center>";
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
    echo "</center>";
}

function secure_startup()
{
    session_start();
    
    if ( !isset( $_SESSION['user'] ) )
    {
    // bounce on invalid login
    header("Location: login.php");
    }    

}

function pageheader()
{
    echo "</hr><center>";
    echo "<p>CSC-155</p>";
    echo "<p>Caleb Moore</p>";
    echo "<img src='library/icon.jpg'></img>";
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

?>
