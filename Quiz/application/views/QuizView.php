<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Naruto quiz</title>

	<style type="text/css">
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to the Naruto QUIZ!</h1>

	<?php if (!empty($quizzes)): ?>
        <?php foreach ($quizzes as $quiz): ?>
            <div>
                <h2><?php echo htmlspecialchars($quiz->Name); ?></h2>
                <form method="post" action="<?php echo base_url('index.php/Quizgame/questions/' . $quiz->quizID); ?>">
                    <input type='submit' value='Start'>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No quizzes available.</p>
    <?php endif; ?>
</div>

</body>
</html>
