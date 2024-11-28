<?php
session_start();

if (isset($_GET['user_type'])) {
    $_SESSION['user_type'] = $_GET['user_type'];
    header('Location: admin.php' . ($_GET['user_type'] === 'admin' ? 'admin.php' : 'guest.php'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bạn là</title>
</head>
<body>
    <h1>CHÀO MỪNG</h1>
    <p>Chọn loại người dùng để tiếp tục:</p>
    <a href="?user_type=guest">Khách</a> | 
    <a href="?user_type=admin">Quản trị viên</a>
</body>
</html>  
