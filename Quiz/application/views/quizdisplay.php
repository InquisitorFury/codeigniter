<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo htmlspecialchars($quiz_name); ?> quiz</title>

	<style type="text/css">
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to the <?php echo htmlspecialchars($quiz_name); ?> QUIZ!</h1>
    <?php $counter = 1; // Initialize the counter ?>
    <?php foreach($questions as $row) {?>
    <?php $ans_array = array($row ->choice1, $row->choice2, $row->choice3, $row->answer);
    shuffle($ans_array);?>
    <h3><?=$counter?>.<?=$row->Question?></h3>
    <input type='radio' name='questionID<?=$row->questionID?>' value="<?=$ans_array[0]?>"><?=$ans_array[0]?><br>
    <input type='radio' name='questionID<?=$row->questionID?>' value="<?=$ans_array[1]?>"><?=$ans_array[1]?><br>
    <input type='radio' name='questionID<?=$row->questionID?>' value="<?=$ans_array[2]?>"><?=$ans_array[2]?><br>
    <input type='radio' name='questionID<?=$row->questionID?>' value="<?=$ans_array[3]?>"><?=$ans_array[3]?><br>
    <?php $counter++; // Increment the counter after each iteration ?>
    <?php }?>
</div>

</body>
</html>
