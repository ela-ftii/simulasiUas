<?php
// Hardcoded database config parameters from app/Config/Database.php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_ci4';
$port = 3306;

// Connect to MySQL server
$conn = new mysqli($host, $user, $pass, '', $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . PHP_EOL);
}

echo "Connected to MySQL server at $host:$port" . PHP_EOL;

// Check if database exists
$dbExists = false;
$result = $conn->query("SHOW DATABASES LIKE '$dbname'");
if ($result && $result->num_rows > 0) {
    $dbExists = true;
    echo "Database '$dbname' exists." . PHP_EOL;
} else {
    echo "Database '$dbname' does NOT exist." . PHP_EOL;
    $conn->close();
    exit(1);
}

// Connect to the database
$conn->select_db($dbname);

// Check if tables exist and count rows
$tables = ['user', 'product'];

foreach ($tables as $table) {
    $tableExists = false;
    $result = $conn->query("SHOW TABLES LIKE '$table'");
    if ($result && $result->num_rows > 0) {
        $tableExists = true;
        echo "Table '$table' exists." . PHP_EOL;
        $countResult = $conn->query("SELECT COUNT(*) as count FROM $table");
        if ($countResult) {
            $row = $countResult->fetch_assoc();
            echo "Table '$table' has " . $row['count'] . " rows." . PHP_EOL;
        } else {
            echo "Failed to count rows in table '$table'." . PHP_EOL;
        }
    } else {
        echo "Table '$table' does NOT exist." . PHP_EOL;
    }
}

$conn->close();
?>
