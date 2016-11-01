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
	<div id="box-<?php echo $box['BoxesPageContainer']['box_id']; ?>">
		<?php echo $this->PageLayout->renderAddPlugin($box); ?>
		<?php echo $this->PageLayout->renderFrames($box); ?>
	</div>
<?php endforeach;