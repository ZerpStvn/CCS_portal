<div class="col-lg-12">
    <h2>Upload Manual</h2>
    <div class="addmanl">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary mr-2">
            <input type="text" name="typefile" id="typefile" placeholder="File type">
            <input type="name" name="teacher" id="teacher" placeholder="Teacher">
            <input type="text" name="subject" id="subject" placeholder="Subject">
            <input type="datetime-local" name="datetime" id="datetime" placeholder="datetime">
            <input type="submit" value="Submit" class="btn btn-primary mr-2" name="submit">
        </form>
    </div>
    <button style="margin-top:20px;" class="btn btn-primary mr-2" id="addman">
        Add New Manual
    </button>
    <button style="margin-top:20px;" class="btn btn-primary mr-2" id="addman2">
        Cancel
    </button>

</div>
<div class="card-body">

    <input type="text" id="searchtab" name="seachtab" placeholder="Seach" style="margin:40px 0 20px 0">
    <table class="table table-hover table-bordered" id="list">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>File name</th>
                <th>Format</th>
                <th>Upload date</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Date time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include your database connection file
            include 'db_connect.php';

            // Fetch uploaded files data from the database
            $sql = "SELECT * FROM files"; // Change 'files' to your actual database table name
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    $fileName = $row['filename'];
                    $ftype = $row['ftype'];
                    $fileDate = $row['upload_date'];
                    $teacher = $row['teacher'];
                    $sbj = $row['subj'];
                    $datetime = $row['date_time'];
                    $fileDate = new DateTime($fileDate);
                    $fileDate = $fileDate->format('Y/m/d H:i');
                    $dateObj = new DateTime($datetime);

                    $formattedDate = $dateObj->format("F j Y H:i");
                    ?>
                    <tr>
                        <td class='text-center'>
                            <?php echo $counter ?>
                        </td>
                        <td id="file_tiltle">
                            <?php echo $fileName ?>
                        </td>
                        <td>
                            <?php echo $ftype ?>
                        </td>
                        <td>
                            <?php echo $fileDate ?>
                        </td>
                        <td>
                            <?php echo $teacher ?>
                        </td>
                        <td id="subject">
                            <?php echo $sbj ?>
                        </td>
                        <td>
                            <?php echo $formattedDate ?>
                        </td>
                        <td><a href='download.php?file=<?php echo $fileName ?>'>Download</a></td>
                    </tr>
                    <?php

                    $counter++;
                }
            } else {
                echo "<tr><td colspan='5'>No files found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
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
        $("#searchtab").on("input", function () {
            var searchText = $(this).val().toLowerCase();

            $("#list tr:gt(0)").each(function () {
                var title = $(this).find("#file_tiltle").text().toLowerCase();
                var subject = $(this).find("#subject").text().toLowerCase();

                if (title.includes(searchText) || subject.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        $(".addmanl").hide();
        $("#addman2").hide();
        $("#addman").click(function () {
            $(".addmanl").show();
            $("#addman").hide();
            $("#addman2").show();

        });
        $("#addman2").click(function () {
            $(".addmanl").hide();
            $("#addman").show();
            $("#addman2").hide();

        });
        $('#fileToUpload').on('change', function () {
            var selectedFile = this.files[0];

            var fileType = selectedFile.type;

            var mimeToExtension = {
                'application/pdf': 'pdf',
                'application/msword': 'doc',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'docx',
                'application/vnd.ms-excel': 'xls',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'xlsx',
                'application/vnd.ms-powerpoint': 'ppt',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation': 'pptx',
                'image/jpeg': 'jpg',
                'image/png': 'png',
                'image/gif': 'gif',
                'text/plain': 'txt',
                'application/zip': 'zip',
                'application/x-rar-compressed': 'rar',
            };


            var fileExtension = mimeToExtension[fileType] || 'unknown';

            // Display the file extension in the text input
            $('#typefile').val(fileExtension);
        });
    })
</script>