<?php 

include 'components/layouts/header.php';
include 'php/database.php';


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM organization_hours_tracker WHERE oht_id= '$id'";

    $result = mysqli_query($connection, $sql);

    while($row=mysqli_fetch_array($result)){
    $id = $row['oht_id'];
    $orgid = $row['org_id'];
    $pbp = $row['progress_bar_percentage'];
    }

}



if (isset($_POST['orgid']) && isset($_POST['pbp']) && isset($_GET['id']))
{
    $id = $_GET['id'];
    $orgid = $_POST['orgid'];
    $pbp = $_POST['pbp']; 
    
    // Prepare and execute the SQL query
    $sql = "UPDATE organization_hours_tracker set oht_id= '$orgid', progress_bar_percentage= '$pbp' where oht_id= '$id'";
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
    <h2 class="text-2xl font-semibold mb-4">Edit Organization Hours Tracker</h2>
    <form action="#" method="POST" class="w-full">
        <div class="mb-4">
            <label for="org_id" class="block text-sm font-medium text-gray-700">Organization ID</label>
            <select id="org_id" name="orgid" value="<?php echo ($orgid)?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="<?php echo ($orgid)?>">Select Organization ID</option>

                <?php

                include 'php/database.php';

                $qry = "SELECT * FROM organizations";

                $result = $connection->query($qry);

                while ($row = mysqli_fetch_array($result)) {
                    $orgid = $row['org_id'];

                ?>
                <option><?php echo ($orgid)?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="pbp" class="block text-sm font-medium text-gray-700">Progress Bar Percentage</label>
            <input type="text" id="pbp" value="<?php echo ($pbp)?>" name="pbp" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
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
