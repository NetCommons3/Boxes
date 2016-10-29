<?php
/**
 * Render boxes element.
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div class="row">
	<?php foreach ($boxes as $box): ?>
		<div class="col-xs-3" id="box-<?php echo $box['BoxesPageContainer']['box_id']; ?>">
			<?php if ($box['BoxesPageContainer']['is_published']) : ?>
				<div class="panel panel-success box-panel-head">
					<div class="panel-heading cleafix">
						<?php echo $this->PageLayout->boxTitle($containerType, $box); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="panel panel-default box-panel-head">
					<div class="panel-heading cleafix">
						<?php echo $this->PageLayout->boxTitle($containerType, $box); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>

<?php foreach ($boxes as $box): ?>
	<?php if ($box['BoxesPageContainer']['is_published']) : ?>
		<div class="panel panel-success box-panel-body">
			<div class="panel-body tab-content">
				<?php echo $this->PageLayout->renderAddPlugin($containerType, $box); ?>
				<?php echo $this->PageLayout->renderFrames($containerType, $box); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endforeach;