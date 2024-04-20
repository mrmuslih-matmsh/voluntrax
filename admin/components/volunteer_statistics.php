 <!-- Monthly Breakdown Content Area -->
    <div id="volunteer_statistics" class="content hidden">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Volunteer Statisticsr</h2>
            <button
                class="bg-yellow hover:bg-black text-black hover:text-white font-semibold py-2 px-4 rounded-xl flex items-center"
                id="addVSEntryBtn">
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
                    <th class="px-4 py-2">Total Hours</th>
                    <th class="px-4 py-2">Opportunities Completed</th>
                    <th class="px-4 py-2">Impact Achieved</th>
                    <th class="px-4 py-2">Last Updated</th>
                    <th class="px-4 py-2">Individuals Id</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $qry = "SELECT * FROM volunteer_statistics";

                $result = $connection->query($qry);

                $id = 1;

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['vs_id'];
                    $totalh = $row['total_hours'];
                    $oppc = $row['opportunities_completed'];
                    $impacta = $row['impact_achieved'];
                    $lastup = $row['last_updated'];
                    $intid = $row['int_id'];

                    ?>
                <tr>
                    <td class="border px-4 py-2">
                        <?php echo $id ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $totalh ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $oppc ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $impacta ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $lastup ?>
                    </td>
                    <td class="border px-4 py-2">
                        <?php echo $intid ?>
                    </td>
                    <td class="border px-4 py-2">
                        <a href="editvolunteer_statistics.php?id=<?php echo $id ?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-2 rounded-lg mr-2">Edit</a>
                        <br />
                        <br />
                        <a href="php/deletevolunteer_statistics.php?id=<?php echo $id ?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-2 rounded-lg">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<!-- Script To Add Entry Button To Click To => addvolunteer_statisticsform.php -->
<script>
    document.getElementById('addVSEntryBtn').addEventListener('click', function() {
    window.location.href = 'addvolunteer_statisticsform.php'; 
});

</script>
