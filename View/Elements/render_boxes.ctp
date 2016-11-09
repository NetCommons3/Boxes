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
?>

<div class="boxes-<?php echo $containerType; ?>">
	<?php
		echo $this->PageLayout->renderBoxes($containerType, $boxes);
	?>
</div>