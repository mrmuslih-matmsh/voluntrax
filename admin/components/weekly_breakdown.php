<!-- Daily Breakdown Content Area -->
    <div id="weekly_breakdown" class="content hidden">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Weekly Breakdown</h2>
            <button
                class="bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-xl flex items-center"
                id="addWBEntryBtn">
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
                    <th class="px-4 py-2">Volunteer Id</th>
                    <th class="px-4 py-2">Weekly Breakdown Number</th>
                    <th class="px-4 py-2">Weekly Breakdown Hours</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $qry = "SELECT * FROM weekly_breakdown";

                $result = $connection->query($qry);

                $id = 1;

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['wb_id'];
                    $vhtid = $row['vht_id'];
                    $wbwn = $row['wb_week_number'];
                    $wbh = $row['wb_hours'];

                    ?>
                <tr>
                    <td class="border px-4 py-2">
                        <?php echo $id?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $vhtid?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $wbwn?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $wbh?>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="editweekly_breakdown.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-2 rounded-lg mr-2">Edit</a>
                        <a href="php/deleteweekly_breakdown.php?id=<?php echo $id ?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-lg">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Script To Add Entry Button To Click To => addweekly_breakdownform.php -->
<script>
    document.getElementById('addWBEntryBtn').addEventListener('click', function() {
    window.location.href = 'addweekly_breakdownform.php'; 
});

</script>

