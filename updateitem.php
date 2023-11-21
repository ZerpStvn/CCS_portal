<!-- update.php -->

<?php
include 'db_connect.php';

if (isset($_POST["submit"])) {
    $id = $_POST['postid'];
    $monitorSN = $_POST['monitor'];
    $model = $_POST['model'];
    $brand = $_POST['brdnd'];
    $category = $_POST['category'];
    $quantity = $_POST['qtn'];
    $desc = $_POST['desc'];

    $sql = "UPDATE items  SET monitor_sn=?, model=?, brand=?, category=?, quantity=?, description=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $monitorSN, $model, $brand, $category, $quantity, $desc, $id);

    if ($stmt->execute()) {
        header('Location: ./index.php?page=items');
        exit();
    } else {
        // Handle errors
        echo "Error updating data: " . $stmt->error;
    }

    $stmt->close();
} else {
    http_response_code(400);
    echo "Invalid request";
}

$conn->close();
?>