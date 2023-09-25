<?php include "../condb.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        echo "<table border='1' >";
        echo "<tr>";
        echo "<th>รหัสสินค้า</th>";
        echo "<th>ชื่อสินค้า</th>";
        echo "<th>รายละเอียดสินค้า</th>";
        echo "<th>ราคา</th>";
        echo "</tr>";
        echo "<tr>";
        while ($row = $stmt->fetch()) {

        echo "<td>". $row ["pid"] ."</td>";
        echo "<td>". $row ["pname"] ."</td>";
        echo "<td>". $row ["pdetail"] ."</td>";
        echo "<td>". $row ["price"] ."</td>";
        echo "</tr>";
  }
    ?>
</body>

</html>