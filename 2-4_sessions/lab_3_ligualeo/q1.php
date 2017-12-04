<div class="container">
	<div class="question">
		<p>Snore</p>
		<div class="answers">
			<div id="leftButton" class="left">Храпеть</div>
			<div id="rightButton" class="right">Бегать</div>
		</div>
	</div>
	<div class="form_hidden">
		<form id="form" action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
			<input id="left" type='radio' name='answer' value='a1'>
			<input id="right" type='radio' name='answer' value='a2'>
			<input type='hidden' name='title' value='Ответьте на вопрос'>
			<input type='hidden' name='q' value='<?= ++$q?>'>
			<input type='submit' value='Ответить'>
		</form>
	</div>
</div>