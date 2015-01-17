<?php
// administrator\components\com_blog\models\articles.php

defined('_JEXEC') or die;

class BlogModelArticles extends JModelLegacy
{
	protected function populateState()
	{
		$app = JFactory::getApplication();

		$this->setState('filter.search', $app->getUserStateFromRequest('blog.articles.search', 'filter_search'));
	}

	public function getItems()
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$search = $this->getState('filter.search');

		if ($search)
		{
			$conditions = '(`title` LIKE "%' . $search . '%"';
			$conditions .= ' OR `introtext` LIKE "%' . $search . '%"';
			$conditions .= ' OR `fulltext` LIKE "%' . $search . '%")';

			$query->where($conditions);
		}

		$query->select('*')
			->from('#__blog_articles')
			->where('published >= 1')
			->order('id ASC');

		$db->setQuery($query);

		// If not thing found, return empty array.
		return $db->loadObjectList() ? : array();
	}
}
