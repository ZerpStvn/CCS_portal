<?php

include 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $itemname = $_POST['monitor_sn'];
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $quantity = $_POST['qnty'];
    $description = $_POST['description'];

    $sql = "INSERT INTO items (monitor_sn, model, brand, category, quantity, description, date_added)
    VALUES (?, ?, ?, ?, ?, ?, NOW())";



    $stmt = $conn->prepare($sql);

   
    $stmt->bind_param('ssssis', $itemname, $model, $brand, $category, $quantity, $description);
    $stmt->execute();

    // Close the statement
    $stmt->close();

    $checkModelSql = "SELECT * FROM model WHERE modelname = ?";
    $checkModelStmt = $conn->prepare($checkModelSql);
    $checkModelStmt->bind_param('s', $model);
    $checkModelStmt->execute();
    $checkModelResult = $checkModelStmt->get_result();
    
    if ($checkModelResult->num_rows === 0) {
        // Model doesn't exist, insert it into the 'model' table
        $sql2 = "INSERT INTO model (modelname) VALUES (?)";
    
        $stmt2 = $conn->prepare($sql2);
    
        $stmt2->bind_param('s', $model);
        $stmt2->execute();
    
        $stmt2->close();
    }
    
    $checkCategorySql2 = "SELECT * FROM category WHERE categoryname = ?";
    $checkCategoryStmt2 = $conn->prepare($checkCategorySql2);
    $checkCategoryStmt2->bind_param('s', $brand);
    $checkCategoryStmt2->execute();
    $checkCategoryResult2 = $checkCategoryStmt2->get_result();

    if ($checkCategoryResult2->num_rows === 0) {
       
        $sql3 = "INSERT INTO category (categoryname) VALUES (?)";

        $stmt3 = $conn->prepare($sql3);

        $stmt3->bind_param('s', $brand);
        $stmt3->execute();


        $stmt3->close();
    }

    $checkCategorySql4 = "SELECT * FROM categorylist WHERE categorylistname = ?";
    $checkCategoryStmt4 = $conn->prepare($checkCategorySql4);
    $checkCategoryStmt4 ->bind_param('s', $category);
    $checkCategoryStmt4->execute();
    $checkCategoryResult4 = $checkCategoryStmt4 ->get_result();

    if ($checkCategoryResult4->num_rows === 0) {
       
        $sql5 = "INSERT INTO categorylist (categorylistname) VALUES (?)";

        $stmt5 = $conn->prepare($sql5);

        $stmt5->bind_param('s', $category);
        $stmt5->execute();


        $stmt5->close();
    }
    echo "Item Added ";
}
?>