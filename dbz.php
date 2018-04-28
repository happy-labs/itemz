<?php
$connect = mysqli_connect(getenv('DB_HOST'), 'root', 'root', 'itemz');

if (mysqli_connect_errno($connect)) {
    echo 'Failed to connect db';
}
?>
