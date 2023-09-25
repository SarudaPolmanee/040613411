<?php include "connect.php" ?>
<html>
<body>
<div style="display:flex">
<?php

    $stmt = $pdo->prepare("SELECT * FROM product") ;
    $stmt->execute();

    while($row = $stmt->fetch()):
?>
    <div style="padding:15px; text-align:center">
        <img src='../img/product_photo/<?=$row["pid"]?>.jpg' width="100"><br>
        <?=$row["pname"]?><br><?=$row["price"]?>บาท
    </div>
<?php endwhile; ?>
</div>
</body>
</html>