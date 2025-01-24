<?php

include './db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $id = intval($_POST['id']);

    //getting the image from DB by id
    $result = $conn->query("SELECT image_path FROM photos WHERE id = $id");

    //Check if a photo found
    if ($result->num_rows > 0) {
        //Fetch the image array
        $row = $result->fetch_assoc();

        //Delete from the folder
        unlink($row['image_path']);
    }

    //Delete from DB
    $conn->query("DELETE FROM photos WHERE id = $id");

    //Redirect to the index.php
    header("Location: index.php");

    exit;
}

?>