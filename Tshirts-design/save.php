<?php
// save.php

// Update the database connection credentials accordingly
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sdesigns";

// Establish database connection
$conn = new mysqli('localhost', 'root', 'root', 'sdesigns');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Extract data from the received POST data
$logoURL = $_POST['logoURL'] ?? '';
$tshirtImageURL = $_POST['tshirtImageURL'] ?? '';
$logoSize = $_POST['logoSize'] ?? '';
$textContent = $_POST['textContent'] ?? '';
$textColor = $_POST['textColor'] ?? '';

// Save file URLs to the database
$stmt = $conn->prepare("INSERT INTO designs(logo_url, tshirt_image_url, logo_size, text_content, text_color) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $logoURL, $tshirtImageURL, $logoSize, $textContent, $textColor);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Design saved successfully!";
} else {
    echo "Failed to save design.";
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
