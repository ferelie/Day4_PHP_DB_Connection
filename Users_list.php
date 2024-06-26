<?php

// import database_info.php responsible for saving db info, connection and checking connection
require 'database_info.php';

// Get all users
$sql = "SELECT id, name, email, gender, receive_emails FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="users_list.css">
</head>
<body>
    <div class="header"><h1>Users List</h1><button><a href="Reg_Form.php">Add New User</a></button></div>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Receive Emails</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . ($row["receive_emails"] ? "Yes" : "No") . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Database is empty, No users found</td></tr>";
        }
        ?>
    </table>
    <br>
    
</body>
</html>

<?php
$conn->close();
?>
