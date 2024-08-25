<?php

include 'database.php'; 


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';


$sql = "SELECT name FROM users WHERE name1 LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$keyword%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
    
        if (!empty($keyword)) {
            $highlightedName = preg_replace("/($keyword)/i", "<span style='color:red;'>$1</span>", $name);
        } else {
            $highlightedName = $name;
        }
        echo "<tr><td>" . $highlightedName . "</td></tr>";
    }
} else {
    echo "<tr><td>No data found</td></tr>";
}

$stmt->close();
$conn->close();
?>