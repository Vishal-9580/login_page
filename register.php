<?php
// 1. Database Connection
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password (empty)
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Form Data Receive करना
$name = $_POST['name'];
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = $_POST['password'];
$hobbies = isset($_POST['hobby']) ? implode(", ", $_POST['hobby']) : "";

// 3. Insert Query
$sql = "INSERT INTO students (name, father_name, gender, mobile, email, password, hobbies) 
        VALUES ('$name', '$fname', '$gender', '$mobile', '$email', '$password', '$hobbies')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green;'>✅ Registration Successful!</h2>";
    echo "<a href='index.html'>Go Back</a>";
} else {
    echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
