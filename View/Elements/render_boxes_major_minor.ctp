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

<?php foreach ($boxes as $box) : ?>
		<?php if ($this->PageLayout->hasBox($box)) : ?>
			<?php if ($box['BoxesPageContainer']['is_published']) : ?>
				<div class="panel panel-success box-panel" id="box-<?php echo $box['BoxesPageContainer']['box_id']; ?>">
					<div class="panel-heading cleafix">
						<?php echo $this->PageLayout->boxTitle($box); ?>
					</div>

					<div class="panel-body">
						<?php echo $this->PageLayout->renderAddPlugin($box); ?>
						<?php echo $this->PageLayout->renderFrames($box); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="panel panel-default box-panel" id="box-<?php echo $box['BoxesPageContainer']['box_id']; ?>">
					<div class="panel-heading cleafix">
						<?php echo $this->PageLayout->boxTitle($box); ?>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
<?php endforeach;
