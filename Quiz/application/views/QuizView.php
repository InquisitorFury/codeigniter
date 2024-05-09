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

    <form method='' action="<?php echo base_url();?>index.php/Quizgame/questions/1">
        <input type='submit' value='Start'>
    </form>
</div>

</body>
</html>
