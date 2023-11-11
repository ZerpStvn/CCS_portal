<?php
include 'db_connect.php';

if (isset($_POST['category'])) {
    $selectedCategory = mysqli_real_escape_string($conn, $_POST['category']);

    // Select quantity along with monitor_sn
    $sql = "SELECT monitor_sn, quantity FROM items WHERE category = '$selectedCategory'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $options = "<option value=''>Select a Serial Number</option>";
        while ($row = $result->fetch_assoc()) {
            $monitorSN = $row['monitor_sn'];
            $quantity = $row['quantity'];

            $options .= "<option value='$monitorSN'>$monitorSN</option>";
        }

        // Check if quantity is 0
        if ($quantity == 0) {
            echo "<script>alert('Selected category has 0 quantity');</script>";
        }

        echo $options;
    } else {
        echo "<option value=''>No Serial Numbers found</option>";
    }
} else {
    echo "<option value=''>Category not provided</option>";
}

// Close the database connection
$conn->close();
?>
