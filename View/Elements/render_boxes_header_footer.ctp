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
		<?php if ($this->PageLayout->hasBox($box)) : ?>
			<div class="col-xs-3" id="box-<?php echo $box['BoxesPageContainer']['box_id']; ?>">
				<?php if ($box['BoxesPageContainer']['is_published']) : ?>
					<div class="panel panel-success box-panel-head">
						<div class="panel-heading cleafix">
							<?php echo $this->PageLayout->boxTitle($box); ?>
						</div>
					</div>
				<?php else : ?>
					<div class="panel panel-default box-panel-head">
						<div class="panel-heading cleafix">
							<?php echo $this->PageLayout->boxTitle($box); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>

<?php foreach ($boxes as $box): ?>
	<?php if ($this->PageLayout->hasBox($box)) : ?>
		<?php if ($box['BoxesPageContainer']['is_published']) : ?>
			<div class="panel panel-success box-panel-body">
				<div class="panel-body tab-content">
					<?php echo $this->PageLayout->renderAddPlugin($box); ?>
					<?php echo $this->PageLayout->renderFrames($box); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endforeach;