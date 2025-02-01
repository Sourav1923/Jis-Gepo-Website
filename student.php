<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header('Location: login.php');
    exit;
}

$student_email = $_SESSION['username'];
include 'header.php';
?>

<div class="container">
    <main>
        <h1>Student Dashboard</h1>
        <!-- Quick Actions -->
        <div class="actions">
    <a href="visaform.php" style="padding: 0.75rem 1.5rem; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 1rem; transition: background 0.3s;" onmouseover="this.style.backgroundColor='#0056b3';" onmouseout="this.style.backgroundColor='#007bff';">Apply for Visa</a>
    <a href="enquiryform.php" style="padding: 0.75rem 1.5rem; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; transition: background 0.3s;" onmouseover="this.style.backgroundColor='#0056b3';" onmouseout="this.style.backgroundColor='#007bff';">Submit an Enquiry</a>
</div>

        <!-- Visa Applications -->
        <div class="visa-applications">
            <h2>Your Visa Applications</h2>
            <table>
                <thead>
                    <tr>
                        <th>Application ID</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Applied On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $visaRequests = $conn->query("SELECT * FROM visa_applications WHERE email='$student_email' ORDER BY request_date DESC");
                    while ($row = $visaRequests->fetch_assoc()) {
                        $statusClass = strtolower($row['status']);
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['country']}</td>";
                        echo "<td class='{$statusClass}'>{$row['status']}</td>";
                        echo "<td>{$row['remarks']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Enquiries -->
        <div class="enquiries">
            <h2>Your Enquiries</h2>
            <table>
                <thead>
                    <tr>
                        <th>Enquiry ID</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Submitted On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $enquiries = $conn->query("SELECT * FROM enquiries WHERE email='$student_email' ORDER BY request_date DESC");
                    while ($row = $enquiries->fetch_assoc()) {
                        $statusClass = strtolower($row['status']);
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td class='{$statusClass}'>{$row['status']}</td>";
                        echo "<td>{$row['remarks']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div style="margin-top: 1rem;"> 
        <a href="logout.php" style="padding: 0.75rem 1.5rem; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; margin-right: 1rem; transition: background 0.3s;" onmouseover="this.style.backgroundColor='#0056b3';" onmouseout="this.style.backgroundColor='#007bff';">Logout</a>
        </div>        
    </main>
</div>

<?php include 'footer.php'; ?>