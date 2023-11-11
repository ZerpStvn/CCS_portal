
<div class="col-lg-12">
 <div class="categoryView">
    <form  id="categoryForm" method="POST" enctype="multipart/form-data">
        <label for="" class="control-label">Category</label>
        <input type="text"  name="categoryname">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
    </form>
 </div>

</div>
<div class="card-body">
    <table class="table tabe-hover table-bordered" id="list">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Item name</th>
                <th>Model</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $type = array('', "Admin", "Project Manager", "Employee");
            $qry = $conn->query("SELECT * FROM items ");
            while ($row = $qry->fetch_assoc()):
                ?>
                <tr>
                    <th class="text-center">
                        <?php echo $i++ ?>
                    </th>
                    <td><b>
                            <?php echo ucwords($row['monitor_sn']) ?>
                        </b></td>
                    <td><b>
                            <?php echo ($row['model']) ?>
                        </b></td>
                    <td><b>
                            <?php echo $row['brand'] ?>
                        </b></td>
                    <td><b>
                            <?php echo $row['category'] ?>
                        </b></td>
                    <td>
                        <b>
                            <?php echo $row['quantity'] ?>
                        </b>
                    </td>
                    <td>
                        <b>
                            <?php echo $row['description'] ?>
                        </b>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</div>
<style>
    .card {
        display: none;
    }
</style>
<script>
    $(document).ready(function () {

        // Handle form submission
        $('#categoryForm').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the form data
            var formData = new FormData(this);

            // Send AJAX request
            $.ajax({
                url: 'categoryAuth.php', // PHP file to handle the insert operation
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Handle the response from the PHP file
                    alert(response); // You can display a success message or perform any other action
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle any errors that occur during the AJAX request
                    console.log(xhr.responseText);
                }
            });
        });
    })
</script>