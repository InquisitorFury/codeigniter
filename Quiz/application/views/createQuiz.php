<!-- create_quiz_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create Quiz</title>
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
        h1, h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .question {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>Create a New Quiz</h1>
    <form method="post" action="<?php echo base_url('index.php/Quizgame/create_quiz'); ?>">
        <label for="quiz_name">Quiz Name:</label>
        <input type="text" id="quiz_name" name="quiz_name">

        <h2>Add Questions</h2>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <div class="question">
                <label for="question_<?php echo $i; ?>">Question <?php echo $i; ?>:</label>
                <input type="text" id="question_<?php echo $i; ?>" name="question_<?php echo $i; ?>">
                <label for="choice1_<?php echo $i; ?>">Choice 1:</label>
                <input type="text" id="choice1_<?php echo $i; ?>" name="choice1_<?php echo $i; ?>">
                <label for="choice2_<?php echo $i; ?>">Choice 2:</label>
                <input type="text" id="choice2_<?php echo $i; ?>" name="choice2_<?php echo $i; ?>">
                <label for="choice3_<?php echo $i; ?>">Choice 3:</label>
                <input type="text" id="choice3_<?php echo $i; ?>" name="choice3_<?php echo $i; ?>">
                <label for="answer_<?php echo $i; ?>">Answer:</label>
                <input type="text" id="answer_<?php echo $i; ?>" name="answer_<?php echo $i; ?>">
            </div>
        <?php endfor; ?>

        <input type="submit" value="Create Quiz">
    </form>
</div>

</body>
</html>
