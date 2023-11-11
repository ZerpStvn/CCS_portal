<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['categoryname'];


 
    $sql = "INSERT INTO category (categoryname)
            VALUES (?)";


    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param('s', $category);
    $stmt->execute();

    $stmt->close();

   echo "save";
}
?>
