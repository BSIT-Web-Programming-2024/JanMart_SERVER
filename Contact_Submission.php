<?php

$servername = "localhost"; 
$username = "root";         
$password = "";             
$dbname = "contact_form";   


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nickname = $_POST['Nick Name'];
    $fullname = $_POST['Full Name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message= $_POST['message']

    $stmt = $conn->prepare("INSERT INTO contacts (nick name, full name, email, contact, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nickname, $fullname, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "Thank you for your message! We will contact and notify you as soon as posible!.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
