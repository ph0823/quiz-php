<?php
include 'read_excel.php';
$questions = loadQuestions('questions.xlsx');
$score = 0;

echo "<h1>Kết quả làm bài</h1>";

foreach ($questions as $i => $q) {
    $correct = array_map('trim', $q['answer']);
    $submitted = $_POST["q$i"] ?? [];
    if (!is_array($submitted)) $submitted = [$submitted];
    sort($correct); sort($submitted);

    $isCorrect = ($correct == $submitted);
    if ($isCorrect) $score++;

    echo "<p><strong>Câu " . ($i+1) . ":</strong> " . htmlspecialchars($q['question']) . "<br>";
    echo "Bạn chọn: " . implode(', ', $submitted) . "<br>";
    echo "Đáp án đúng: " . implode(', ', $correct) . "<br>";
    echo "Giải thích: " . htmlspecialchars($q['explanation']) . "<br>";
    echo "<span style='color:" . ($isCorrect ? "green" : "red") . "'>" . ($isCorrect ? "Đúng" : "Sai") . "</span></p>";
}

echo "<h2>Tổng điểm: $score / " . count($questions) . "</h2>";
?>
