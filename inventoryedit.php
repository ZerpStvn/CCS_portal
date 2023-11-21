<div class="form-group text-right">
    <button type="button" class="btn btn-primary" id="editButton">Edit Details</button>
</div>

<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $monitorSN = $row['monitor_sn'];
        $model = $row['model'];
        $brand = $row['brand'];
        $category = $row['category'];
        $quantity = $row['quantity'];
        $desc = $row['description'];
    } else {
        echo "Data not found.";
        exit;
    }
} else {
    echo "ID not provided.";
    exit;
}

$conn->close();
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="updateitem.php" method="POST" id="manage_user">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">ID </label>
                            <input type="text" name="postid" value="<?php echo $id ?>"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Serial number </label>
                            <input type="text" name="monitor" value="<?php echo $monitorSN ?>"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Model</label>
                            <input type="text" name="model" value="<?php echo $model ?>"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">brand</label>
                            <input type="text" name="brdnd" value="<?php echo $brand ?>"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">category</label>
                            <input type="text" name="category" value="<?php echo $category ?>"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <input type="text" name="desc" value="<?php echo $desc ?>"
                                class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">quantity</label>
                            <input type="text" name="qtn" value="<?php echo $quantity ?>"
                                class="form-control form-control-sm">
                        </div>


                    </div>

                </div>
                <hr>
                <div class="form-group text-right">
                    <input type="submit" name="submit" class="btn btn-success" value="Save Changes" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>

</script>