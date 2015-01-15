<?php
// administrator\components\com_blog\models\example.php

defined('_JEXEC') or die;

class BlogModelExample extends JModelLegacy
{
	public function getItem()
	{
		$item = new stdClass;

		$item->title = 'Example View & Template';
		$item->content = 'Go go let\'s go~~~!!!!';
		$item->date = new JDate('now', 'Asia/Taipei');

		return $item;
	}
}
