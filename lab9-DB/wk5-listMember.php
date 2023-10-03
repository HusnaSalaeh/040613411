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
    <a href=" wk5-detail.php?username=<?=$row['username']?>">
        <img src='../img/<?=$row["username"]?>.jpg' width='100'>
    </a>
    </div>
    <?php } ?>
</body>

</html>