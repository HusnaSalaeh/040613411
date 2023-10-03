<?php include "../condb.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>

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
    <a href='wk9-editMember.php?username=" <?= $row["username"] ?>"'>แก้ไข</a>
    <hr><br>
    <?php } ?>

</body>

</html>