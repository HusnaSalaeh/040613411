<html>

<body>
    <?php
if (isset($_COOKIE["lang"])) {
    if ($_COOKIE["lang"] == "en") {
        echo "Welcome";
    } elseif ($_COOKIE["lang"] == "th") {
        echo "ยินดีต้อนรับ";
    }
} else {
    echo "คุกกี้ lang ไม่ถูกตั้งหรือไม่มีค่า";
}
?>


</body>

</html>