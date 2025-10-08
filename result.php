{\rtf1\ansi\ansicpg1252\cocoartf2822
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\pard\tx720\tx1440\tx2160\tx2880\tx3600\tx4320\tx5040\tx5760\tx6480\tx7200\tx7920\tx8640\pardirnatural\partightenfactor0

\f0\fs24 \cf0 <?php\
include 'read_excel.php';\
$questions = loadQuestions('questions.xlsx');\
$score = 0;\
\
echo "<h1>K\uc0\u7871 t qu\u7843  l\'e0m b\'e0i</h1>";\
\
foreach ($questions as $i => $q) \{\
    $correct = array_map('trim', $q['answer']);\
    $submitted = $_POST["q$i"] ?? [];\
    if (!is_array($submitted)) $submitted = [$submitted];\
    sort($correct); sort($submitted);\
\
    $isCorrect = ($correct == $submitted);\
    if ($isCorrect) $score++;\
\
    echo "<p><strong>C\'e2u " . ($i+1) . ":</strong> " . htmlspecialchars($q['question']) . "<br>";\
    echo "B\uc0\u7841 n ch\u7885 n: " . implode(', ', $submitted) . "<br>";\
    echo "\uc0\u272 \'e1p \'e1n \u273 \'fang: " . implode(', ', $correct) . "<br>";\
    echo "Gi\uc0\u7843 i th\'edch: " . htmlspecialchars($q['explanation']) . "<br>";\
    echo "<span style='color:" . ($isCorrect ? "green" : "red") . "'>" . ($isCorrect ? "\uc0\u272 \'fang" : "Sai") . "</span></p>";\
\}\
\
echo "<h2>T\uc0\u7893 ng \u273 i\u7875 m: $score / " . count($questions) . "</h2>";\
?>\
}