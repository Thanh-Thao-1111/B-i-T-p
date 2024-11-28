<?php
include('/Bài 1/data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <?php foreach ($hoa as $hoa1): ?>
        <div>
            <h2><?php echo $hoa1['name']; ?></h2>
            <img src="<?php echo $hoa1['image']; ?>" alt="<?php echo $hoa1['name']; ?>" style="width:200px;height:auto;">
            <p><?php echo $hoa1['description']; ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
