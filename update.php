<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <div class="form-container">
            <?php
            include 'db_connect.php';
            $id = $_GET['id'];
            $sql = "SELECT id, name, email, phone FROM students WHERE id=$id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $conn->close();
            ?>
            <form action="process.php" method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
                <button type="submit">Update Student</button>
            </form>
        </div>
    </div>
</body>
</html>
