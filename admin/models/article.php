<?php
// administrator\components\com_blog\models\article.php

defined('_JEXEC') or die;

class BlogModelArticle extends JModelLegacy
{
	public function getItem()
	{
		$table = $this->getTable('Article', 'BlogTable');

		$input = JFactory::getApplication()->input;

		$id = $input->get('id');

		if (!$id)
		{
			return false;
		}

		$table->load($id);

		return $table;
	}

	public function save($data)
	{
		$table = $this->getTable('Article', 'BlogTable');

		$table->bind($data);

		return $table->store();
	}

	public function delete($id)
	{
		$table = $this->getTable('Article', 'BlogTable');

		return $table->delete($id);
	}
}
