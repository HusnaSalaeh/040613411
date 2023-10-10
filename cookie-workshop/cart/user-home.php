<?php
include "connect.php";
session_start();

// ตรวจสอบว่ามีชื่อผู้ใช้ใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if($_SESSION["username"]=="Admin"){ 
    Header("Location: admin-home.php");
  }
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
    exit(); // ออกจากสคริปต์เพื่อหยุดการทำงานต่อ
}

// ดึงชื่อผู้ใช้ที่ login จาก session
$username = $_SESSION["username"];

?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "รหัสสินค้า : " . $row["ord_id"] . "<br>";
        echo "ชื่อผู้ใช้ : " . $row["username"] . "<br>";
        echo "วันที่สั่ง : " . $row["ord_date"] . "<br>";
        echo "สถานะ: " . $row["status"] . "<br>";
        echo "<hr>\n";
    }
    ?>
</body>

</html>