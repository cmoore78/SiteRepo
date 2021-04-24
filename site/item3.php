<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->

<html>
<head>
<title>BNB</title>
<?php
require("library/functions.php");
secure_startup();
pageheader();

// are we reloading or is this the first time?
if (isset($_POST['submit'])) {
    // reload
    if ($_POST['submit'] == 'Buy One')
    {
    $_SESSION['bnb']++;
    }
    else if ($_POST['submit'] == 'Sell All')
    {
    $_SESSION['bnb'] = 0;
    }
    else if ($_POST['submit'] == 'Sell One')
    {
    if ($_SESSION['bnb'] > 0)
    {
        $_SESSION['bnb']--;
    }
    }
}
else
{
    // initialize if it isn't already
    if (!isset($_SESSION['bnb'])) 
    {
    $_SESSION['bnb'] = 0;
    }
}

?>   
</head>
<body>
<h1>Invest in the best centralized exchange. Buy your first BNB. Just don't live in the United States.</h1>
<form method='POST'>
<input type='submit' name='submit' value='Buy One'>
<input type='submit' name='submit' value='Sell One'>
<input type='submit' name='submit' value='Sell All'>
</form>

<p> Your wallet now contains <?php echo $_SESSION['bnb'] ?> bnb. </p>

<?php footer() ?>
</body>
