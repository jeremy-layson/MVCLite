<?php
$db = new mysqli("localhost", "root", "", "music_db");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>