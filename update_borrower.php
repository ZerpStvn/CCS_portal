<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $borrowerId = $_POST['borrowerId'];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Update the 'returndate' column in the 'borrower' table
    $sql = "UPDATE borrower SET returndate = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $currentDate, $borrowerId);
    $stmt->execute();
    $stmt->close();

    echo 'Item returned successfully!';
}
?>
