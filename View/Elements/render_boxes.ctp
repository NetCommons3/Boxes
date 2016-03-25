<?php
/**
 * Render boxes element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<?php foreach ($boxes as $boxId => $box): ?>
	<?php if (Current::isSettingMode()) : ?>
		<?php echo $this->element('Boxes.switch_box', array(
				'box' => $box,
				'pageId' => Current::read('Page.id'),
				'containerType' => $containerType,
			)); ?>

		<?php echo $this->element('Frames.add_plugin', array(
				'boxId' => $boxId,
				'roomId' => $box['room_id'],
				'containerType' => $containerType,
			)); ?>
	<?php endif; ?>

	<?php if (! empty($box['Frame'])) : ?>
		<div class="box-site">
			<?php echo $this->element('Frames.render_frames', array(
					'frames' => $box['Frame']
				)); ?>
		</div>
	<?php endif; ?>
<?php endforeach; ?>

<?php if (Current::isSettingMode()) : ?>
	<hr>
<?php endif;