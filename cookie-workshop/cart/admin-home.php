<?php
// ตรวจสอบสิทธิ์ของผู้ใช้
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
    exit();
}

// ตรวจสอบสิทธิ์ของผู้ใช้
if ($_SESSION["username"] === "Admin") {
    echo '<a href="view-orders.php?username=admin">ดูรายการ Order ของ Admin</a><br>';
}

// ดึงข้อมูลผู้ใช้และจำนวน Order ของแต่ละคน
$stmt = $pdo->prepare("SELECT username, COUNT(*) AS order_count FROM orders GROUP BY username");
$stmt->execute();
?>

<!-- แสดงรายการผู้ใช้และจำนวน Order ในตาราง -->
<table>
    <tr>
        <th>ชื่อผู้ใช้</th>
        <th>จำนวน Order</th>
        <th>ดูรายการ Order</th>
    </tr>
    <?php
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["order_count"] . "</td>";
        // เพิ่มลิงก์หรือปุ่มสำหรับดูรายการ Order
        echo '<td><a href="view-orders.php?username=' . $row["username"] . '">ดูรายการ Order</a></td>';
        echo "</tr>";
    }
    ?>
</table>
<a href="logout.php">ออกจากระบบ</a>