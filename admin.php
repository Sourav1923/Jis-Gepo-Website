<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle Approve/Reject actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    if (!empty($request_id) && in_array($action, ['Approve', 'Reject'])) {
        $status = ($action == 'Approve') ? 'Approved' : 'Rejected';
        $stmt = $conn->prepare("UPDATE collaboration_requests SET status = ? WHERE id = ?");
        $stmt->bind_param('si', $status, $request_id);
        if ($stmt->execute()) {
            echo "<script>alert('Request $action successfully!');</script>";
        } else {
            echo "<script>alert('Error updating request.');</script>";
        }
    }
}

include 'header.php';
?>

<div class="container">
    <?php include 'sidebar.php'; ?>

    <main>
        <h1>Collaboration Management</h1>
        
        <!-- Insights -->
        <div class="insights">
            <?php
            $collaborations = $conn->query("SELECT COUNT(*) as total FROM collaboration_requests WHERE status = 'Approved'");
            $collabCount = $collaborations->fetch_assoc()['total'] ?? 0;
            ?>
            <div class="collaborations">
                <h3>Total Collaborations</h3>
                <h1><?php echo $collabCount; ?></h1>
            </div>
        </div>

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
                            <form method='POST' style='display:inline;'>
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
    </main>
</div>

<?php include 'footer.php'; ?>
