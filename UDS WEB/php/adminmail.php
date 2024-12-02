<?php
include 'config.php';

// Fetch all contacts from the database, ordered by registration date descending
$sql = "SELECT * FROM contacts ORDER BY reg_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin mail Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            animation: fadeIn 1s ease-out;
        }
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .contact-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease-out;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .contact-card h3 {
            margin-top: 0;
            color: #3498db;
        }
        .contact-card p {
            margin: 10px 0;
        }
        .contact-card .icon {
            margin-right: 10px;
            color: #3498db;
        }
        .contact-card .date {
            font-size: 0.8em;
            color: #7f8c8d;
            margin-top: 10px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideIn {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <h1>Admin mail Dashboard</h1>
    <div class="contact-grid">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='contact-card'>";
                echo "<h3><i class='fas fa-user icon'></i>" . htmlspecialchars($row["name"]) . "</h3>";
                echo "<p><i class='fas fa-envelope icon'></i>" . htmlspecialchars($row["email"]) . "</p>";
                echo "<p><i class='fas fa-comment icon'></i>" . htmlspecialchars($row["message"]) . "</p>";
                echo "<p class='date'><i class='fas fa-calendar-alt icon'></i>" . date('F j, Y, g:i a', strtotime($row["reg_date"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No contacts found.</p>";
        }
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.contact-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>