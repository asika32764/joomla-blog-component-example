<?php
// administrator\components\com_blog\views\articles\tmpl\default.php

defined('_JEXEC') or die;

$currentOrder = $this->state->get('list.ordering', 'asc');
$currentDir   = $this->state->get('list.direction', 'asc');
$filterPublished = (string) $this->state->get('filter.published', '');
?>
<form action="<?php echo JUri::getInstance(); ?>" id="adminForm" name="adminForm" method="post">

	<div class="filter-bar">
		<div class="btn-wrapper input-append">
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->state->get('filter.search'); ?>" placeholder="搜尋">
			<button type="submit" class="btn">
				<i class="icon-search"></i>
			</button>
		</div>

		<div class="pull-right filter-inputs">
			<select name="filter_published" id="filter_published" onchange="this.form.submit();">
				<option value="">- 請選擇 -</option>
				<option value="1" <?php echo ($filterPublished == '1') ? 'selected="selected"' : ''; ?>>發佈</option>
				<option value="0" <?php echo ($filterPublished == '0') ? 'selected="selected"' : ''; ?>>未發佈</option>
			</select>
		</div>
	</div>

	<table class="table table-striped">
		<thead>
		<tr>
			<th><?php echo JHtmlGrid::sort('ID', 'id', $currentDir, $currentOrder); ?></th>
			<th><?php echo JHtmlGrid::sort('Title', 'title', $currentDir, $currentOrder); ?></th>
			<th><?php echo JHtmlGrid::sort('Published', 'published', $currentDir, $currentOrder); ?></th>
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
				<td>
					<?php if ($item->published): ?>
					<span class="label label-success">發佈</span>
					<?php else: ?>
					<span class="label label-important">未發佈</span>
					<?php endif; ?>
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
		<tfoot>
		<tr>
			<td colspan="10">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
		</tfoot>
	</table>

	<div class="hidden-inputs">
		<input type="hidden" name="option" value="com_blog" />
		<input type="hidden" name="task" value="" />

		<input name="filter_order" type="hidden" value="<?php echo $currentOrder; ?>" />
		<input name="filter_order_Dir" type="hidden" value="<?php echo $currentDir ?>" />
	</div>
</form>
