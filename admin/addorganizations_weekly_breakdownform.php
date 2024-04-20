<?php include 'components/layouts/header.php';

include 'php/database.php';


// Check if the 'save' button is clicked
if (isset($_POST['save'])) {

    // Include the database connection file
  
    // Extract form data
    $ohtid = $_POST['ohtid'];
    $own = $_POST['own'];
    $owh = $_POST['owh'];
    
    // Prepare the insert query
    $qry = "INSERT INTO organizations_weekly_breakdown (owb_id, oht_id, owb_week_number, owb_hours) VALUES (NULL, ?, ?, ?)";
  
    // Prepare the statement
    $stmt = $connection->prepare($qry);
  
    // Bind parameters
    $stmt->bind_param("iss", $ohtid, $own, $owh);
  
    // Execute the statement
    $res = $stmt->execute();
  
    // Check if the execution was successful
    if ($res) {
      // Display success message using SweetAlert
      echo "<script>
      Swal.fire({
          icon: 'success',
          title: 'Saved successfully',
          showConfirmButton: false,
          timer: 1500
      }).then(() => {
          // Redirect to a new page after success
          window.location.href = 'addorganizations_weekly_breakdownform.php';
      });
      </script>";
    } else {
      // Display error message using SweetAlert
      echo "<script>
      Swal.fire({
          icon: 'error',
          title: 'Save failed!',
          showConfirmButton: false,
          timer: 1500
      });
      </script>";
    }
  
    // Close the statement
    $stmt->close();
    // Close the database connection
    $connection->close();
  }

?>

<div class="max-w-md mx-auto bg-white rounded p-6 shadow-md flex flex-col items-center">
    <h2 class="text-2xl font-semibold mb-4">Add Organizations Weekly Breakdown</h2>
    <form action="#" method="POST" class="w-full">
        <div class="mb-4">
            <label for="org_id" class="block text-sm font-medium text-gray-700">OHT ID</label>
            <select id="org_id" name="ohtid" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
                <option value="">Select Organizations Hours ID</option>

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
            <label for="day" class="block text-sm font-medium text-gray-700">Organizations Weekly Breakdown Number</label>
            <input type="text" id="day" name="own" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label for="hours" class="block text-sm font-medium text-gray-700">Organizations Weekly Breakdown Hours</label>
            <input type="text" id="hours" name="owh" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" required>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" name="save" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mr-2">Add</button>
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
