<?php
include 'database.php'; 


$stmt = $conn->prepare("INSERT INTO salary_increments (employee_id, increment_date, increment_active, increment_reduction, reduction_duration, temporary_suspension, permanent_suspension, suspension_duration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisssss", $employee_id, $increment_date, $increment_active, $increment_reduction, $reduction_duration, $temporary_suspension, $permanent_suspension, $suspension_duration);


$employee_id = $_POST['employee-id'];
$increment_date = $_POST['sinc'];
$increment_active = $_POST['salarys'] === 'yes' ? 1 : 0;
$increment_reduction = $_POST['salaryr'];
$reduction_duration = $_POST['timep'];
$temporary_suspension = $_POST['timetp'];
$permanent_suspension = $_POST['salarysp'] === 'yes' ? 1 : 0;
$suspension_duration = $_POST['timesp'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>