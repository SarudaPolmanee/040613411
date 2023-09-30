<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
<script>
function confirmDelete(username) {
    var ans = confirm("ต้องการลบผู้ใช้ " + username);
    if (ans==true)
        document.location = "delete.php?username=" + username;
}
</script>
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    echo "ชื่อสมาชิก: ".$row["name"]."<br>";
    echo "ที่อยู่: ".$row["address"]."<br>";
    echo "อีเมล์: ".$row["email"]."<br>";
    echo "<a href='workshop9.php?username=" . $row ["username"] . "'>แก้ไข</a> | ";
    echo "<a href='#' onclick='confirmDelete(\"" . $row ["username"] . "\")'>ลบ</a>";
    echo "<hr>\n";
}
?>
</body>
</html>