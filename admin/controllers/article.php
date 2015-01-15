<?php
// administrator\components\com_blog\controllers\article.php

defined('_JEXEC') or die;

class BlogControllerArticle extends JControllerLegacy
{
	public function add()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_blog&view=article&layout=edit', false));
	}

	public function edit()
	{
		$id = $this->input->get('id');

		$this->setRedirect(JRoute::_('index.php?option=com_blog&view=article&layout=edit&id=' . $id, false));
	}

	public function save()
	{
		// 只取得 POST 的資料
		$post = $this->input->post;

		// 將 POST 資料塞進一個陣列中，用 getString() 避免不合法字元
		$data['id']      = $post->getInt('id');
		$data['title']   = $post->getString('title');
		$data['alias']   = $post->getString('alias');
		$data['created'] = $post->getString('created');

		// HTML 資料必須用 getRaw()，不然會被過濾掉
		$data['introtext'] = $post->getRaw('introtext');
		$data['fulltext']  = $post->getRaw('fulltext');

		// 取得 Article Model 並執行 save()
		$model = $this->getModel('Article');

		$model->save($data);

		// save() 完成後我們跳回 Article List 頁面
		$this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false));
	}

	public function cancel()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false));
	}

	public function delete()
	{
		$id = $this->input->get('id');

		if (!$id)
		{
			$this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false), '沒有 ID', 'warning');

			return false;
		}

		$model = $this->getModel('Article');

		$model->delete($id);

		$this->setRedirect(JRoute::_('index.php?option=com_blog&view=articles', false), '刪除成功');
	}
}
