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
    $sql = "SELECT * FROM users;";
    $result = $conn->query($sql);
    $rowcount = 0;
    if ($result->num_rows > 0) {
    echo "<table cellspacing='10'>";

    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Username</th>";
        echo "<th>Email</th>";
        echo "<th>Group</th>";
    echo "</tr>";


    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rowcount++;
        if ($rowcount % 2 == 0) 
        echo "<tr bgcolor='aqua'>";
        else
        echo "<tr bgcolor='orange'>";

        echo "<td>" . $row["id"]. "<br>";
        echo "<td>" . $row["username"]. "<br>";
        echo "<td>" . $row["email"]. "<br>";
        echo "<td>" . $row["usergroup"]. "<br>";
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
