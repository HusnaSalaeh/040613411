<?php
include "connect.php";
session_start();
// ตรวจสอบว่ามีชอใน ื่ session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"]) ) {
header("location: login-form.php");
}
?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
while ($row = $stmt->fetch()) {
echo "ชื่อผู้ใช้ : " . $row ["username"] . "<br>";
echo "อีเมล: " . $row ["email"] . " บาท <br>";
echo "<hr>\n";
}
?>
</body>

</html>