<?php
session_start();
include 'db.php'; // Database connection

$responseMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $organization = $_POST['organization'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($organization) && !empty($country) && !empty($phone) && !empty($email) && !empty($message)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO collaboration_requests (name, organization_name, country, phone, email, message, status, request_date) VALUES (?, ?, ?, ?, ?, ?, 'Pending', NOW())");
        $stmt->bind_param('ssssss', $name, $organization, $country, $phone, $email, $message);

        if ($stmt->execute()) {
            $responseMessage = "<p class='success'>Thank you for your submission, $name! Your request has been sent successfully.</p>";
        } else {
            $responseMessage = "<p class='error'>There was an error processing your request. Please try again later.</p>";
        }
    } else {
        $responseMessage = "<p class='error'>Please fill in all fields.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collaborator Form</title>
    <link rel="stylesheet" href="collabForm.css">
</head>
<body>
    <div class="container">
        <h1>Collaborator Form</h1>
        <?php if (!empty($responseMessage)) echo $responseMessage; ?>
        <form action="collabform.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="organization">Organization Name</label>
                <input type="text" id="organization" name="organization" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
