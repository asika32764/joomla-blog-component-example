<?php
// administrator\components\com_blog\models\articles.php

defined('_JEXEC') or die;

class BlogModelArticles extends JModelLegacy
{
	public function getItems()
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select('*')
			->from('#__blog_articles')
			->where('published >= 1')
			->order('id ASC');

		$db->setQuery($query);

		// If not thing found, return empty array.
		return $db->loadObjectList() ? : array();
	}
}
