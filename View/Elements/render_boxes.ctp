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
	<?php if (Page::isSetting()): ?>
		<?php echo $this->element('Pages.add_plugin', array('boxId' => $boxId)); ?>

		<p>
			<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-<?php echo (int)$boxId; ?>">

				<span class="glyphicon glyphicon-pushpin"></span>

				<?php if ($containerType === Container::TYPE_HEADER) : ?>
					<?php echo __d('boxes', 'Add plugin to header'); ?>
				<?php elseif ($containerType === Container::TYPE_MAJOR) : ?>
					<?php echo __d('boxes', 'Add plugin to left'); ?>
				<?php elseif ($containerType === Container::TYPE_MINOR) : ?>
					<?php echo __d('boxes', 'Add plugin to right'); ?>
				<?php elseif ($containerType === Container::TYPE_FOOTER) : ?>
					<?php echo __d('boxes', 'Add plugin to footer'); ?>
				<?php else : ?>
					<?php echo __d('boxes', 'Add plugin to center'); ?>
				<?php endif; ?>
			</button>
		</p>
	<?php endif; ?>

	<?php if (! empty($box['frame'])) : ?>
		<div class="box-site">
			<?php echo $this->element('Frames.render_frames', array(
					'frames' => $box['frame']
				)); ?>
		</div>
	<?php endif; ?>
<?php endforeach;
