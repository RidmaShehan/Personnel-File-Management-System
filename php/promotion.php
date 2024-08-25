<?php
include 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['employee-id'];
    $class = $_POST['class'];
    $class1 = $_POST['class1'];
    $class2 = $_POST['class2'];
    $class3 = $_POST['class3'];

 
    $stmt = $conn->prepare("INSERT INTO promotions (employee_id, class, class1_date, class2_date, class3_date) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $employeeId, $class, $class1, $class2, $class3);

   
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>