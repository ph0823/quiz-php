<?php
include '../read_excel.php';
$questions = loadQuestions('questions.xlsx');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Trắc nghiệm PHP</title>
  <style>
    body { font-family: sans-serif; padding: 20px; }
    .question { margin-bottom: 20px; background: #f0f0f0; padding: 10px; border-radius: 5px; }
  </style>
</head>
<body>
  <h1>Bài kiểm tra trắc nghiệm</h1>
  <form action="result.php" method="post">
    <?php foreach ($questions as $i => $q): ?>
      <div class="question">
        <p><strong><?= $i+1 ?>. <?= htmlspecialchars($q['question']) ?></strong></p>
        <?php if ($q['image']): ?>
          <img src="images/<?= htmlspecialchars($q['image']) ?>" width="200"><br>
        <?php endif; ?>
        <?php foreach ($q['options'] as $j => $opt): 
          $letter = chr(65 + $j); ?>
          <label>
            <input type="<?= $q['type'] == 'multiple' ? 'checkbox' : 'radio' ?>" 
                   name="q<?= $i ?>[]" value="<?= $letter ?>"> <?= htmlspecialchars($opt) ?>
          </label><br>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
    <input type="submit" value="Nộp bài">
  </form>
</body>
</html>
