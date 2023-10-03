<?php include "../condb.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>
<script>
function confirmDelete(username) {
    alert('ต้องการลบผู้ใช้ ' + username);
    document.location = "wk6-delete.php?username=" + username;
}
</script>

<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()){?>
    ชื่อสมาชิก : <?=$row ["name"]?><br>
    ที่อยู่ : <?=$row ["address"]?><br>
    อีเมล : <?=$row ["email"]?><br>
    <img src='../img/<?=$row["username"]?>.jpg' width='100'><br>
    <button>แก้ไข</button>
    <button onclick=' confirmDelete("<?= $row["username"] ?>")'>ลบ</button>
    <hr><br>
    <?php } ?>

</body>

</html>