<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!empty($name) && !empty($username) && !empty($password) && !empty($role)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (name, username, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $name, $username, $hashed_password, $role);

        if ($stmt->execute()) {
            $success = "Registration successful! You can now log in.";
        } else {
            $error = "Error: Could not complete registration.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <img src="homologo.png" alt="Logo" style="display: block; margin: 0 auto 1rem; width: 100px;">
        <h2>Register</h2>
        <?php 
        if (isset($success)) { echo "<p class='success'>$success</p>"; }
        if (isset($error)) { echo "<p class='error'>$error</p>"; } 
        ?>
        <form action="register.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="admin">Admin</option>
                <option value="faculty">Faculty</option>
                <option value="student">Student</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
