<?php
/**
 * Render boxes element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('Current', 'NetCommons.Utility');
App::uses('Container', 'Containers.Model');
?>

<div class="boxes-<?php echo $containerType; ?>">
	<?php
		if (! Current::isSettingMode()) {
			foreach ($boxes as $box) {
				echo $this->PageLayout->renderFrames($box);
			}
		} elseif ($containerType === Container::TYPE_HEADER || $containerType === Container::TYPE_FOOTER) {
			echo $this->element('Boxes.render_boxes_header_footer', array('boxes' => $boxes, 'containerType' => $containerType));
		} elseif ($containerType === Container::TYPE_MAIN) {
			echo $this->element('Boxes.render_boxes_main', array('boxes' => $boxes, 'containerType' => $containerType));
		} else {
			echo $this->element('Boxes.render_boxes_major_minor', array('boxes' => $boxes, 'containerType' => $containerType));
		}
	?>
</div>