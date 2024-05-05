<?php

$servername = "db";
$username = "php_docker";
$password = "password";
$dbname = "cloud";

$conn = mysqli_connect($servername, $username,$password,$dbname);

$table_name="students" ;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM $table_name";
$result = $conn->query($query);

// Adding a new student
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $cgpa = $_POST['cgpa'];

    // Checking if there is already a record with the same ID
    $check_query = "SELECT * FROM students WHERE id = '$id'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "<div class='error'>Error: This ID already exists.</div>";
    } elseif ($cgpa > 4) { // Checking if the GPA is higher than 4
        echo "<div class='error'>Error: GPA must be less than or equal to 4.</div>";
    } else {
        $sql = "INSERT INTO students (name, age, cgpa, id) VALUES ('$name', '$age', '$cgpa','$id')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Student added successfully!</div>";
        } else {
            echo "<div class='error'>Error adding student: " . $conn->error . "</div>";
        }
    }
}



if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>GPA</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['cgpa'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data to display";
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/hosting.png" type="image/x-icon">
    <title>Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0f1219;
            margin: 0;
            padding: 0;
            color: white;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #0f1219;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ffffff;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #f3f5f8; 
        }
        th {
            background-color: #0f1219;
            color: white;
        }
        form {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #0f1219;
        }
        input[type=text], input[type=number] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: black;
    background-color: #ccc; 
        }
        input[type=submit] {
            width: 100%;
            background-color: #2b68c0;
            color: white;
            padding: 10px 15px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #2b68c0;
        }
        .error {
            color: #2b68c0;
            text-align: center;
            margin-bottom: 10px;
        }
        </style>
</head>
<body>
<div class="banner">
        <div class="navbar">
            <img src="img/hosting.png" class="logo">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Contact us</a>
                </li>

            </ul>
<div class="container">

<h2>Student Data</h2>



<!-- Adding a form to add a new student -->
<h2>Add New Student</h2>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="id">ID:</label>
    <input type="number" id="id" name="id" required>
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required>
    <label for="cgpa">GPA:</label>
    <input type="number" step="0.01" id="cgpa" name="cgpa" required>
    <input type="submit" name="submit" value="Add Student">
</form>

</div>
</body>
</html>
