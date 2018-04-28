<html>
<head>
    <title>Vie Item Image</title>
</head>

<body>
<?php include 'dbz.php'; ?>
<?php
echo "  <h2> Item View</h2>";
/*echo "	<input type=\"search\" class=\"light-table-filter\" data-table=\"order-table\" placeholder=\"Search\" width=\"150px\">";*/
echo "<br>";
echo "<br>";


$id = $_GET["id"];

$sql = "SELECT image FROM item where id=$id";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<table class=\"order-table table\">";
        echo "<tr>";
        echo '<td><table border=\'1px\' style="padding: 18px;" ><tr><td><img width="200" height="200" src="data:image/jpeg;base64,' . $row['image'] . '"/></td></tr></table></td>';
        echo "</tr>";
        echo "</table>";
        echo "<br>";
        echo "<br>";
    }
} else
    $conn->close();
?>
<?php
?>
<br>
<a href="index.php">Add New</a>
<a href="view.php">View All</a>
</body>
</html>
