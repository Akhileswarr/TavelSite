<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Define the path to the JSON file
    $jsonFile = 'bookings.json';

    // Get form data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';

    // Create an array with form data
    $bookingData = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'date' => $date
    ];

    // Read existing data from JSON file
    $jsonData = file_get_contents($jsonFile);
    $existingData = json_decode($jsonData, true);

    // Add new booking data to the array
    $existingData[] = $bookingData;

    // Encode the array as JSON and write to the file
    $encodedData = json_encode($existingData, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $encodedData);

    // Redirect back to the booking form
    header('Location: booking.html');
    exit;
} else {
    // If the form is not submitted, redirect to the booking form
    header('Location: booking.html');
    exit;
}
?>
