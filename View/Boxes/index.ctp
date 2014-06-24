<?php
/**
 * Containers Template
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<?php if (Configure::read('Pages.isSetting')): ?>
	<p>
		<button class="btn btn-primary  form-control" data-toggle="modal" data-target="#pluginList" ng-controller="PluginController" ng-click="showPluginList(<?php echo $box['Box']['id']; ?>)">
			<span class="glyphicon glyphicon-pushpin"></span>
			<?php echo __('Add plugin'); ?>
		</button>
	</p>
<?php endif; ?>

<?php foreach ($box['Frame'] as $frame): ?>
	<div class="frame frame-id-<?php echo $frame['id']; ?>">
		<?php echo $this->requestAction('frames/frames/index/' . $frame['id'], array('return')); ?>
	</div>
<?php endforeach;
