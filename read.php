<?php
include 'db_connect.php';

$sql = "SELECT id, name, email, phone FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td class='action-buttons'>";
        echo "<a href='edit.php?id=" . $row["id"] . "' class='edit-btn'>Edit</a>";
        echo "<a href='process.php?action=delete&id=" . $row["id"] . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this student?');\">Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No students found.</td></tr>";
}

$conn->close();
?>
