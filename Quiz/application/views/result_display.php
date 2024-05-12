<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Results</title>

	<style type="text/css">
        /* Reset some default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Apply some basic styles to the body */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

/* Style the container */
#container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the heading */
h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #333;
}

/* Style the answers */
p {
    margin-bottom: 5px;
}

/* Style the correct and incorrect answers */
span.correct {
    background-color: #aaf0aa; /* Light green for correct answers */
    padding: 5px 10px;
    border-radius: 5px;
}

span.incorrect {
    background-color: #f0a0a0; /* Light red for incorrect answers */
    padding: 5px 10px;
    border-radius: 5px;
}

/* Style the submit button */
input[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

input[type="submit"]:hover {
    background-color: #45a049; /* Darker green on hover */
}

/* Your existing CSS styles */

/* Style the question container */
.question-container {
    margin-bottom: 20px;
}

/* Style the question block */
.question {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

/* Style the navigation buttons */
#prevBtn,
#nextBtn,
#submitBtn {
    padding: 10px 20px;
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

#prevBtn:hover,
#nextBtn:hover,
#submitBtn:hover {
    background-color: #45a049; /* Darker green on hover */
}

/* Hide previous button initially */
#prevBtn {
    display: none;
}


	</style>
</head>
<body>

<div id="container">
  
        <div class="question-container">
            <?php for ($x = 0; $x < count($questions); $x++) { ?>
                <div class="question" id="question<?= $x + 1; ?>" <?= $x == 0 ? '' : 'style="display: none;"'; ?>>
                    <h3><?= $questions[$x]->questionID; ?>. <?= $questions[$x]->Question; ?></h3>
                    <?php if ($questions[$x]->answer != $checks['ques' . ($x + 1)]) { ?>
                        <p><span class="incorrect"><?= $checks['ques' . ($x + 1)]; ?></span></p>
                        <p><span class="correct"><?= $questions[$x]->answer; ?></span></p>
                    <?php } else { ?>
                        <p><span class="correct"><?= $checks['ques' . ($x + 1)]; ?></span></p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div id="result"></div> <!-- Display result here -->
        <input type="button" id="prevBtn" value="Previous" style="display: none;">
        <input type="button" id="nextBtn" value="Next">
      
  
</div>

<script>
    const totalQuestions = <?= count($questions); ?>;
    let currentQuestion = 0;
    let correctAnswers = 0; // Variable to track correct answers

    function showQuestion(index) {
        document.querySelectorAll('.question').forEach((question, idx) => {
            question.style.display = idx === index ? 'block' : 'none';
        });

        document.getElementById('prevBtn').style.display = index === 0 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = index === totalQuestions - 1 ? 'none' : 'inline-block';
        document.getElementById('submitBtn').style.display = index === totalQuestions - 1 ? 'inline-block' : 'none';
    }

    document.getElementById('nextBtn').addEventListener('click', function() {
        if (currentQuestion < totalQuestions - 1) {
            currentQuestion++;
            showQuestion(currentQuestion);
        }
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        if (currentQuestion > 0) {
            currentQuestion--;
            showQuestion(currentQuestion);
        }
    });

    // Show the first question initially
    showQuestion(currentQuestion);

    // Function to calculate and display result
    function calculateResult() {
        document.getElementById('result').innerText = 'You answered ' + correctAnswers + ' out of ' + totalQuestions + ' questions correctly.';
    }

    // Event listener for form submission
    document.getElementById('quizForm').addEventListener('submit', function() {
        calculateResult();
    });

    // Update correctAnswers when an answer is correct
    document.querySelectorAll('.correct').forEach(function(answer) {
        correctAnswers++;
    });
</script>

</body>
</html>