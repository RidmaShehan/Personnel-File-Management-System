<?php
include 'database.php'; 

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO transfers (employee_id, transfer_date, post, previous_workplace) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $employee_id, $transfer_date, $post, $previous_workplace);

// Set parameters and execute
$employee_id = $_POST['employee-id'];
$transfer_date = $_POST['codat'];
$post = $_POST['posts'];
$previous_workplace = $_POST['earlywp'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>