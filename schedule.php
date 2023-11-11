<?php if ($_SESSION['login_type'] != 3 && $_SESSION['login_type'] != 2): ?>
    <div style="display:flex">
        <button id="addbtn" class="btn btn-primary mr-2">Add schedule</button>
        <button style="margin-left:20px" id="clsbtn" class="btn btn-primary mr-2">Close</button>

        <select name="" id="room_select">
            <option value="MTCL1">MTCL 1</option>
            <option value="MTCL2">MTCL 2</option>
            <option value="MTCL3">MTCL 3</option>
            <option value="MTCL4">MTCL 4</option>
            <option value="MTCL5">MTCL 5</option>
        </select>
    </div>
<?php endif; ?>
<div class="col-lg-12">

    <div class="card formview">
        <div class="card-body" style="margin-top:20px">
            <form id="itemForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">Teachers Name</label>
                            <input type="text" name="tch" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Stub Code</label>
                            <input type="text" name="stbcd" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Schedule</label>
                            <div class="form-group wstview">
                                <select class="form-control form-control-sm" name='days'>
                                    <option value="M">Monday</option>
                                    <option value="T">Tuesday</option>
                                    <option value="W">Wednesday</option>
                                    <option value="TH">Thursday</option>
                                    <option value="F">Friday</option>
                                    <!-- Add options for other days of the week -->
                                </select>
                                <label for="" class="control-label">Start Time</label>
                                <input class="form-control form-control-sm" type="time" name="time">
                                <label for="" class="control-label">End Time</label>
                                <input class="form-control form-control-sm" type="time" name="end_time">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Room</label>
                            <input type="text" name="rm" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Subject</label>
                            <input type="text" name="sbj" class="form-control form-control-sm">
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Software</label>
                            <input type="text" name="proglang" class="form-control form-control-sm">
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
    <button class="btn btn-flat btn-sm bg-gradient-success btn-success float-right" id="print"><i
            class="fa fa-print"></i> Print</button>
</div>
<div class="card-body p-0">
    <div class="table-responsive" id="printable">
        <table id="schedule_table" class="table m-0 table-bordered">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Subject</th>
                    <th>Stub code</th>
                    <th>IDE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = $conn->query("SELECT * FROM schedule ");
                while ($row = $qry->fetch_assoc()):
                    ?>
                    <tr>

                        <td><b>
                                <?php echo ($row['teacher']) ?>
                            </b></td>
                        <td id="roomid"><b>
                                <?php echo $row['room'] ?>
                            </b></td>
                        <td><b>
                                <?php echo $row['days'] ?>
                            </b></td>
                        <td>
                            <b>
                                <?php echo date('H:i', strtotime($row['time'])) ?>
                            </b>
                        </td>
                        <td>
                            <b>
                                <?php echo date('H:i', strtotime($row['end_time'])) ?>
                            </b>
                        </td>
                        <td><b>
                                <?php echo $row['subj'] ?>
                            </b></td>
                        <td>
                            <b>
                                <?php echo $row['stubcd'] ?>
                            </b>
                        </td>
                        <td>
                            <b>
                                <?php echo $row['lang'] ?>
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
                url: 'room.php', // PHP file to handle the insert operation
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
<script>
    $('#print').click(function () {
        start_load()
        var _h = $('head').clone()
        var _p = $('#printable').clone()
        var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
        _p.prepend(_d)
        _p.prepend(_h)
        var nw = window.open("", "", "width=900,height=600")
        nw.document.write(_p.html())
        nw.document.close()
        nw.print()
        setTimeout(function () {
            nw.close()
            end_load()
        }, 750)
    })
</script>
<script>
    $(document).ready(function() {
      // Initial page load
      filterTable();

      // Filter table on select change
      $('#room_select').change(function() {
        filterTable();
      });

      function filterTable() {
        var selectedRoom = $('#room_select').val();

        // Show all rows initially
        $('#schedule_table tr').show();

        // Hide rows that don't match the selected room
        if (selectedRoom !== '') {
          $('#schedule_table tr').not(':has(#roomid:contains(' + selectedRoom + '))').hide();
        }
      }
    });
  </script>