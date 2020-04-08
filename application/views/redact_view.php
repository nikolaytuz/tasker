


<h1 class="text-center mt-5"> Редактировать задание </h1>
	<form class="w-100 text-center" action="/main/redact" method="get">

		<?php if ($data[redact]): ?>
			<div class="alert alert-success w-25 mx-auto" role="alert">Отредактировано</div>
		<?php endif; ?>

		<input type="hidden" name="id" class="mt-3 col-2 "   placeholder="Имя" value="<?php echo $data[task][id] ?>"><br>
		<input type="name" name="name" class="mt-3 col-2 " disabled  placeholder="Имя" value="<?php echo $data[task][name_us] ?>"><br>
		<input type="email" name="email" class="mt-3 col-2" disabled placeholder="Почта" value="<?php echo $data[task][email] ?>"><br>
		<textarea type="text" name="text" class="mt-3 col-2" placeholder="Задание" value=""><?php echo $data[task][text] ?></textarea><br>
		<input type="submit" name=""  class="mt-3 btn btn-primary col-2 px-5" value="Редактировать">
	</form>
