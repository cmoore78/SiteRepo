<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Caleb Moore
CSC-155 -->


<html>
<head>
<title>Display the data</title>
<?php

require("library/functions.php");
admin_startup();
pageheader();

function printData($conn)
{
    $sql = "SELECT * FROM purchases;";
    $result = $conn->query($sql);
    $rowcount = 0;
    if ($result->num_rows > 0) {
    echo "<table cellspacing='10'>";

    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Date</th>";
        echo "<th>BTC</th>";
        echo "<th>ETH</th>";
        echo "<th>BNB</th>";
        echo "<th>ADA</th>";
    echo "</tr>";


    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rowcount++;
        if ($rowcount % 2 == 0) 
        echo "<tr bgcolor='lime'>";
        else
        echo "<tr bgcolor='gray'>";

        echo "<td>" . $row["id"]. "<br>";
        echo "<td>" . $row["username"]. "<br>";
        echo "<td>" . $row["date"]. "<br>";
        echo "<td>" . $row["btc"]. "<br>"; 
        echo "<td>" . $row["eth"]. "<br>";
        echo "<td>" . $row["bnb"]. "<br>";
        echo "<td>" . $row["ada"]. "<br>";
     }
    echo "</table>";
    } else {
    echo "0 results";
    }
}

// Create connection object
$user = "cmoore78";  
$conn = mysqli_connect("localhost",$user,$user,$user);
// Check connection
if (mysqli_connect_errno()) {
  echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
?>

</head>
<body>
<table align='center'><tr><td><?php printData($conn); ?></td></tr></table>
</body>

<?php footer(); ?>

</html>
