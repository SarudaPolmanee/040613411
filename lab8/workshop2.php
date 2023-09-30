<?php include "connect.php" ?>
<html>
<body>
<?php

    $stmt = $pdo->prepare("SELECT * FROM member") ;
    $stmt->execute();

    while($row = $stmt->fetch()):
?>
    ชื่อสมาชิก: <?=$row["name"]?><br>
    ที่อยู่: <?=$row["address"]?><br>
    อีเมล์: <?=$row["email"]?><br>
    <?="<hr>"?>
<?php endwhile; ?>
</body>
</html>