<?php
include 'db.php'; // Include the database connection
include 'header.php'; // Include the header

// Fetch details of all pending requests
$requestsQuery = "SELECT * FROM collaboration_requests WHERE status = 'Pending' ORDER BY request_date DESC";
$requestsResult = $conn->query($requestsQuery);
?>

<div class="container">
    <!-- Include Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <main>
        <h1>Messages</h1>
        <div class="messages-container">
            <h2>Pending Collaboration Requests</h2>
            <?php if ($pendingCount > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Request Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $requestsResult->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['organization_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['country']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo htmlspecialchars($row['request_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No pending collaboration requests.</p>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include 'footer.php'; // Include the footer ?>
