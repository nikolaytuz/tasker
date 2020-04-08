<h1 class="text-center mt-5"> login</h1>
	<form class="w-100 text-center" action="/login/log" method="get">

		<?php if ($data): ?>
			<div class="alert alert-primary w-25 mx-auto" role="alert">неправильный логин или пароль</div>
		<?php endif; ?>

		<input type="login" name="login" required class="mt-3" placeholder="login" value=""><br>
		<input type="text" name="password" required class="mt-3" placeholder="password" value=""><br>
		<input type="submit" name=""  class="mt-3 btn btn-primary px-5" value="Войти">
	</form>
