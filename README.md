<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README - JIS GEPO Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        code {
            background: #ddd;
            padding: 2px 5px;
            border-radius: 5px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        ul {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>JIS GEPO Website</h1>
        <p>This project is a **web-based platform** for the <strong>JIS Global Engagement & Partnerships Office (GEPO)</strong>. It provides an interactive space for students, educators, and global partners to connect, collaborate, and access important information about international programs, events, and student exchange initiatives.</p>

        <h2>🌍 What is JIS GEPO?</h2>
        <p>JIS GEPO (Global Engagement & Partnerships Office) is an initiative by JIS University to:</p>
        <ul>
            <li>Facilitate **global collaborations** with international institutions.</li>
            <li>Manage **student exchange programs**.</li>
            <li>Provide **international event updates** and partnership details.</li>
            <li>Support students in **visa applications** for foreign education.</li>
        </ul>

        <h2>🔹 Why This Website?</h2>
        <p>To ensure easy access to global opportunities, JIS GEPO needed a **centralized digital platform** where students and faculty could find everything related to international programs. This website serves as that platform.</p>

        <h2>💻 Technologies Used</h2>
        <ul>
            <li><strong>Frontend:</strong> HTML, CSS, JavaScript</li>
            <li><strong>Backend:</strong> PHP</li>
            <li><strong>Database:</strong> MySQL</li>
            <li><strong>Server:</strong> Apache (via XAMPP)</li>
        </ul>

        <h2>📂 Project Structure</h2>
        <p>This project contains various files and directories:</p>
        <ul>
            <li><strong>HTML & PHP:</strong> Handles web pages and dynamic content.</li>
            <li><strong>CSS:</strong> Styles the website.</li>
            <li><strong>JavaScript:</strong> Adds interactivity.</li>
            <li><strong>MySQL:</strong> Stores and manages database information.</li>
        </ul>

        <h2>🛠️ How to Set Up Locally</h2>
        <h3>1️⃣ Install XAMPP</h3>
        <p>Download and install <a href="https://www.apachefriends.org/index.html">XAMPP</a>.</p>

        <h3>2️⃣ Place Website Files</h3>
        <p>Copy and paste all files into the <code>htdocs</code> folder inside the XAMPP installation directory.</p>

        <h3>3️⃣ Start Apache & MySQL</h3>
        <p>Open XAMPP Control Panel and click <strong>Start</strong> for both Apache and MySQL.</p>

        <h3>4️⃣ Set Up Database</h3>
        <ul>
            <li>Go to <code>http://localhost/phpmyadmin/</code>.</li>
            <li>Create a new database named <code>test</code>.</li>
            <li>Click the <strong>Import</strong> tab and select <code>test.sql</code> from the project folder.</li>
        </ul>

        <h3>5️⃣ Access the Website</h3>
        <ul>
            <li>Open <code>http://localhost/</code> in your browser.</li>
            <li>For login: <code>http://localhost/login.php</code></li>
            <li>Admin panel: Start Apache & MySQL, then visit <code>http://localhost/phpmyadmin/</code></li>
        </ul>

        <h2>📧 Contact & Support</h2>
        <p>For any issues or queries, please reach out to the development team.</p>

        <p>🚀 Enjoy exploring global opportunities with JIS GEPO!</p>
    </div>
</body>
</html>
