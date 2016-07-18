<?php
/**
 * テストBoxesのルーティング
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
App::uses('Current', 'NetCommons.Utility');

Router::connect(
	'/' . Current::SETTING_MODE_WORD . '/test_boxes/:controller/:action/*',
	array('plugin' => 'test_boxes')
);

Router::connect(
	'/test_boxes/:controller/:action/*',
	array('plugin' => 'test_boxes')
);
