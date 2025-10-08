{\rtf1\ansi\ansicpg1252\cocoartf2822
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <?php\
include 'read_excel.php';\
$questions = loadQuestions('questions.xlsx');\
?>\
\
<!DOCTYPE html>\
<html>\
<head>\
  <title>Tr\uc0\u7855 c nghi\u7879 m PHP</title>\
  <style>\
    body \{ font-family: sans-serif; padding: 20px; \}\
    .question \{ margin-bottom: 20px; background: #f0f0f0; padding: 10px; border-radius: 5px; \}\
  </style>\
</head>\
<body>\
  <h1>B\'e0i ki\uc0\u7875 m tra tr\u7855 c nghi\u7879 m</h1>\
  <form action="result.php" method="post">\
    <?php foreach ($questions as $i => $q): ?>\
      <div class="question">\
        <p><strong><?= $i+1 ?>. <?= htmlspecialchars($q['question']) ?></strong></p>\
        <?php if ($q['image']): ?>\
          <img src="images/<?= htmlspecialchars($q['image']) ?>" width="200"><br>\
        <?php endif; ?>\
        <?php foreach ($q['options'] as $j => $opt): \
          $letter = chr(65 + $j); ?>\
          <label>\
            <input type="<?= $q['type'] == 'multiple' ? 'checkbox' : 'radio' ?>" \
                   name="q<?= $i ?>[]" value="<?= $letter ?>"> <?= htmlspecialchars($opt) ?>\
          </label><br>\
        <?php endforeach; ?>\
      </div>\
    <?php endforeach; ?>\
    <input type="submit" value="N\uc0\u7897 p b\'e0i">\
  </form>\
</body>\
</html>\
}