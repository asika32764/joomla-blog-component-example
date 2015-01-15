<?php
// administrator\components\com_blog\views\article\view.html.php

defined('_JEXEC') or die;

class BlogViewArticle extends JViewLegacy
{
	public function display($tpl = null)
	{
		// 跟 Model 要資料
		$this->item = $this->get('Item');

		// 包裝進 JData 方便取資料
		$this->item = new JData($this->item);

		// 取得全站設定中的編輯器設定檔
		$config = JFactory::getConfig();

		// 呼叫編輯器物件，直接 render 出來
		$this->introEditor = JEditor::getInstance($config->get('editor'))->display('introtext', $this->item->introtext, '600px', '300px', 50, 15);
		$this->fullEditor = JEditor::getInstance($config->get('editor'))->display('fulltext', $this->item->fulltext, '600px', '300px', 50, 15);

		$this->addToolbar();

		parent::display($tpl);
	}

	public function addToolbar()
	{
		JToolbarHelper::title('Article Edit', 'pencil');

		JToolbarHelper::save('article.save');
		JToolbarHelper::cancel('article.cancel');
	}
}
