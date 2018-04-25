<html>
   <head>
      <title>Add Item</title>
   </head>

   <body>
      <?php include 'dbz.php'; ?>
      <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $type = format_input($_POST["type"]);
            $title = format_input($_POST["title"]);
            $description = format_input($_POST["description"]);
            $name = format_input($_POST["name"]);
            $phone = format_input($_POST["phone"]);
            $email = format_input($_POST["email"]);
              $image = format_input($_POST["image"]);

            // save itme db
            mysqli_query($connect, "INSERT INTO item(type, title, description, name, phone, email, image)
                VALUES('$type', '$title', '$description', '$name', '$phone', '$email','$image')");
         }

         function format_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>

      <h2>New Item</h2>
      <form method = "post" action="<?=$_SERVER['PHP_SELF']?>">
         <table>
            <tr>
               <td>Type:</td>
               <td><label name = "type" value="test"></td>
            </tr>
        <!--    <tr>
               <td>Title:</td>
               <td><input type = "text" name = "title"></td>
            </tr>
            <tr>
               <td>Description:</td>
               <td><textarea name = "description" rows = "5" cols = "40"></textarea></td>
            </tr>
            <tr>
               <td>Image(browse):</td>
               <td> <input type="file" name="image"/></td>
            </tr>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name"></td>
            </tr>
            <tr>
               <td>Phone:</td>
               <td><input type = "text" name = "phone"></td>
            </tr>
            <tr>
               <td>Email:</td>
               <td><input type = "text" name = "email"></td>
            </tr>
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit">
               </td>
            </tr>-->
         </table>
      </form>
      <?php
      ?>
          <a href="index.php">Add New</a>
   </body>
</html>
