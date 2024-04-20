<!-- Daily Breakdown Content Area -->
    <div id="organizations_weekly_breakdown" class="content hidden">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Organizations Weekly Breakdown</h2>
            <button
                class="bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-xl flex items-center"
                id="addOWBEntryBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 14a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm-2-7a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-2 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                        clip-rule="evenodd" />
                </svg>
                Add Entry
            </button>
                
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">OHT ID</th>
                    <th class="px-4 py-2">Organizations WB Number</th>
                    <th class="px-4 py-2">Organizations WB Hours</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $qry = "SELECT * FROM organizations_weekly_breakdown";

                $result = $connection->query($qry);

                $id = 1;

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['owb_id'];
                    $ohtid = $row['oht_id'];
                    $own = $row['owb_week_number'];
                    $owh = $row['owb_hours'];

                    ?>
                <tr>
                    <td class="border px-4 py-2">
                        <?php echo $id?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $ohtid?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $own?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $owh?>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="editorganizations_weekly_breakdown.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-2 rounded-lg mr-2">Edit</a>
                        <a href="php/deleteorganizations_weekly_breakdown.php?id=<?php echo $id ?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-lg">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Script To Add Entry Button To Click To => addorganizations_weekly_breakdownform.php -->
<script>
    document.getElementById('addOWBEntryBtn').addEventListener('click', function() {
    window.location.href = 'addorganizations_weekly_breakdownform.php'; 
});

</script>

