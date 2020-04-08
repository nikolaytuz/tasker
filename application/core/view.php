<?php

class View
{

	public $template_view = main_view.php; // здесь можно указать общий вид по умолчанию.

	
	function generate($content_view, $template_view, $data = null)
	{



		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include 'application/views/'.$template_view;
	}
}
