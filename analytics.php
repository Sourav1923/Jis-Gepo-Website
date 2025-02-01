<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

include 'header.php';
?>

<div class="container">
    <?php include 'sidebar.php'; ?>

    <main>
        <h1>Analytics Dashboard</h1>

        <!-- Insights Section -->
        <div class="insights">
            <?php
            $collaborations = $conn->query("SELECT COUNT(*) as total FROM collaboration_requests WHERE status = 'Approved'");
            $collabCount = $collaborations->fetch_assoc()['total'] ?? 0;

            $visaApps = $conn->query("SELECT COUNT(*) as total FROM visa_applications");
            $visaCount = $visaApps->fetch_assoc()['total'] ?? 0;

            $enquiries = $conn->query("SELECT COUNT(*) as total FROM enquiries");
            $enquiryCount = $enquiries->fetch_assoc()['total'] ?? 0;
            ?>
            <div class="insight-card collaborations">
                <h3>Total Collaborations</h3>
                <h1><?php echo $collabCount; ?></h1>
            </div>
            <div class="insight-card collaborations">
                <h3>Total Visa Applications</h3>
                <h1><?php echo $visaCount; ?></h1>
            </div>
            <div class="insight-card collaborations">
                <h3>Total Enquiries</h3>
                <h1><?php echo $enquiryCount; ?></h1>
            </div>
        </div>

        <!-- Analytics Tables Section -->
        <div class="data-section">
            <h2>Detailed Analytics</h2>

            <!-- Collaborations Table -->
            <h3>Approved Collaborations</h3>
            <table>
                <thead>
                    <tr>
                        <th>Organization Name</th>
                        <th>Request Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $requests = $conn->query("SELECT * FROM collaboration_requests WHERE status = 'Approved' ORDER BY request_date DESC");
                    while ($row = $requests->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['organization_name']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Visa Applications Table -->
            <h3>Visa Applications Overview</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th>Country</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $visaRequests = $conn->query("SELECT * FROM visa_applications ORDER BY request_date DESC");
                    while ($row = $visaRequests->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['college']}</td>";
                        echo "<td>{$row['country']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Enquiries Table -->
            <h3>Enquiries Overview</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th>Phone</th>
                        <th>Enquiry Details</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $enquiryRequests = $conn->query("SELECT * FROM enquiries ORDER BY request_date DESC");
                    while ($row = $enquiryRequests->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['college']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</div>