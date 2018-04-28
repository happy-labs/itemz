<html>
<head>
    <title>Add Item</title>
    <script>
        (function (document) {
            'use strict';

            var LightTableFilter = (function (Arr) {
                var _input;

                function _onInputEvent(e) {
                    _input = e.target;
                    var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                    Arr.forEach.call(tables, function (table) {
                        Arr.forEach.call(table.tBodies, function (tbody) {
                            Arr.forEach.call(tbody.rows, _filter);
                        });
                    });
                }

                function _filter(row) {
                    var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                }

                return {
                    init: function () {
                        var inputs = document.getElementsByClassName('light-table-filter');
                        Arr.forEach.call(inputs, function (input) {
                            input.oninput = _onInputEvent;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function () {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });
        })(document);
    </script>
</head>

<body>
    <?php include 'dbz.php'; ?>
    <?php
        echo "  <h2> Item View</h2>";
        echo "	<input type=\"search\" class=\"light-table-filter\" data-table=\"order-table\" placeholder=\"Search\" width=\"150px\">";
        echo "<br>";
        echo "<br>";

        // select itmes
        $sql = "SELECT type, title, description, name, phone, email, image FROM item";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<table class=\"order-table table\">";
                echo "<tr>";
                echo '<td><table border=\'1px\' style="padding: 18px;" ><tr><td><img width="100" height="100" src="data:image/jpeg;base64,' . $row['image'] . '"/></td></tr></table></td>';
                echo "<td>";
                echo "<table border='1px'  >";
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
        } else {
            $conn->close();
        }
    ?>
    <br>
    <a href="index.php">Add New</a>
</body>
</html>
