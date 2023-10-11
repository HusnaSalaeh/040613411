<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost:3307", "root", "","blueshop");
// if ($conn) {
// // mysqli_select_db("blueshop");
// mysqli_query("SET NAMES utf8");
// } else {
// echo mysqli_errno();
// }
$sql = "SELECT * FROM member WHERE username LIKE '%$keyword%'";
$objQuery = mysqli_query($conn,$sql);
?>
<table border="1">
    <?php while($row = mysqli_fetch_array($objQuery)): ?>
    <tr>
        <td><a href="productDetail.php?pid=<?php echo $row["username"]?>"><?php echo
$row["username"]?></a></td>
        <td><?php echo $row["name"]?></td>
        <td><img src="img-user/<?php echo $row["username"] ?>.jpg" width="100"></td>
        <td><?php echo $row["address"]?> </td>
        <td><?php echo $row["mobile"]?> </td>
        <td><?php echo $row["email"]?> </td>
        <!-- <td><a href="cart.php?productId=<?php echo $row["pid"]?>&action=add">แก้ไข</a> -->

    </tr>
    <?php endwhile;?>
</table>