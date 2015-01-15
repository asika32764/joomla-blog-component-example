<?php
// administrator\components\com_blog\models\articles.php

defined('_JEXEC') or die;

class BlogModelArticles extends JModelLegacy
{
	public function getItems()
	{
		$db = JFactory::getDbo();

		// Or using $db = $this->_db;

		$sql = "SELECT * FROM #__blog_articles";

		$db->setQuery($sql);

		// If not thing found, return empty array.
		return $db->loadObjectList() ? : array();
	}
}
