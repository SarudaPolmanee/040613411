<?php include "connect.php" ?>
<?php

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form action="editform.php" method="post">
        <input type="hidden" name="username" value="<?=$row["username"]?>">
        ชื่อ : <input type="text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่ : <br>
        <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
        โทรศัพท์: <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
        อีเมล์: <input type="email" name="email" value="<?=$row["email"]?>"><br>
        <input type="submit" value="แก้ไขข้อมูล">
    </form>
</body>
</html>