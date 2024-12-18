<?php
$host = 'localhost';
$username = 'lab5_paris';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'] ?? ''; // Default to empty if not provided
$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");
$stmt->execute(['country' => "%$country%"]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
<?php if ($results): ?>
    <?php foreach ($results as $row): ?>
        <li><?= htmlspecialchars($row['name']) . ' is ruled by ' . htmlspecialchars($row['head_of_state']); ?></li>
    <?php endforeach; ?>
<?php else: ?>
    <li>No results found.</li>
<?php endif; ?>
</ul>