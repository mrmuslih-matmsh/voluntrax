<?php 

include 'components/layouts/header.php';
include 'php/database.php';


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM organizations_monthly_breakdown WHERE omb_id= '$id'";

    $result = mysqli_query($connection, $sql);

    while($row=mysqli_fetch_array($result)){
    $id = $row['omb_id'];
    $ohtid = $row['oht_id'];
    $ombm = $row['omb_month'];
    $ombh = $row['omb_hours'];
    }

}



if (isset($_POST['ohtid']) && isset($_POST['ombm']) && isset($_POST['ombh']) && isset($_GET['id']))
{
    $id = $_GET['id'];
    $ohtid = $_POST['ohtid'];
    $ombm = $_POST['ombm'];
    $ombh = $_POST['ombh'];
    
    // Prepare and execute the SQL query
    $sql = "UPDATE organizations_monthly_breakdown set oht_id= '$ohtid', omb_month= '$ombm', omb_hours= '$ombh' where omb_id= '$id'";
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
    <h2 class="text-2xl font-semibold mb-4">Edit Organizations Monthly Breakdown</h2>
    <form action="#" method="post" class="w-full">
        <div class="mb-4">
            <label for="org_id" class="block text-sm font-medium text-gray-700">OHT ID</label>
            <select id="org_id" name="ohtid" value="<?php echo ($ohtid)?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="<?php echo ($ohtid)?>">Select Organizations Hours ID</option>

                <?php

                include 'php/database.php';

                $qry = "SELECT * FROM organization_hours_tracker";

                $result = $connection->query($qry);

                while ($row = mysqli_fetch_array($result)) {
                    $ohtid = $row['oht_id'];

                ?>
                <option><?php echo ($ohtid)?></option>

                <?php
                }
                ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="day" class="block text-sm font-medium text-gray-700">Organizations Monthly Breakdown Month</label>
            <input type="text" id="day" name="ombm" value="<?php echo ($ombm)?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="hours" class="block text-sm font-medium text-gray-700">Organizations Monthly Breakdown Hours</label>
            <input type="text" id="hours" name="ombh" value="<?php echo ($ombh)?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
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
