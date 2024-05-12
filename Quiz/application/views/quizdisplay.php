<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($quiz_name); ?> quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50; /* Green color */
        }

        form {
            margin-top: 20px;
        }

        .question {
            display: none;
        }

        .question.active {
            display: block;
        }

        h3 {
            margin-bottom: 10px;
            color: #333; /* Dark gray color */
        }

        input[type='radio'] {
            margin-right: 5px;
        }

        input[type='submit'] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50; /* Green color */
            color: #fff; /* White color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type='submit']:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50; /* Green color */
            color: #fff; /* White color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049; /* Darker green color on hover */
        }

        .btn.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-container .btn:not(:last-child) {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div id="container">
    <h1>Welcome to the <?= htmlspecialchars($quiz_name); ?> QUIZ!</h1>
    <form id="quizForm" method='post' action="<?php echo base_url();?>index.php//Quizgame/resultdisplay/<?=htmlspecialchars($quiz_id); ?>">
        <div class="question-container">
            <?php foreach($questions as $key => $row) {?>
                <div class="question <?= $key === 0 ? 'active' : '' ?>">
                    <?php $ans_array = array($row->choice1, $row->choice2, $row->choice3, $row->answer);
                    shuffle($ans_array);?>
                    <h3><?= ($key + 1) ?>. <?= $row->Question ?></h3>
                    <input type='radio' name="quizid<?= $key + 1 ?>" value="<?= $ans_array[0] ?>"><?= $ans_array[0] ?><br>
                    <input type='radio' name="quizid<?= $key + 1 ?>" value="<?= $ans_array[1] ?>"><?= $ans_array[1] ?><br>
                    <input type='radio' name="quizid<?= $key + 1 ?>" value="<?= $ans_array[2] ?>"><?= $ans_array[2] ?><br>
                    <input type='radio' name="quizid<?= $key + 1 ?>" value="<?= $ans_array[3] ?>"><?= $ans_array[3] ?><br>
                </div>
            <?php } ?>
        </div>
        <div class="btn-container">
            <button type="button" class="btn" id="prevBtn" disabled>Previous</button>
            <button type="button" class="btn" id="nextBtn">Next</button>
            <input type='submit' value='Submit!' id="submitBtn" style="display: none;">
        </div>
    </form>
</div>

<script>
    const questions = document.querySelectorAll('.question');
    let currentQuestionIndex = 0;
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    function showQuestion(index) {
        questions.forEach((question, idx) => {
            question.classList.remove('active');
            if (idx === index) {
                question.classList.add('active');
            }
        });

        prevBtn.disabled = index === 0;
        nextBtn.disabled = index === questions.length - 1;
        submitBtn.style.display = index === questions.length - 1 ? 'block' : 'none';
    }

    prevBtn.addEventListener('click', function () {
        currentQuestionIndex--;
        showQuestion(currentQuestionIndex);
    });

    nextBtn.addEventListener('click', function () {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
    });

    showQuestion(currentQuestionIndex);
</script>
</body>
</html>
