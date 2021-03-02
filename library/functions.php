<?php
/// library functions ... version 1

function footer()
{
    echo "</hr><center>";
    echo "<a href='item1.php'>Item one</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item2.php'>Item Two</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item3.php'>Item Three</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='item4.php'>Item Four</a>";
    echo " &nbsp; | &nbsp; ";
    echo "<a href='checkout.php'>Checkout</a>";
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

?>
