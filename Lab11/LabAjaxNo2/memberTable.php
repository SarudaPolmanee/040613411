<?php include "connect.php" ?>
<?php
    $keyword = $_GET["keyword"];
    $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE '%$keyword%'");
    $stmt->execute();
?>
<table border="1">
    <tr>
        <th>รูปภาพ</th>
        <th>ชื่อผู้ใช้</th>
        <th>ชื่อ</th>
        <th>ที่อยู่</th>
        <th>เบอร์โทรศัพท์</th>
        <th>อีเมล</th>
    </tr>
<?php while($row = $stmt->fetch()): ?>
    <tr>
        <td><img src="img/<?php echo $row["username"] ?>.jpg" width="100"></td>
        <td><?php echo $row["username"]?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["address"]?></td>
        <td><?php echo $row["mobile"]?></td>
        <td><?php echo $row["email"]?></td>
    </tr>
<?php endwhile;?>
</table>