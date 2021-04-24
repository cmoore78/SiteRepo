<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->

<html>
<head>
<title>Cardano</title>
<?php
require("library/functions.php");
secure_startup();
pageheader();

// are we reloading or is this the first time?
if (isset($_POST['submit'])) {
    // reload
    if ($_POST['submit'] == 'Buy One')
    {
    $_SESSION['cardano']++;
    }
    else if ($_POST['submit'] == 'Sell All')
    {
    $_SESSION['cardano'] = 0;
    }
    else if ($_POST['submit'] == 'Sell One')
    {
    if ($_SESSION['cardano'] > 0)
    {
        $_SESSION['cardano']--;
    }
    }
}
else
{
    // initialize if it isn't already
    if (!isset($_SESSION['cardano'])) 
    {
    $_SESSION['cardano'] = 0;
    }
}

?>   
</head>
<body>
<h1>Invest in Ethereum killer. Buy your first Cardano. Maybe someday it does
something.</h1>
<form method='POST'>
<input type='submit' name='submit' value='Buy One'>
<input type='submit' name='submit' value='Sell One'>
<input type='submit' name='submit' value='Sell All'>
</form>

<p> Your wallet now contains <?php echo $_SESSION['cardano'] ?> cardano. </p>

<?php footer() ?>
</body>
