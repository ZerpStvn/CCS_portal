<?php
// Include your database connection file
include 'db_connect.php';

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];

    // Fetch the file path from the database
    $sql = "SELECT filepath FROM files WHERE filename = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $fileName);
    $stmt->execute();
    $stmt->bind_result($filePath);
    $stmt->fetch();
    $stmt->close();

    // Check if the file exists
    if (file_exists($filePath)) {
        // Send the file for download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "File not found.";
    }
}

// Close the database connection
$conn->close();
?>
