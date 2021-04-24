<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->

<html>
<head>
<title>Ethereum</title>
<?php
require("library/functions.php");
secure_startup();
pageheader();

// are we reloading or is this the first time?
if (isset($_POST['submit'])) {
    // reload
    if ($_POST['submit'] == 'Buy One')
    {
    $_SESSION['ethereum']++;
    }
    else if ($_POST['submit'] == 'Sell All')
    {
    $_SESSION['ethereum'] = 0;
    }
    else if ($_POST['submit'] == 'Sell One')
    {
    if ($_SESSION['ethereum'] > 0)
    {
        $_SESSION['ethereum']--;
    }
    }
}
else
{
    // initialize if it isn't already
    if (!isset($_SESSION['ethereum'])) 
    {
    $_SESSION['ethereum'] = 0;
    }
}

?>   
</head>
<body>
<h1>Invest in decentralized finance. Buy your first Ethereum. Pay 50 dollars per transaction in gas fees.</h1>
<form method='POST'>
<input type='submit' name='submit' value='Buy One'>
<input type='submit' name='submit' value='Sell One'>
<input type='submit' name='submit' value='Sell All'>
</form>

<p> Your wallet now contains <?php echo $_SESSION['ethereum'] ?> ethereum. </p>

<?php footer() ?>
</body>
