<?php
// administrator\components\com_blog\views\example\tmpl\default.php

defined('_JEXEC') or die;
?>
<h1><?php echo $this->item->title; ?></h1>
<p><?php echo $this->item->content; ?> in <?php echo $this->item->date; ?></p>
