<?php
 include 'database.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $employee_id = filter_var($_POST['employee-id'], FILTER_SANITIZE_STRING);
    $nic = filter_var($_POST['nic'], FILTER_SANITIZE_STRING);
    $name1 = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $position = filter_var($_POST['option1'], FILTER_SANITIZE_STRING);
    $appointment_date = filter_var($_POST['input1'], FILTER_SANITIZE_STRING);
    $permanent = filter_var($_POST['option4'], FILTER_SANITIZE_STRING);
    $grade = filter_var($_POST['input2'], FILTER_SANITIZE_STRING);
    $salary_code = filter_var($_POST['option2'], FILTER_SANITIZE_STRING);
    $increment_date = filter_var($_POST['input3'], FILTER_SANITIZE_STRING);
    $efficiency_bar = filter_var($_POST['option3'], FILTER_SANITIZE_STRING);
    $retirement_date = filter_var($_POST['input4'], FILTER_SANITIZE_STRING);
    $dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
    $address1 = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $status1 = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $whatsapp = filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING);

  
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/project/uploads/';


if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true); 
}

// Full path where the photo will be saved
$photo_name = $_FILES['photo']['name'];
$photo_tmp_name = $_FILES['photo']['tmp_name'];
$photo_folder = $upload_dir . $photo_name; 


if (move_uploaded_file($photo_tmp_name, $photo_folder)) {
   
    $relative_path = 'uploads/' . $photo_name; 

    $stmt = $conn->prepare("INSERT INTO users (employee_id, nic, name1, position, appointment_date, permanent, grade, salary_code, increment_date, efficiency_bar, retirement_date, dob, address1, gender, status1, email, whatsapp, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

 
    $stmt->bind_param("ssssssssssssssssss", $employee_id, $nic, $name1, $position, $appointment_date, $permanent, $grade, $salary_code, $increment_date, $efficiency_bar, $retirement_date, $dob, $address1, $gender, $status1, $email, $whatsapp, $relative_path);


    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

  
    $stmt->close();
} else {
    echo "Failed to upload photo.";
}
}
//id increement
$sql = "SELECT COUNT(*) as count FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$next_employee_id = $row['count'] + 1;


echo json_encode(['next_employee_id' => $next_employee_id]);



$conn->close();
?>