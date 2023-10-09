<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
    
?>
        
<html>
<head><meta charset="utf-8"></head>
<body>
<?php
    
    $stmt = $pdo->prepare("SELECT * FROM item JOIN orders ON item.ord_id=orders.ord_id WHERE username = ? ");
    $stmt->bindParam(1,$_GET["username"]);
    $stmt->execute();
    echo "<h3>รายการสั่งซื้อของ ". $_GET["username"] . "</h3>";
    
    while ($row = $stmt->fetch()) {
            echo "เลขที่ออเดอร์: " . $row ["ord_id"] . "<br>";
            echo "รหัสสินค้า: " . $row ["pid"] . "<br>";
            echo "จำนวน: " . $row ["quantity"] . "<br>";
            echo "สถานะ: " . $row ["status"] . " <br>";
            echo "<hr>\n";
    }

    //ยังไม่เสร็จ
?>
</body>
</html>
