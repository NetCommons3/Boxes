<?php
/**
 * BoxesのElementテスト
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');

/**
 * BoxesのElementテスト
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Boxes\Test\Case\Controller
 */
class BoxesControllerTest extends NetCommonsControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	//public $fixtures = array(
	//	'plugin.boxes.box',
	//	'plugin.boxes.boxes_page',
	//);

/**
 * setUp
 *
 * @return   void
 */
	//public function setUp() {
	//	NetCommonsControllerTestCase::loadTestPlugin($this, 'Boxes', 'TestBoxes');
	//	parent::setUp();
	//}

/**
 * render_boxesエレメントのテスト
 *
 * @return void
 */
	//public function testIndex() {
	//	Current::isSettingMode(false);
	//
	//	$boxId = '3';
	//	$this->testAction(
	//		'/test_boxes/test_boxes/index/' . $boxId,
	//		array('return' => 'view')
	//	);
	//
	//	$this->assertTextNotContains('id="add-plugin-' . $boxId . '"', $this->view);
	//	$this->assertTextContains('<div class="box-site">', $this->view);
	//}

/**
 * render_boxesエレメントのセッティングモード時のテスト
 *
 * @return void
 */
	//public function testIndexSettingMode() {
	//	Current::isSettingMode(true);
	//
	//	$boxId = '3';
	//	$this->testAction(
	//		'/' . Current::SETTING_MODE_WORD . '/test_boxes/test_boxes/index/' . $boxId,
	//		array('return' => 'view')
	//	);
	//
	//	$this->assertTextContains('id="add-plugin-' . $boxId . '"', $this->view);
	//	$this->assertTextContains('<div class="box-site">', $this->view);
	//}

}
