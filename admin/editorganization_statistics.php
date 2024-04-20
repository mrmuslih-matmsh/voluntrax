<?php 

include 'components/layouts/header.php';
include 'php/database.php';


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // Prepare and execute the SQL query
    $sql = "SELECT * FROM organization_statistics WHERE os_id= '$id'";

    $result = mysqli_query($connection, $sql);

    while($row=mysqli_fetch_array($result)){
    $id = $row['os_id'];
    $totalh = $row['total_hours'];
    $oppc = $row['opportunities_completed'];
    $impacta = $row['impact_achieved'];
    $lastup = $row['last_updated'];
    $orgid = $row['org_id'];

    }

}



if (isset($_POST['totalh']) && isset($_POST['oppc']) && isset($_POST['impacta']) && isset($_POST['lastup']) && isset($_POST['orgid']) && isset($_GET['id']))
{
    $id = $_GET['id'];
    $totalh = $_POST['totalh'];
    $oppc = $_POST['oppc'];
    $impacta = $_POST['impacta'];
    $lastup = $_POST['lastup'];
    $orgid = $_POST['orgid'];
    
    // Prepare and execute the SQL query
    $sql = "UPDATE organization_statistics SET total_hours = '$totalh', opportunities_completed = '$oppc', impact_achieved = '$impacta', last_updated = NOW(), org_id = '$orgid' WHERE os_id = '$id'";
   
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
    <h2 class="text-2xl font-semibold mb-4">Edit Organization Statistics</h2>
    <form action="#" method="POST" class="w-full">
        <div class="mb-4">
            <label for="th" class="block text-sm font-medium text-gray-700">Total Hours</label>
            <input type="text" id="th" name="totalh" value="<?php echo $totalh; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="oc" class="block text-sm font-medium text-gray-700">Opportunities Completed</label>
            <input type="text" id="oc" name="oppc" value="<?php echo $oppc; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="ia" class="block text-sm font-medium text-gray-700">Impact Achieved</label>
            <input type="text" id="ia" name="impacta" value="<?php echo $impacta; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="lp" class="block text-sm font-medium text-gray-700">Last Updated</label>
            <input type="text" id="lp" name="lastup" value="<?php echo $lastup; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" readonly>
        </div>
        <div class="mb-4">
            <label for="orgid" class="block text-sm font-medium text-gray-700">Organization ID</label>
            <select id="orgid" name="orgid" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="">Select Organization ID</option>

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

<!-- Link To JavaScript -->
<script src="js/time.js"></script>

</body>
</html>
