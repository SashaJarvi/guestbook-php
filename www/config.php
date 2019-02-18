<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "guestbook");
define("CHARSET", "utf8");

$dsn = "mysql:host=".HOST.";dbname=".DBNAME.";charset=".CHARSET;
try {
    $dbConn = new PDO($dsn, USER, PASSWORD);
} catch (PDOException $e) {
    die("Подключение не удалось: " . $e->getMessage());
}