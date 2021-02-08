<?php
    $conn = new mysqli("localhost", "depencae_root", "227567.l.ca", "depencae_gdlwebcamp");

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>
