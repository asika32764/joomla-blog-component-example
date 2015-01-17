<?php
// administrator\components\com_blog\views\articles\view.html.php

defined('_JEXEC') or die;

class BlogViewArticles extends JViewLegacy
{
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		$this->addToolbar();

		parent::display($tpl);
	}

	public function addToolbar()
	{
		JToolbarHelper::title('Articles');

		JToolbarHelper::addNew('article.add');
	}
}
