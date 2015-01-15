<?php
// administrator\components\com_blog\models\article.php

defined('_JEXEC') or die;

class BlogModelArticle extends JModelLegacy
{
	public function getItem()
	{
		$input = JFactory::getApplication()->input;

		$id = $input->get('id');

		if (!$id)
		{
			return false;
		}

		$sql = "SELECT * FROM #__blog_articles WHERE id = " . $id;

		return $this->_db->setQuery($sql)->loadObject();
	}

	public function save($data)
	{
		$db = $this->_db;

		$id = $data['id'];

		// 把 $data 內的每個元素用單引號包起來，並且跳脫不合法字元
		foreach ($data as &$value)
		{
			$value = $db->quote($value);
		}

		// 有 id 時用 update
		if ($id)
		{
			$sql = "UPDATE #__blog_articles SET "
				. "title = " . $data['title']
				. ", alias = " . $data['alias']
				. ", created = " . $data['created']
				. ", introtext = " . $data['introtext']
				. ", `fulltext` = " . $data['fulltext']
				. " WHERE id = " . $data['id'];
		}

		// 沒有 id 時用 insert
		else
		{
			$sql = "INSERT INTO #__blog_articles"
				. " (title, alias, created, introtext, `fulltext`) "
				. " VALUES (" . implode(', ', $data) . ")";
		}

		$db->setQuery($sql);

		return $db->execute();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM #__blog_articles WHERE id = " . (int) $id;

		return $this->_db->setQuery($sql)->execute();
	}
}
