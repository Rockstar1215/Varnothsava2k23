<?php
ob_start();
$con = mysqli_connect("localhost", "root", "vedanth123", "varnothsava");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $name = isset($_POST['NAME']) ? $_POST['NAME'] : "";
    $college_name = isset($_POST['COLLEGE_NAME']) ? $_POST['COLLEGE_NAME'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $phone_no = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
    $event = isset($_POST['event']) ? $_POST['event'] : "";
    
    // Generate a unique QR code string
    $qrData = "NAME: " . $name . "\nCOLLEGE_NAME: " . $college_name . "\nEMAIL: " . $email . "\nPHONE_NUMBER: " . $phone_no . "\nEVENT: " . $event;

    // Insert the data into the database
    $query = "INSERT INTO register (NAME, COLLEGE_NAME, email, phone_number, event, Qr) 
              VALUES ('$name', '$college_name', '$email', '$phone_no', '$event', '$qrData')";

    if (mysqli_query($con, $query)) {
        // Registration successful, redirect to display_qr.php with the QR data
        header("Location: display_qr.php?qrData=" . urlencode($qrData));
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

ob_end_flush();
?>
