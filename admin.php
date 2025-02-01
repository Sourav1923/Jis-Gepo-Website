<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle Approve/Reject actions for Collaboration Requests
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['request_id'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    if (!empty($request_id) && in_array($action, ['Approve', 'Reject'])) {
        $status = ($action == 'Approve') ? 'Approved' : 'Rejected';
        $stmt = $conn->prepare("UPDATE collaboration_requests SET status = ? WHERE id = ?");
        $stmt->bind_param('si', $status, $request_id);
        $stmt->execute();
    }
}

// Handle Approve/Reject actions for Visa Applications
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['visa_id'])) {
    $visa_id = $_POST['visa_id'];
    $visa_action = $_POST['visa_action'];
    $remarks = $_POST['remarks'] ?? null;

    if (!empty($visa_id) && in_array($visa_action, ['Approve', 'Reject'])) {
        $visa_status = ($visa_action == 'Approve') ? 'Approved' : 'Rejected';
        $stmt = $conn->prepare("UPDATE visa_applications SET status = ?, remarks = ? WHERE id = ?");
        $stmt->bind_param('ssi', $visa_status, $remarks, $visa_id);
        $stmt->execute();
    }
}

// Handle Enquiry Status Update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enquiry_id'])) {
    $enquiry_id = $_POST['enquiry_id'];
    $enquiry_status = $_POST['enquiry_status'];
    $remarks = $_POST['remarks'] ?? null;

    if (!empty($enquiry_id) && in_array($enquiry_status, ['Resolved', 'Rejected'])) {
        $stmt = $conn->prepare("UPDATE enquiries SET status = ?, remarks = ? WHERE id = ?");
        $stmt->bind_param('ssi', $enquiry_status, $remarks, $enquiry_id);
        $stmt->execute();
    }
}

include 'header.php';
?>
<div class="container">
    <?php include 'sidebar.php'; ?>

    <main>
        <h1>Admin Dashboard</h1>

        <!-- Collaboration Requests -->
        <div class="collaboration-requests">
            <h2>Collaboration Requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>Organization Name</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $requests = $conn->query("SELECT * FROM collaboration_requests ORDER BY request_date DESC");
                    while ($row = $requests->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['organization_name']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "<td class='{$row['status']}'>{$row['status']}</td>";
                        echo "<td>
                            <form method='POST'>
                                <input type='hidden' name='request_id' value='{$row['id']}'>
                                <button name='action' value='Approve' class='approve'>Approve</button>
                                <button name='action' value='Reject' class='reject'>Reject</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Visa Applications -->
        <div class="visa-applications">
            <h2>Visa Applications</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Action</th>
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
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td>
                            <form method='POST'>
                                <input type='hidden' name='visa_id' value='{$row['id']}'>
                                <textarea name='remarks' placeholder='Add remarks'></textarea>
                                <button name='visa_action' value='Approve' class='approve'>Approve</button>
                                <button name='visa_action' value='Reject' class='reject'>Reject</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Enquiries -->
        <div class="enquiries">
            <h2>Enquiries</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>College</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Enquiry Details</th>
                        <th>Request Date</th>
                        <th>Status</th>
                        <th>Action</th>
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
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['message']}</td>";
                        echo "<td>{$row['request_date']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td>
                            <form method='POST'>
                                <input type='hidden' name='enquiry_id' value='{$row['id']}'>
                                <textarea name='remarks' placeholder='Add remarks'></textarea>
                                <button name='enquiry_status' value='Resolved' class='approve'>Mark as Resolved</button>
                                <button name='enquiry_status' value='Rejected' class='reject'>Reject</button>
                            </form>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>
</div>

<?php include 'footer.php'; ?>
