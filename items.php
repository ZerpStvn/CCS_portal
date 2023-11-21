<?php if ($_SESSION['login_type'] != 3 && $_SESSION['login_type'] != 2): ?>
    <style>
        .btn-primary {
            width: 100%;
            max-width: 100px;
            transition: all 0.3s ease;/
        }

        .btn-primary:hover {
            transform: scale(1.0);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div style="display:flex">
        <button id="addbtn" class="btn btn-primary mr-2">Add item</button>
        <button style="margin-left:20px" id="clsbtn" class="btn btn-primary mr-2">Close</button>
    </div>
<?php endif; ?>
<div class="col-lg-12">

    <div class="card formview">
        <div class="card-body" style="margin-top:20px">
            <form id="itemForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <!-- category list view -->
                        <div class="form-group">
                            <label for="" class="control-label">Category</label>
                            <select name="category" id="categorylist" style="width:100%; height: 40px;">
                                <?php
                                $sql = "SELECT categorylistname FROM categorylist";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $categoryname = $row['categorylistname'];
                                        echo "<option value=\"$categoryname\">$categoryname</option>";

                                    }
                                } else {
                                    echo '<option value="">No categories found</option>';
                                }


                                ?>
                                <option value="other">Other</option>
                            </select>
                            <div class="form-group" style="margin-top:10px">
                                <label for="" id="categorylabel" class="control-label">Other Category</label>
                                <input type="text" name="category" id="category_list"
                                    class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Brand</label>
                            <select name="brand" id="category_id" style="width:100%; height: 40px;">
                                <?php
                                $sql = "SELECT categoryname FROM category";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $categoryname = $row['categoryname'];
                                        echo "<option value=\"$categoryname\">$categoryname</option>";

                                    }
                                } else {
                                    echo '<option value="">No categories found</option>';
                                }


                                ?>
                                <option value="other">Other</option>
                            </select>
                            <div class="form-group">
                                <label for="" id="otherbrandlabel" class="control-label">Other Brand</label>
                                <input type="text" name="brand" id="otherbrand" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Serial Number</label>
                            <input type="text" name="monitor_sn" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Model</label>
                            <select name="model" id="model_id" style="width:100%; height: 40px;">
                                <?php
                                $sql = "SELECT modelname FROM model";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $modelname = $row['modelname'];
                                        echo "<option value=\"$modelname\">$modelname</option>";
                                    }
                                } else {
                                    echo '<option value="">No models found</option>';
                                }
                                ?>
                                <option value="other">Other</option>
                            </select>
                            <div class="form-group">
                                <label for="" id="othermodellabel" class="control-label">Other</label>
                                <input type="text" name="model" id="othermodel" class="form-control form-control-sm">
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Quantity</label>
                            <input type="text" name="qnty" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Description</label>
                            <input type="text" name="description" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card-body">
    <table class="table tabe-hover table-bordered" id="list">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Serial Number </th>
                <th>Model</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Date Added</th>
                <th>View</th>
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
                    <td>
                        <b>
                            <?php echo date('F j Y g:i a', strtotime($row['date_added'])); ?>
                        </b>
                    </td>
                    <td>
                        <a href="./index.php?page=inventoryedit&id=<?php echo $row['id'] ?>">View</a>
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
        $('#othermodel').hide();
        $('#othermodellabel').hide();

        $('#model_id').change(function () {
            if ($(this).val() === 'other') {
                $('#othermodellabel').show();
                $('#othermodel').show();
            } else {
                $('#othermodellabel').hide();
                $('#othermodel').hide();
            }
        });
        $('#otherbrand').hide();
        $('#otherbrandlabel').hide();

        $('#category_id').change(function () {
            if ($(this).val() === 'other') {
                $('#otherbrandlabel').show();
                $('#otherbrand').show();
            } else {

                $('#otherbrandlabel').hide();
                $('#otherbrand').hide();
            }
        });

        // Category list
        $('#categorylabel').hide();
        $('#category_list').hide();

        $('#categorylist').change(function () {
            if ($(this).val() === 'other') {
                $('#categorylabel').show();
                $('#category_list').show();
            } else {

                $('#categorylabel').hide();
                $('#category_list').hide();
            }
        });


        $("#addbtn").click(function () {
            $(".formview").css("display", "block");
        })
        clsbtn
        $("#clsbtn").click(function () {
            $(".formview").css("display", "none");
        })

        // Handle form submission
        $('#itemForm').submit(function (event) {
            event.preventDefault();
            var selectedModel = $('#model_id').val();
            var modelValue;

            if (selectedModel === 'other') {
                modelValue = $('#othermodel').val();
            } else {
                modelValue = selectedModel;
            }

            $('input[name="model"]').val(modelValue);
            event.preventDefault();
            var selectedCategory = $('#category_id').val();
            var brandValue;

            if (selectedCategory === 'other') {
                brandValue = $('#otherbrand').val();
            } else {
                brandValue = selectedCategory;
            }

            $('input[name="brand"]').val(brandValue);

            // category list
            var selectedCategorylist = $('#categorylist').val();
            var brandValuelist;

            if (selectedCategorylist === 'other') {
                brandValuelist = $('#category_list').val();
            } else {
                brandValuelist = selectedCategorylist;
            }

            $('input[name="category"]').val(brandValuelist);
            var formData = new FormData(this);

            // Send AJAX request
            $.ajax({
                url: 'item_auth.php', // PHP file to handle the insert operation
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