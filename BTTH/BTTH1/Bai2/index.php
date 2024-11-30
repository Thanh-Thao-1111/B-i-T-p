<?php
$filename = "quiz.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$all_questions = [];
$answers = [];

foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            $all_questions[] = $current_question;
        }
        $current_question = [];
    }
    $current_question[] = $line;
}
$all_questions[] = $current_question; //thêm câu hỏi cuối cùng vào mảng

//mảng đáp án
foreach ($questions as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Trắc Nghiệm</h1>
        <form action="/Bài Tập/BTTH/BTTH1/Bai2/result.php" method="POST" >
            <?php
            $question_number = 1;
            foreach ($all_questions as $question) {
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
                echo "<div class='card-body'>";
                for ($i = 1; $i <= 4; $i++) {
                    $answer = substr($question[$i], 0, 1);// A, B, C, D
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answer}' id='question{$question_number}{$answer}'>";
                    echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$question[$i]}</label>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                $question_number++;
            }
            ?>
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>