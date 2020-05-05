<?php
// phpinfo();

$host = "mysql-db";

$username = "root";
$password = "123456";

$dbname = "demo";

$dsn = "mysql:host=$host;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $username, $password, []);

    /**
     * @var PDOStatement
     */
    $stmt = $pdo->prepare("select * from users");

    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($rows);
    echo '</pre>';
} catch (PDOException $e) {
    echo $e->getMessage();
}

$redis = new Redis();
$redis->connect('redis-db', 6379);
$redis ->set("test", "Hello World");
echo $redis ->get("test");
