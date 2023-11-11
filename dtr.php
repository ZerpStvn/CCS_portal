<?php

// Retrieve user information

$user_id = $_SESSION['login_id'];
$qry = $conn->query("SELECT * FROM users WHERE id = $user_id");
if ($qry->num_rows > 0) {
    $row = $qry->fetch_assoc();
    $uniqID = $row['uniqID'];
    $name = $row['firstname'];
    $lname = $row['lastname'];
} else {
    echo "User not found.";
    exit;
}


// Process time in or time out
if (isset($_POST['timein'])) {
    // Time In
    $time_in = date('Y-m-d H:i:s');
    $insert_query = $conn->query("INSERT INTO dtr (uniqID, firstname,lastname, timeIn) VALUES ('$uniqID', '$name','$lname', '$time_in')");
    if ($insert_query) {
        echo "Time In recorded successfully.";
    } else {
        echo "Error recording Time In.";
    }
} elseif (isset($_POST['timeout'])) {
    // Time Out
    $time_out = date('Y-m-d H:i:s');
    $update_query = $conn->query("UPDATE dtr SET timeOut = '$time_out' WHERE uniqID = '$uniqID' AND timeOut IS NULL");
    if ($update_query) {
        echo "Time Out recorded successfully.";
    } else {
        echo "Error recording Time Out.";
    }
}



?>
<style>
    .idinputs,
    .timein {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .timein {
        display: flex;
        gap: 20px;
        padding: 0 0 30px 0;
    }

    .timein button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 12px 29px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 3px 1px;
        cursor: pointer;
    }
    .timein #timeOut {
        background-color: #f44336;
        /* Green */
        border: none;
        color: white;
        padding: 12px 29px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 3px 1px;
        cursor: pointer;
    }
</style>
<div>


    <?php
    if ($_SESSION['login_type'] != 1) {
        ?>
        <form method="POST">
            <div class="idinputs">
                <input type="hidden" name="uniqID" value="<?php echo $uniqID; ?>" readonly>
            </div>
            <div class="timein">
                <button type="submit" name="timein">Time In</button>
                <button id="timeOut" type="submit" name="timeout">Time Out</button>
            </div>
        </form>
        <?php
    }
    ?>

</div>
<div class="col-lg-12">

<div class="card card-outline card-success">
    <div class="card-body">
    <b>Daily Time Record</b>
        <button class="btn btn-flat btn-sm bg-gradient-success btn-success float-right" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
            <div class="card-body p-0">
            <div class="table-responsive" id="printable">
                <table class="table m-0 table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $timeoutDisabled = true;
                    $qry = "";
                    if ($_SESSION['login_type'] != 1) {
                        $qry = $conn->query("SELECT * FROM dtr WHERE uniqID = '$uniqID' ORDER BY timeIn DESC");
                    } else {
                        $qry = $conn->query("SELECT * FROM dtr ORDER BY timeIn DESC");
                    }
                    if ($qry->num_rows > 0) {
                        while ($row = $qry->fetch_assoc()) {
                            $uniqId = $row['uniqID'];
                            $name = $row['firstname'];
                            $lname = $row['lastname'];
                            $timeIn = $row['timeIn'];
                            $timeOut = $row['timeOut'];


                            $dateformat = date('F j, Y', strtotime($row['timeIn']));
                            $timeInformat = date('g:i A', strtotime($row['timeIn']));
                            $timeOutformat = ($row['timeOut'] === null) ? 'Out' : date('g:i A', strtotime($row['timeOut']));
                            ?>

                            <tr>
                                <td>
                                    <?php echo $uniqId; ?>
                                </td>
                                <td>
                                    <?php echo $name; ?>
                                </td>
                                <td>
                                    <?php echo $lname; ?>
                                </td>
                                <td>
                                    <?php echo $dateformat; ?>
                                </td>
                                <td>
                                    <?php echo $timeInformat; ?>
                                </td>
                                <td>
                                    <?php echo $timeOutformat; ?>
                                </td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo "No records found.";
                    }
                    ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
            <script>
	$('#print').click(function(){
		start_load()
		var _h = $('head').clone()
		var _p = $('#printable').clone()
		var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
		_p.prepend(_d)
		_p.prepend(_h)
		var nw = window.open("","","width=900,height=600")
		nw.document.write(_p.html())
		nw.document.close()
		nw.print()
		setTimeout(function(){
			nw.close()
			end_load()
		},750)
	})
</script>