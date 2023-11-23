<?php
include 'db_connect.php';

if (isset($_POST["submit"])) {
    $uploadDirectory = 'uploads/';
    $filetype = $_POST['typefile'];
    $teacher = $_POST['teacher'];
    $subject = $_POST['subject'];
    $datetime = $_POST['datetime'];
    $uploader = $_POST['uploader'];


    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $uploadDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        exit;
    }

    $allowedFormats = ["jpg", "jpeg", "png", "gif", "doc", "docx", "pdf", "xls", "xlsx", "ppt", "pptx", "txt", "zip", "rar"];

    if (!in_array(strtolower($fileType), $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, DOC, DOCX, and PDF files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {

        $sql = "INSERT INTO files (filename, filepath, teacher, subj,ftype, date_time, dateup,uploader ) VALUES (?, ?, ?, ?, ?, ?, NOW(),?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $fileName, $targetFilePath, $teacher, $subject, $filetype, $datetime, $uploader);


        if ($stmt->execute()) {



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