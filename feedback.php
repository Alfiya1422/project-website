<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $Msg = $_POST['Msg'];                

    // Create connection to MySQL database
    $conn = new mysqli('localhost', 'root', '', 'feedback');


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$sql = "INSERT INTO Customer_Records(First_Name, Last_Name, Email, Contact_No, Gender, Msg) VALUES ('$fname', '$lname', '$email', '$contact', '$gender', '$Msg')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
}
?>