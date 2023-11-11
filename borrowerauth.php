<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $schlID = $_POST['schlID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $remark = $_POST['remarks'];
    $selectedCategory = $_POST['selectedCategory'];
    $selectedItem = $_POST['selectedItem'];
    $dateborrowed = $_POST['dateborrowed'];

    // Inserting data into the borrower table
    $sqlInsert = "INSERT INTO borrower (scholid, firstname, lastname, remark, itemname, dateborrower, category)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmtInsert = $conn->prepare($sqlInsert);
    $stmtInsert->bind_param('sssssss', $schlID, $firstname, $lastname, $remark, $selectedItem, $dateborrowed, $selectedCategory);
    $stmtInsert->execute();
    $stmtInsert->close();

    // Updating the items table
    $sqlUpdate = "UPDATE items SET quantity = quantity - 1 WHERE monitor_sn = ?";
    
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param('s', $selectedItem);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    echo 'Data stored successfully!';
}
?>
