<?php include "connect.php" ?>

<?php
    $stmt = $pdo->prepare("UPDATE member SET member.name=?, member.address=?, member.mobile=?, member.email=? WHERE username=?");
    $stmt->bindParam(1, $_POST["name"]);
    $stmt->bindParam(2, $_POST["address"]);
    $stmt->bindParam(3, $_POST["mobile"]);
    $stmt->bindParam(4, $_POST["email"]);
    $stmt->bindParam(5, $_POST["username"]);
    if ($stmt->execute())
        echo "แก้ไขข้อมูลของ" . $_POST["name"] . "สำเร็จ";
?>