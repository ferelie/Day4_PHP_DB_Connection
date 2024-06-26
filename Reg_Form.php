<?php
// import database_info.php responsible for saving db info, connection and checking connection
require 'database_info.php';

// Check if the form has been submitted and variables have been set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $receive_emails = isset($_POST['receive_emails']) ? 1 : 0;

    $sql = "INSERT INTO users (name, email, gender, receive_emails) VALUES ('$name', '$email', '$gender', '$receive_emails')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// always close connection with db after query or after timeout
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <h1>User Registration Form</h1>
    <hr>
    <p>Please fill in the form below and submit to add user to database</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div>Name: <input type="text" name="name" required></div>
        <div>Email: <input type="email" name="email" required></div>
        <div>Gender:
            <input type="radio" name="gender" value="male" required> Male
            <input type="radio" name="gender" value="female" required> Female
        </div>
        
        <div><input type="checkbox" name="receive_emails"> Receive e-mails from us?</div>
        
        <div>
            <input type="submit" value="Register">
            <button>Cancel</button>
        </div>
    </form>
    <br>
    <a href="Users_list.php">View Users</a>
</body>
</html>
