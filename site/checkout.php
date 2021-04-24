<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->

<html>
<head>
<title>Checkout</title>
<?php
require("library/functions.php");
secure_startup();
pageheader();

$conn = getConn();

if (isset ($_POST["submit"]))
{
    if ($_POST["submit"] == "Check Out")
    {
        $stmt = $conn->prepare("INSERT INTO purchases (username, date, btc, eth, bnb, ada) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiii", $username, $date, $btc, $eth, $bnb, $ada);
        $username = $_SESSION["user"];
        $t = time();
        $date = date("Y-m-d" , $t);
        $btc = getSession('bitcoin');
        $eth = getSession('ethereum');
        $bnb = getSession('bnb');
        $ada = getSession('ada');
        $stmt->execute();
    }
}
 
?>

</head>
<body>

<form method='POST'>
<table>
<tr>
<td>Bitcoin</td><td><?php echo getSession('bitcoin')?></td>
</tr>
<tr>
<td>Ethereum</td><td><?php echo getSession('ethereum')?></td>
</tr>
<tr>
<td>BNB</td><td><?php echo getSession('bnb')?></td>
</tr>
</tr>
<td>Cardano</td><td><?php echo getSession('cardano')?></td>
<tr>
</table>
<input type='submit' name='submit' value='Check Out'>
</form>

<?php footer() ?>
</body>
