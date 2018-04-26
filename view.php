<html>
<head>
    <title>Add Item</title>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
<?php include 'dbz.php'; ?>
<?php
echo "  <h2> Item View</h2>";
echo "<input type=\"text\" id=\"myInput\" onkeyup=\"myFunction()\" placeholder=\"Search for names..\" title=\"Type in a name\">";
$sql = "SELECT type, title, description, name, phone, email, image FROM item";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<table border='1px' id=\"myTable\">";
        echo "<tr>";
        echo '<td><img width="100" height="100" src="data:image/jpeg;base64,' . $row['image'] . '"/></td>';

        echo "<td>";
        echo "<table border='1px'>";
        echo "<tr>";
        echo "<td>Type</td><td> " . $row['type'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Title</td><td> " . $row['title'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Description</td><td> " . $row['description'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Name</td><td> " . $row['name'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Phone</td><td> " . $row['phone'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Email</td><td> " . $row['email'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "</table >";
        echo "</td>";
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
</body>
</html>
