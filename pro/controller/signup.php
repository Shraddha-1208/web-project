<?php
// Database connection parameters
$host= "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$database = "cruise";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['psw'];
    
    }
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // SQL query to insert data into the table

    $sql = "INSERT INTO `signup`(`email`, `psw`) VALUES ('".$email."','".$password."')";
    
    try {
        $conn->query($sql);
        // If data inserted successfully, redirect to success page
        echo "<script>
        alert('Successful');
        window.location.href = '../about.html';
      </script>";
    } catch(mysqli_sql_exception $e) {
        // If there's an error inserting data, redirect to error page
        echo "<script>
        alert('UnSuccessful');
        window.location.href = '../signup.html';
      </script>";
      exit();
    }

// Close connection
$conn->close();
?>
