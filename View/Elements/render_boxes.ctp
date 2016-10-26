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
		<?php echo $this->element('Frames.add_plugin', array(
				'boxId' => $boxId,
				'roomId' => $box['Box']['room_id'],
				'containerType' => $containerType,
			)); ?>
	<?php endif; ?>

	<?php if (! empty($box['Frame'])) : ?>
		<div class="box-site">
			<?php echo $this->element('Frames.render_frames', array(
					'frames' => $box['Frame'],
					'containerType' => $containerType,
				)); ?>
		</div>
	<?php endif; ?>
<?php endforeach;
