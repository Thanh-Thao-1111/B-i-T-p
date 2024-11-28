<?php
include('/Bài 1/data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh sách hoa</title>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <a href="add.php">Thêm hoa</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên hoa</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hoa as $hoa1): ?>
                <tr>
                    <td><?php echo $hoa1['id']; ?></td>
                    <td><?php echo $hoa1['name']; ?></td>
                    <td><?php echo $hoa1['description']; ?></td>
                    <td><img src="<?php echo $hoa1['image']; ?>" alt="<?php echo $hoa1['name']; ?>" style="width:100px;"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $hoa1['id']; ?>">Sửa</a> | 
                        <a href="delete.php?id=<?php echo $hoa1['id']; ?>" onclick="return confirm('Bạn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
