<?php
// Database connection parameters
$servername= "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$database = "cruise";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // SQL query to insert data into the table
    $sql = "INSERT INTO contact (`name`, Email, `Message`) VALUES ('$name', '$email', '$message')";
    
    if (mysqli_query($conn,$sql)) {
        // If data inserted successfully, redirect to success page
        echo "<script>
        alert('Successful');
        window.location.href = '../about.html';
      </script>";
exit();
    } else {
        // If there's an error inserting data, redirect to error page
        echo "<script>
        alert('unsuccessful');
        window.location.href = '../newhome.html';
      </script>";
exit();
    }
} else {
    // If someone tries to access contact.php directly without submitting the form, redirect to contact page
    header("Location: ../newhome.html");
    exit();
}

// Close connection
mysqli_close($conn);
?>