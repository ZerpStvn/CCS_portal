
<div class="col-lg-12">
<h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary mr-2">
        <input type="submit" value="Upload File" class="btn btn-primary mr-2" name="submit">
    </form>
</div>
<div class="card-body">
<table class="table table-hover table-bordered" id="list">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>File name</th>
            <th>Date & Time</th>
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
               $fileDate = $row['upload_date'];
$fileDate = new DateTime($fileDate);
$fileDate = $fileDate->format('Y/m/d H:i');

                echo "<tr>";
                echo "<td class='text-center'>$counter</td>";
                echo "<td>$fileName</td>";
                echo "<td>$fileDate</td>";
                echo "<td><a href='download.php?file=$fileName'>Download</a></td>";
                echo "</tr>";

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
       
    })
</script>