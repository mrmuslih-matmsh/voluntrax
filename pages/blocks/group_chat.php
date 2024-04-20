<div class="py-2 px-4 border-bottom d-none d-lg-block">
    <div class="d-flex align-items-center py-1">
        <div class="position-relative">
            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1"
                alt="Sharon Lessman" width="40" height="40">
        </div>
        <div class="flex-grow-1 pl-3">
            <strong>Sharon Lessman</strong>
            <div class="text-muted small"><em>Typing...</em></div>
        </div>
        <div>
            <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg">
                    <circle cx="12" cy="12" r="1"></circle>
                    <circle cx="19" cy="12" r="1"></circle>
                    <circle cx="5" cy="12" r="1"></circle>
                </svg>
            </button>
        </div>
    </div>
</div>

<div class="position-relative">
    <div class="chat-messages p-4">

        <?php

        if ($user_type == 'individual') {
            $sql = "SELECT * FROM individuals WHERE email='$email'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["int_id"];
                }
            }

        } elseif ($user_type == 'organization') {
            $sql = "SELECT * FROM organizations WHERE email='$email'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["org_id"];
                }
            }
        }

        // Fetch messages from database
        $sql = "SELECT * FROM group_chat WHERE group_name = 'General' ORDER BY timestamp DESC";
        $result = $connection->query($sql);

        // Display messages
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $message_content = $row["message_content"];
                $sender = $row["participant_id"];
                $timestamp = $row["timestamp"];

                // Determine if the message is from the current user or the other user
                $message_class = ($sender == "$id") ? "chat-message-right" : "chat-message-left";

                // Output the message HTML
                echo "<div class='$message_class pb-4'>";
                echo "<div>";
                echo "<img src='profile_picture_url' class='rounded-circle mr-1' alt='Sender' width='40' height='40'>";
                echo "<div class='text-muted small text-nowrap mt-2'>$timestamp</div>";
                echo "</div>";
                echo "<div class='flex-shrink-1 bg-light rounded py-2 px-3 " . (($sender == "$id") ? "mr-3" : "ml-3") . "'>";
                echo "<div class='font-weight-bold mb-1'>$sender</div>";
                echo "$message_content";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No messages";
        }
        ?>
    </div>
</div>

<div class="flex-grow-0 py-3 px-4 border-top">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Type your message">
        <button class="btn btn-primary">Send</button>
    </div>
</div>