<?php
// administrator\components\com_blog\views\articles\tmpl\default.php

defined('_JEXEC') or die;

$currentOrder = $this->state->get('list.ordering', 'asc');
$currentDir   = $this->state->get('list.direction', 'asc');
?>
<form action="<?php echo JUri::getInstance(); ?>" id="adminForm" name="adminForm" method="post">

	<div class="filter-bar">
		<div class="btn-wrapper input-append">
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->state->get('filter.search'); ?>" placeholder="搜尋">
			<button type="submit" class="btn">
				<i class="icon-search"></i>
			</button>
		</div>
	</div>

	<table class="table table-striped">
		<thead>
		<tr>
			<th><?php echo JHtmlGrid::sort('ID', 'id', $currentDir, $currentOrder); ?></th>
			<th><?php echo JHtmlGrid::sort('Title', 'title', $currentDir, $currentOrder); ?></th>
			<th><?php echo JHtmlGrid::sort('Intro', 'intro', $currentDir, $currentOrder); ?></th>
			<th><?php echo JHtmlGrid::sort('Delete', 'delete', $currentDir, $currentOrder); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($this->items as $item): ?>
			<tr>
				<td><?php echo $item->id; ?></td>
				<td>
					<a href='<?php echo JRoute::_('index.php?option=com_blog&task=article.edit&id=' . $item->id); ?>'>
						<?php echo $this->escape($item->title); ?>
					</a>
				</td>
				<td><?php echo JString::substr(strip_tags($item->introtext), 0, 50); ?></td>
				<td>
					<a href="<?php echo JRoute::_('index.php?option=com_blog&task=article.delete&id=' . $item->id); ?>"
						class="btn">
						<span class="icon-trash text-error"></span>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<div class="hidden-inputs">
		<input type="hidden" name="option" value="com_blog" />
		<input type="hidden" name="task" value="" />

		<input name="filter_order" type="hidden" value="" />
		<input name="filter_order_Dir" type="hidden" value="" />
	</div>
</form>
