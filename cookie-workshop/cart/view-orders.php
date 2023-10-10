<?php
include "connect.php";
session_start();

// ตรวจสอบสิทธิ์ของผู้ใช้
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
    exit();
}

// ตรวจสอบสิทธิ์ของผู้ใช้ (ในกรณีที่ต้องการ)
if ($_SESSION["role"] !== "Admin") {
    header("location: select.php");
    exit();
}

// รับ username ที่ส่งมาผ่าน URL parameter
if (isset($_GET["username"])) {
    $username = $_GET["username"];
} else {
    // หากไม่ระบุ username ให้กลับไปที่หน้า select.php
    header("location: select.php");
    exit();
}

// ดึงข้อมูล Order ของผู้ใช้นี้
$stmt = $pdo->prepare("SELECT * FROM orders WHERE username = :username");
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h1>รายการ Order ของผู้ใช้: <?php echo $username; ?></h1>
    <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>วันที่สั่ง</th>
            <th>สถานะ</th>
        </tr>
        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row["ord_id"] . "</td>";
            echo "<td>" . $row["ord_date"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="select.php">กลับสู่หน้าหลัก</a>
</body>

</html>