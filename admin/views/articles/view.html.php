<?php
// administrator\components\com_blog\views\articles\view.html.php

defined('_JEXEC') or die;

class BlogViewArticles extends JViewLegacy
{
	public function display($tpl = null)
	{
		$this->items = $this->get('Items');

		$this->addToolbar();

		parent::display($tpl);
	}

	public function addToolbar()
	{
		JToolbarHelper::title('Articles');

		JToolbarHelper::addNew('article.add');
	}
}
