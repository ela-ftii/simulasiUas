<?php
// Hardcoded database config parameters
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_ci4';
$port = 3306;

// Connect to MySQL server and select database
$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . PHP_EOL);
}

echo "Connected to MySQL database '$dbname' at $host:$port" . PHP_EOL;

// Tables to drop
$tables = ['user', 'product', 'migrations'];

foreach ($tables as $table) {
    $sql = "DROP TABLE IF EXISTS $table";
    if ($conn->query($sql) === TRUE) {
        echo "Table '$table' dropped successfully or did not exist." . PHP_EOL;
    } else {
        echo "Error dropping table '$table': " . $conn->error . PHP_EOL;
    }
}

$conn->close();
?>
