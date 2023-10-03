<?php include "../condb.php" ?>
<html>

<head>
    <meta charset="utf-8">
</head>


<body>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM member ");
    $stmt->bindParam(1,$_GET['username']);
    $stmt->execute();
    $row=$stmt->fetch();
    ?>
    <form action="wk9-editMember-db.php" method="post">
        username : <input type="text" name="username" value="<?=$row["username"]?>"><br>
        password : <input type="password" name="password" value="<?=$row["password"]?>"><br>
        ชื่อ : <input type=" text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่ : <input type=" text" name="address" value="<?=$row["address"]?>"><br>
        เบอร์โทรศัพท์ : <input type=" text" name="mobile" value="<?=$row["mobile"]?>"><br>
        อีเมล : <input type="text" name="email" value="<?=$row["email"]?>"><br>
        <input type="submit" value="แก้ไข">
    </form>
</body>

</html>