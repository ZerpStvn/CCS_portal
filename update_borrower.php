<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $borrowerId = $_POST['borrowerId'];
    $reason = $_POST['reason'];

    $currentDate = date('Y-m-d');

    $sql = "UPDATE borrower SET returndate = ?, reason = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $currentDate, $reason, $borrowerId);

    if ($stmt->execute()) {
        $stmt->close();
        echo 'Item returned successfully!';
    } else {
        echo 'Error updating data: ' . $stmt->error;
    }
}
?>