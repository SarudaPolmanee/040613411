<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute();

    $username = $_POST["username"];
    // echo "เพิ่มสมาชิกสำเร็จ username คือ " . $username;

    if($_FILES["uploadimg"]["tmp_name"]){
        $target_file = '../img/'.$_POST["username"].'.jpg';
        $uploaded = move_uploaded_file($_FILES["uploadimg"]["tmp_name"], $target_file);
        if($uploaded){
            header("location: detail.php?username=" . $username);
            die();
        }
}
// header("location: workshop5.php?username=" . $_POST["username"]);
?>