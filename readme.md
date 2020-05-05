# Docker LNMP + Redis 环境

app 目录存放对应的项目文件，config 中保存了对应的 Nginx 、 MySQL 、 PHP-FPM 以及 Redis 相关配置，data 主要是存放了容器数据的 data。

注意，测试的时候由于是在容器中，直接使用 IP 之类的容器是无法访问的。所以我们要用容器的服务名。

例子 1：

```php
// 原来使用ip这里使用 docker-compose php-fpm中对应links: mysql-db服务名
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
```

例子 2：

```php
// 原来使用ip这里使用 docker-compose php-fpm中对应links: redis-db服务名
$redis = new Redis();
$redis->connect('redis-db', 6379);
$redis ->set("test", "Hello World");
echo $redis ->get("test");
```
