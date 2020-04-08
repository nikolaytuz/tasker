<h1 class="text-center mt-5"> Добавить задание</h1>
	<form class="w-100 text-center" action="/main/add" method="get">

		<?php if ($data): ?>
			<div class="alert alert-success w-25 mx-auto" role="alert">Добавлено</div>
		<?php endif; ?>

		<input type="name" name="name" class="mt-3 col-2" placeholder="Имя" value=""><br>
		<input type="email" name="email" class="mt-3 col-2" placeholder="Почта" value=""><br>
		<textarea type="text" name="text" class="mt-3 col-2" placeholder="Задание" value=""></textarea><br>
		<input type="submit" name=""  class="mt-3 btn btn-primary col-2 px-5" value="Добавить">
	</form>
