<?php
include($_SERVER['DOCUMENT_ROOT'].'/Bài tập/BTTH/BTTH1/BT1/data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <?php foreach ($hoa as $flower): ?>
        <div>
            <h2><?php echo $flower['name']; ?></h2>
            <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width:200px;height:auto;">
            <p><?php echo $flower['description']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
