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
<head><meta charset="utf-8"></head>
<body>
<?php

// ข้อ 2
    echo $username. "<br>";
    if($username == "somsak"){
        $stmt = $pdo->prepare("SELECT username,COUNT(ord_id) FROM orders GROUP BY username");
        $stmt->execute();
     
        while ($row = $stmt->fetch()) {
            echo "ชื่อผู้ใช้: " . $row ["username"] . "<br>";
            echo "จำนวนออเดอร์: " . $row ["COUNT(ord_id)"] . "<br>";
            echo "<a href='user-item.php?username=" . $row["username"] . "'>รายการคำสั่งซื้อ</a>\n";
            echo "<hr>\n";
        }

        // ข้อ 1: ณ เวลานี้กำนดให้สมศักดิ์เป็น admin ไปก่อน
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE username = '$username'");
        $stmt->execute();
    
        while ($row = $stmt->fetch()) {
            echo "รหัสสินค้า: " . $row ["ord_id"] . "<br>";
            echo "วันที่สั่งสินค้า: " . $row ["ord_date"] . "<br>";
            echo "สถานะ: " . $row ["status"] . " <br>";
            echo "<hr>\n";
        }
    }
?>
</body>
</html>
