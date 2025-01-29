<?php
include 'db.php'; // Database connection

// Fetch the count of pending requests
$countQuery = "SELECT COUNT(*) AS pending_count FROM collaboration_requests WHERE status = 'Pending'";
$countResult = $conn->query($countQuery);
$pendingCount = ($countResult && $countResult->num_rows > 0) ? $countResult->fetch_assoc()['pending_count'] : 0;
?>
<aside>
    <div class="top">
        <div class="logo">
            <img src="homologo.png" alt="logo">
            <h2>Admin<span class="danger">Panel</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-outlined">close</span>
        </div>
    </div>

    <div class="sidebar">
        <a href="admin.php" class="active">
            <span class="material-symbols-outlined">grid_view</span>
            <h3>Dashboard</h3>
        </a>
        <a href="customer.php" class="active">
            <span class="material-symbols-outlined">person</span>
            <h3>Users</h3>
        </a>
        <a href="#">
            <span class="material-symbols-outlined">insights</span>
            <h3>Analytics</h3>
        </a>
        <a href="message.php" class="active">
            <span class="material-symbols-outlined">mail</span>
            <h3>Messages</h3>
            <span class="message-count"><?php echo $pendingCount; ?></span>
        <a href="#">
            <span class="material-symbols-outlined">settings</span>
            <h3>Settings</h3>
        </a>
        <a href="logout.php" class="active">
            <span class="material-symbols-outlined">logout</span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>
