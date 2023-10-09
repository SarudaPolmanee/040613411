<?php session_start(); ?>

<html>
<body>
<h1>สวัสดี 
    <?php
        if (($_SESSION["username"]) == 'somsak' ) { 
            echo "ADMIN ";
        } 
    ?>
    <?=$_SESSION["fullname"]?>
</h1>
<a href="product-list.php">รายการสั่งซื้อ</a><br>
<?php
    if (($_SESSION["username"]) == 'somsak' ) { 
        echo "<a href='quantity-left.php'>สินค้าคงเหลือ</a><br>\n";    
    } 
?>หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>
</body>
</html>
