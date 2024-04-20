<?php 

include 'components/layouts/header.php';
include 'php/database.php';


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM weekly_breakdown WHERE wb_id= '$id'";

    $result = mysqli_query($connection, $sql);

    while($row=mysqli_fetch_array($result)){
    $id = $row['wb_id'];
    $vhtid = $row['vht_id'];
    $wbwno = $row['wb_week_number'];
    $wbh = $row['wb_hours'];
    }

}



if (isset($_POST['vhtid']) && isset($_POST['wbwno']) && isset($_POST['wbh']) && isset($_GET['id']))
{
    $id = $_GET['id'];
    $vhtid = $_POST['vhtid'];
    $wbwno = $_POST['wbwno'];
    $wbh = $_POST['wbh']; 
    
    // Prepare and execute the SQL query
    $sql = "UPDATE weekly_breakdown set vht_id= '$vhtid', wb_week_number= '$wbwno', wb_hours= '$wbh' where wb_id= '$id'";
    if(mysqli_query($connection,$sql)) {
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: 'Edited successfully',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        // Redirect to a new page after success
        window.location.href = 'index.php';
    });
    </script>";
    } else{
        // Display error message using SweetAlert
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Edited failed!',
        showConfirmButton: false,
        timer: 1500
    });
    </script>";
    }

    $connection->close();
        
}


?>



<div class="max-w-md mx-auto bg-white rounded p-6 shadow-md flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4">Edit Weekly Breakdown</h2>
    <form action="#" method="post" class="w-full">
        <div class="mb-4">
            <label for="volunteer_id" class="block text-sm font-medium text-gray-700">Volunteer Hours ID</label>
            <select id="volunteer_id" name="vhtid" value="<?php echo $vhtid; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="<?php echo $vhtid; ?>">Select Volunteer Hours ID</option>

                <?php

                include 'php/database.php';

                $qry = "SELECT * FROM volunteer_hours_tracker";

                $result = $connection->query($qry);

                while ($row = mysqli_fetch_array($result)) {
                    $vhtid = $row['vht_id'];

                ?>
                <option><?php echo ($vhtid)?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="no" class="block text-sm font-medium text-gray-700">Weekly Breakdown Number</label>
            <input type="text" id="no" name="wbwno" value="<?php echo $wbwno; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="hours" class="block text-sm font-medium text-gray-700">Weekly Breakdown Hours</label>
            <input type="text" id="hours" name="wbh" value="<?php echo $wbh; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" name="update" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mr-2">Update</button>
            <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('cancelBtn').addEventListener('click', function() {
    window.location.href = 'index.php'; 
});
</script>


</body>
</html>
