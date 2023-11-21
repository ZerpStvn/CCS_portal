<?php include('header.php') ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form id="itemform" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">School ID</label>
                            <input type="text" name="schlID" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Full name</label>
                            <input type="text" name="firstname" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Lender</label>
                            <input type="text" name="lastname" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Remarks</label>
                            <input type="text" name="remarks" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            include 'db_connect.php';
                            $sql = "SELECT DISTINCT category FROM items";
                            $result = $conn->query($sql);
                            ?>

                            <label for="categorySelect" class="control-label">Category</label>
                            <select name="selectedCategory" id="categorySelect" class="form-control">
                                <option value="">Select a Category</option>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $category = $row['category'];
                                        echo "<option value='$category'>$category</option>";
                                    }
                                } else {
                                    echo "<option value=''>No categories found</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" id="serialNumberSelect">
                            <label for="serialNumber" class="control-label">Serial Number</label>
                            <select name="selectedItem" class="form-control select2">
                                <option value="">Select a Serial Number</option>
                                <!-- Serial Numbers will be populated dynamically based on the selected Category -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Date borrowed</label>
                            <input type="date" name="dateborrowed" class="form-control form-control-sm"
                                value="<?php echo date('Y-m-d'); ?>">

                        </div>
                    </div>
                </div>
                <hr>
                <style>
                    .btn-primary {
                        width: 80%;
                        max-width: 80px;
                        transition: all 0.3s ease;/
                    }

                    .btn-primary:hover {
                        transform: scale(1.1);
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                    }
                </style>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table tabe-hover table-bordered" id="list">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>school ID</th>
                    <th>Full name</th>
                    <th>Lender</th>
                    <th>Category</th>
                    <th>Serial number</th>
                    <th>Date borrowed</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $type = array('', "Admin", "Project Manager", "Employee");
                $qry = $conn->query("SELECT * FROM borrower WHERE returndate IS NULL");
                while ($row = $qry->fetch_assoc()):
                    $id = $row['id'];
                    ?>
                    <tr>
                        <th class="text-center">
                            <?php echo $i++ ?>
                        </th>
                        <td><b>
                                <?php echo $row['scholid'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['firstname'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['lastname'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['category'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['itemname'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['dateborrower'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['remark'] ?>
                            </b></td>
                        <td>
                            <button class="return-btn btn btn-primary mr-2" data-borrower-id="<?php echo $id ?>">Return
                                Item</button>
                        </td>
                    </tr>
                    <!-- <div
                        style=" position: absolute; top: 0; right: 0; left:0;margin:0 auto; background-color:grey;bottom:0;opacity: 100%;">
                        <div
                            style=" z-index:100;opacity: 100%; margin:10% 25%; width:50%;  height:50%; display:flex; flex-direction:column; align-items:center;justify-content:center; background-color:white">
                            <form action="">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <textarea name="reason" id="" cols="30" rows="10" style="resize: none"
                                    placeholder="Reason"></textarea>

                                <div style="display:flex; gap: 30px; margin-top:10px;">
                                    <input type="submit" name="submit" value="Submit">
                                </div>
                            </form>
                        </div> -->
        </div>
    <?php endwhile; ?>
    </tbody>
    </table>
</div>
<div id="reasonModal" class="modal" style="width:50%; margin:0 25% ;">

    <div class="modal-content " style="padding:50px">

        <span style="font-size:23px" class="close">&times;</span>
        <textarea id="reason" name="reason" rows="10" placeholder="Reasons"
            style="margin:20px 0 30px 0; resize:none"></textarea>
        <button id="submitReasonBtn">Submit</button>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('#itemform').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the form data
            var formData = new FormData(this);

            // Send AJAX request
            $.ajax({
                url: 'borrowerauth.php', // PHP file to handle the insert operation
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
        // Close the modal if the close button is clicked
        $('.close').click(function () {
            $('#reasonModal').css('display', 'none');
        });

        $('.return-btn').click(function () {
            var borrowerId = $(this).data('borrower-id');

            // Display the modal
            $('#reasonModal').css('display', 'block');


            // Handle the reason submission
            $('#submitReasonBtn').click(function () {
                var reason = $('#reason').val();

                $.ajax({
                    url: 'update_borrower.php',
                    method: 'POST',
                    data: {
                        borrowerId: borrowerId,
                        reason: reason
                    },
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

                // Close the modal after submission
                $('#reasonModal').css('display', 'none');
            });
        });


        // When a Category is selected
        $('#categorySelect').change(function () {
            var selectedCategory = $(this).val();
            var serialNumberSelect = $('#serialNumberSelect');

            if (selectedCategory) {
                $.ajax({
                    type: 'POST',
                    url: 'serialnum.php',
                    data: { category: selectedCategory },
                    success: function (response) {
                        // Populate the Serial Number select with the fetched data
                        serialNumberSelect.find('select').html(response);
                    }
                });
            } else {
                serialNumberSelect.find('select').empty(); // Clear the Serial Number select
            }
        });
    });


</script>