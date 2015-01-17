<?php
// administrator\components\com_blog\models\articles.php

defined('_JEXEC') or die;

class BlogModelArticles extends JModelLegacy
{
	protected function populateState()
	{
		$app = JFactory::getApplication();

		$this->setState('filter.published', $app->getUserStateFromRequest('blog.articles.published', 'filter_published'));
		$this->setState('filter.search', $app->getUserStateFromRequest('blog.articles.search', 'filter_search'));
		$this->setState('list.ordering', $app->getUserStateFromRequest('blog.articles.ordering', 'filter_order'));
		$this->setState('list.direction', $app->getUserStateFromRequest('blog.articles.direction', 'filter_order_Dir'));

		$this->setState('list.limit', 5);
		$this->setState('list.start', $app->getUserStateFromRequest('blog.articles.start', 'limitstart'));
	}

	public function getItems()
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$limit = (int) $this->getState('list.limit', 5);
		$start = (int) $this->getState('list.start', 0);

		$ordering = $this->getState('list.ordering', 'id');
		$direction = $this->getState('list.direction', 'asc');
		$published = $this->getState('filter.published', '');
		$search = $this->getState('filter.search');

		if ($published !== '')
		{
			$query->where('published = ' . $published);
		}

		if ($search)
		{
			$conditions = '(`title` LIKE "%' . $search . '%"';
			$conditions .= ' OR `introtext` LIKE "%' . $search . '%"';
			$conditions .= ' OR `fulltext` LIKE "%' . $search . '%")';

			$query->where($conditions);
		}

		$query->select('*')
			->from('#__blog_articles')
			->order($ordering . ' ' . $direction);

		$db->setQuery($query, $start, $limit);

		// If not thing found, return empty array.
		return $db->loadObjectList() ? : array();
	}

	public function getPagination()
	{
		$query = $this->_db->getQuery();

		$query->clear('select')
			->select('COUNT(*)');

		$total = $this->_db->setQuery($query)->loadResult();
		$limit = (int) $this->getState('list.limit', 5);
		$start = (int) $this->getState('list.start', 0);

		return new JPagination($total, $start, $limit);
	}
}
