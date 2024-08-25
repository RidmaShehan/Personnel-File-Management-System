<?php
include 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['employee-id'];
    $acom1 = $_POST['acom1'];
    $acom2 = $_POST['acom2'];
    $acom3 = $_POST['acom3'];
    $alan = $_POST['alan'];

 
    echo "employeeId: $employeeId<br>";
    echo "acom1: $acom1<br>";
    echo "acom2: $acom2<br>";
    echo "acom3: $acom3<br>";
    echo "alan: $alan<br>";

   
    $stmt = $conn->prepare("INSERT INTO activity (employee_id, acom1, acom2, acom3, alan) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("issss", $employeeId, $acom1, $acom2, $acom3, $alan);

   
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>