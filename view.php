<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registered Students</title>
<style>
body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
table { border-collapse: collapse; width: 100%; background: #fff; }
th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
th { background: #4CAF50; color: white; }
tr:nth-child(even) { background: #f2f2f2; }
</style>
</head>
<body>
<h2>Registered Students</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Father Name</th>
<th>Gender</th>
<th>Mobile</th>
<th>Email</th>
<th>Hobbies</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['father_name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['email']}</td>
                <td>{$row['hobbies']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();
?>
</table>

<br>
<a href="index.html">Go Back to Registration</a>
</body>
</html>
