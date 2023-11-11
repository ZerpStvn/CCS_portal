
<div class="form-group text-right">
    <button type="button" class="btn btn-primary" id="editButton">Edit Details</button>
</div>

<?php
// Include your database connection file
include 'db_connect.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from the 'borrower' table based on the provided 'id'
    $sql = "SELECT * FROM borrower WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        // Fetch and display the data in the HTML form
        $row = $result->fetch_assoc();
        $schoolID = $row['scholid'];
        $fullName = $row['firstname'];
        $lender = $row['lastname'];
        $serialNumber = $row['itemname'];
        $dateBorrowed = $row['dateborrower'];
        $dateReturned = $row['returndate'];
        $remarks = $row['remark'];
        $category = $row['category'];
    } else {
        // No data found for the provided 'id'
        echo "Data not found.";
        exit;
    }
} else {
    // 'id' parameter is not set in the URL
    echo "ID not provided.";
    exit;
}

// Close the database connection
$conn->close();
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div action="" id="manage_user">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">School ID</label>
                            <input type="text" readonly name="schoolid" value="<?php echo $schoolID?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
    <label for="" class="control-label">Full name</label>
    <input type="text" readonly name="fullname" value="<?php echo $fullName?>" class="form-control form-control-sm">
</div>
                        
                        <div class="form-group">
                            <label for="" class="control-label">Lender</label>
                            <input type="text" readonly name="lender"value="<?php echo  $lender?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Serial number</label>
                            <input type="text" readonly name="serial" value="<?php echo  $serialNumber?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Category</label>
                            <input type="text" readonly name="category" value="<?php echo $category ?>" class="form-control form-control-sm">
                        </div>


                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="" class="control-label">Date borrowed</label>
                            <input type="text" readonly name="date_borrowed" value="<?php echo  $dateBorrowed?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Date returned</label>
                            <input type="text" readonly name="date_returned" value="<?php echo  $dateReturned?>" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Remarks</label>
                            <input type="text" readonly name="remarks" value="<?php echo  $remarks?>" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("editButton").addEventListener("click", function() {
        // Enable input fields to allow editing
        document.getElementsByName("schoolid")[0].removeAttribute("readonly");
        document.getElementsByName("fullname")[0].removeAttribute("readonly");
        document.getElementsByName("lender")[0].removeAttribute("readonly");
        document.getElementsByName("serial")[0].removeAttribute("readonly");
        document.getElementsByName("category")[0].removeAttribute("readonly");
        document.getElementsByName("date_borrowed")[0].removeAttribute("readonly");
        document.getElementsByName("date_returned")[0].removeAttribute("readonly");
        document.getElementsByName("remarks")[0].removeAttribute("readonly");
        // Enable the save button after editing
        document.getElementById("saveButton").removeAttribute("disabled");
    });
</script>
<div class="form-group text-right">
    <button type="submit" class="btn btn-success" id="saveButton" disabled>Save Changes</button>
</div>