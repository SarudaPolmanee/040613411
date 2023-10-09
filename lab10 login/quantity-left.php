<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }

    $username = $_SESSION["username"];
?>

<html>
<head>
<meta charset="utf-8">
<style>
    table,th,tr,td{
        border: 1px solid black;
        text-align: center;
    }
    .left {
        text-align: left;
    }
</style>
</head>
<body>
<?php
    if($username == "somsak"){
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        echo "<h1>สินค้าคงเหลือ</h1>";
        echo "<table>";
        echo "<tr>";
            echo "<th>รหัสสินค้า</th>";
            echo "<th>วันที่สั่งสินค้า</th>";
            echo "<th>รายละเอียดสินค้า</th>";
            echo "<th>ราคา</th>";
            echo "<th>จำนวนคงเหลือ</th>";
        echo "</tr>";
        while ($row = $stmt->fetch()) {
            echo "<tr>";
                echo "<td>". $row ["pid"] ."</td>";
                echo "<td>". $row ["pname"] ."</td>";
                echo "<td class='left'>". $row ["pdetail"] ."</td>";
                echo "<td>". $row ["price"] ."</td>";
                echo "<td>". 3 ."</td>"; //หากมี attribute สินค้าคงเหลือใน database จึงค่อย fetch เข้ามา
            echo "</tr>";
        }
        echo "</table>";
    }
?>
</body>
</html>
