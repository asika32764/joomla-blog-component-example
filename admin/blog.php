<?php
// administrator\components\com_blog\blog.php
defined('_JEXEC') or die;

// Get request input object
$input = JFactory::getApplication()->input;

// Execute the task.
$controller = JControllerLegacy::getInstance('Blog');
$controller->execute($input->get('task'));
$controller->redirect();
