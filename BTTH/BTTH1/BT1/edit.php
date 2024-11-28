<?php
include('data.php');
$id = $_GET['id'];
$flower = null;

foreach ($hoa as $item) {
    if ($item['id'] == $id) {
        $flower = $item;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin hoa</title>
</head>
<body>
    <h1>Sửa thông tin hoa</h1>
    <?php if ($flower): ?>
        <form method="post">
            <label>Tên hoa: <input type="text" name="name" value="<?php echo $flower['name']; ?>"></label><br>
            <label>Mô tả: <textarea name="description"><?php echo $flower['description']; ?></textarea></label><br>
            <label>Ảnh: <input type="text" name="image" value="<?php echo $flower['image']; ?>"></label><br>
            <button type="submit">Cập nhật</button>
        </form>
    <?php else: ?>
        <p>Hoa không tồn tại!</p>
    <?php endif; ?>
</body>
</html>
