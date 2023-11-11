<?php
// Include your database connection file
include 'db_connect.php';

// Check if the form was submitted
if (isset($_POST["submit"])) {
    $uploadDirectory = 'uploads/'; 

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Get the uploaded file details
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $uploadDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check file size (adjust the size limit as needed)
    if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5 MB limit
        echo "Sorry, your file is too large.";
        exit; // Terminate the script
    }

    // Allow specific file formats (add more formats as needed)
    $allowedFormats = ["jpg", "jpeg", "png", "gif", "doc", "docx", "pdf"];
    if (!in_array(strtolower($fileType), $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, DOC, DOCX, and PDF files are allowed.";
        exit; // Terminate the script
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
        // Store file details in the database (MySQL)
        $sql = "INSERT INTO files (filename, filepath) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $fileName, $targetFilePath);

        if ($stmt->execute()) {
            // File details added to the database successfully
            // Show an alert before reloading the page
          
          
            header("Location: index.php?page=usermanual");
            echo '<script>alert("File uploaded successfully!");</script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the database connection
    $conn->close();
}
?>
