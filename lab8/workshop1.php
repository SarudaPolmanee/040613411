<?php include "connect.php" ?>
<html>
<body>
<?php

    $stmt = $pdo->prepare("SELECT * FROM product") ;
    $stmt->execute();

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>รหัสสินค้า</th>";
    echo "<th>ชื่อสินค้า</th>";
    echo "<th>รายละเอียดสินค้า</th>";
    echo "<th>ราคา</th>";
    echo "</tr>";

    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>" .$row["pid"] . "</td>";
        echo "<td>" .$row["pname"] . "</td>";
        echo "<td>" .$row["pdetail"] . "</td>";
        echo "<td>" .$row["price"] . "บาท </td>";
        echo "</tr>";
    }

    echo "</table>";
?>

</body>
</html>