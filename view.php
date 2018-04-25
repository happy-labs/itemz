<html>
   <head>
      <title>Add Item</title>
   </head>

   <body>
    <?php include 'dbz.php';?>
      <?php
      echo "  <h2> Item View</h2>";
      $sql = "SELECT type, title, description, name, phone, email, image FROM item";

      $result = $connect->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

              echo "<table>";
              echo "<tr>";
              echo "<td>Name</td>";
              echo "<td>". $row["name"]."</td>";
              echo "</tr>";
              echo "</table>";
           //   echo "<br> id: ". $row["title"]. " - Name: ". $row["image"]. "title " . $row["title"] . "<br>";
          /*    echo "img src='".$row['image']."' width='175' height='200' />";*/
              echo '<img width="100" height="100" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';

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
