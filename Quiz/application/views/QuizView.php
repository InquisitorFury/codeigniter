<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Naruto Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        #container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h2 {
            color: #555;
            margin-bottom: 10px;
        }
        .quiz-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .quiz-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .quiz-name {
            font-size: 20px;
            margin-bottom: 5px;
        }
        .quiz-start-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .quiz-start-btn:hover {
            background-color: #45a049;
        }
        .no-quizzes {
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>Welcome to the Naruto Quiz!</h1>

    <?php if (!empty($quizzes)): ?>
        <?php foreach ($quizzes as $quiz): ?>
            <div class="quiz-item">
                <h2 class="quiz-name"><?php echo htmlspecialchars($quiz->Name); ?></h2>
                <form method="post" action="<?php echo base_url('index.php/Quizgame/questions/' . $quiz->quizID); ?>">
                    <button type="submit" class="quiz-start-btn">Start</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-quizzes">No quizzes available.</p>
    <?php endif; ?>
</div>

</body>
</html>
