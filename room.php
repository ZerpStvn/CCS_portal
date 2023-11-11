<?php
// Include the database connection
include('db_connect.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data
    $teacher = mysqli_real_escape_string($conn, $_POST['tch']);
    $stbcd = mysqli_real_escape_string($conn, $_POST['stbcd']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $endtime = mysqli_real_escape_string($conn, $_POST['end_time']);
    $room = mysqli_real_escape_string($conn, $_POST['rm']);
    $sbj = mysqli_real_escape_string($conn, $_POST['sbj']);
    $proglang = mysqli_real_escape_string($conn, $_POST['proglang']);

    // Insert data into the schedule table using prepared statements
    $sql = "INSERT INTO schedule (room, teacher, days, time, end_time, subj, stubcd, lang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $room, $teacher, $days, $time, $endtime, $sbj, $stbcd, $proglang);

    if ($stmt->execute()) {
        echo "Schedule saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Form submission error.";
}
?>
