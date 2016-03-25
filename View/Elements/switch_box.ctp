<?php
/**
 * ボックスの切り替え
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

if ($box['page_id'] === $box['BoxesPage']['page_id']) {
	$boxPageType = Box::TYPE_WITH_PAGE;
} elseif ($box['room_id'] === Current::read('Room.id') && Current::read('Room.id') !== Room::PUBLIC_PARENT_ID) {
	$boxPageType = Box::TYPE_WITH_ROOM;
} else {
	$boxPageType = Box::TYPE_WITH_SITE;
}

if ($containerType === Container::TYPE_MAIN) {
	$options = array();
} elseif (Current::read('Room.id') === Room::PUBLIC_PARENT_ID) {
	$options = array(
		Box::TYPE_WITH_SITE => __d('boxes', 'Public space type'),
		Box::TYPE_WITH_PAGE => __d('boxes', 'Page type'),
	);
} else {
	$options = array(
		Box::TYPE_WITH_SITE => __d('boxes', 'Public space type'),
		Box::TYPE_WITH_ROOM => __d('boxes', 'Room type'),
		Box::TYPE_WITH_PAGE => __d('boxes', 'Page type'),
	);
}
$options = Hash::remove($options, $boxPageType);

$this->request->data['Box'] = $box;
$this->request->data['BoxesPage'] = $box['BoxesPage'];
?>

<?php echo $this->NetCommonsForm->create('BoxesPage',
		array('url' => $this->NetCommonsHtml->url('/boxes/boxes_pages/edit'), 'class' => 'form-inline')
	); ?>

	<?php echo $this->NetCommonsForm->hidden('Room.id', array('value' => Current::read('Room.id'))); ?>
	<?php echo $this->NetCommonsForm->hidden('Page.id', array('value' => Current::read('Page.id'))); ?>
	<?php echo $this->NetCommonsForm->hidden('Page.permalink', array('value' => Current::read('Page.permalink'))); ?>
	<?php echo $this->NetCommonsForm->hidden('BoxesPage.id'); ?>
	<?php //echo $this->NetCommonsForm->hidden('Box.page_id', array('value' => Current::read('Page.id'))); ?>
	<?php echo $this->NetCommonsForm->hidden('BoxesPage.page_id'); ?>
	<?php echo $this->NetCommonsForm->hidden('BoxesPage.is_published'); ?>
	<?php echo $this->NetCommonsForm->hidden('Box.container_id'); ?>
	<?php echo $this->NetCommonsForm->hidden('Box.weight'); ?>
	<?php echo $this->NetCommonsForm->select('Box.type', $options,
		array(
			'type' => 'select',
			'empty' => __d('boxes', 'Switch box'),
			'class' => 'form-control input-sm boxes-pages-input-size',
			'disabled' => $containerType === Container::TYPE_MAIN,
			'onchange' => 'submit()'
		)
	); ?>

<?php echo $this->NetCommonsForm->end();
