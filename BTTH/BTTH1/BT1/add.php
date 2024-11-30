<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFlower = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'image' => $_POST['image'],
    ];
    header('Location: /Bài tập/BTTH/BTTH1/BT1/admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm loài hoa</title>
</head>
<body>
    <h1>Thêm loài hoa mới</h1>
    <form method="post">
        <label>ID: <input type="text" name="id" required></label><br>
        <label>Tên hoa: <input type="text" name="name" required></label><br>
        <label>Mô tả: <textarea name="description" required></textarea></label><br>
        <label>Ảnh: <input type="text" name="image" required></label><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
