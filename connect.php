<?php
// Retrieve and validate radio input values with defaults
$allowed_values = ['1', '2', '3', '4', '5', 'N/A']; // Allowed values for radio inputs

// Function to sanitize input or set default
function getRadioValue($field, $allowed_values) {
    return isset($_POST[$field]) && in_array($_POST[$field], $allowed_values) 
        ? $_POST[$field] 
        : 'N/A';
}

// Retrieve all inputs and sanitize them
$q1 = getRadioValue('q1', $allowed_values);
$q2 = getRadioValue('q2', $allowed_values);
$q3 = getRadioValue('q3', $allowed_values);
$q4 = getRadioValue('q4', $allowed_values);
$q5 = getRadioValue('q5', $allowed_values);
$q6 = getRadioValue('q6', $allowed_values);
$q7 = getRadioValue('q7', $allowed_values);
$q8 = getRadioValue('q8', $allowed_values);
$q9 = getRadioValue('q9', $allowed_values);
$q10 = getRadioValue('q10', $allowed_values);
$q11 = getRadioValue('q11', $allowed_values);
$q12 = getRadioValue('q12', $allowed_values);
$q13 = getRadioValue('q13', $allowed_values);
$q14 = getRadioValue('q14', $allowed_values);
$q15 = getRadioValue('q15', $allowed_values);

// Handle open-ended questions (no validation needed)
$q_open1 = isset($_POST['q_open1']) ? $_POST['q_open1'] : '';
$q_open2 = isset($_POST['q_open2']) ? $_POST['q_open2'] : '';

// Database Connection
$host = '127.0.0.1'; // Use localhost for a local server
$user = 'root'; // Default XAMPP username
$pass = ''; // Default XAMPP password is empty
$db = 'seteval'; // Database name

$conn = new mysqli('127.0.0.1', 'root', '', 'seteval'); // Added database name as 'response'
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO response (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q_open1, q_open2)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssss", $q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12, $q13, $q14, $q15, $q_open1, $q_open2);

    // Execute and provide feedback
    if ($stmt->execute()) {
        echo "Response was successfully recorded...";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
