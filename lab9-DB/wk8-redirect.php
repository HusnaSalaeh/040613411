<?php
include "../condb.php";

$stmt = $pdo->prepare("INSERT INTO member (username,password, name, address, mobile, email) VALUES (?,?, ?, ?, ?, ?)");

// Bind values to the placeholders
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$stmt->execute();
// $username = $pdo->lastInsertId();
$username = $_POST["username"];

header("location: wk5-detail.php?username=" . $username);
?>

<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    เพิ่ม user เสร็จ ชื่อ username ใหม่คือ <?= $username ?>
</body>

</html>