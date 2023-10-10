<html>

<body>
    <?php
    // if (isset($_GET["language"])) {
        // ตรวจสอบว่าคุกกี้ "lang" ว่างหรือไม่
        if (empty($_COOKIE["lang"])) {
            setcookie("lang", $_GET["language"], time() + 3600);
        }
    // }
    if (isset($_COOKIE["lang"])) {
        setcookie("lang", $_GET["language"], time() + 10);
    }
    ?>
    <a href="main.php">Go to main</a>
</body>

</html>