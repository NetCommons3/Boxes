<?php
/**
 * BoxesのElementテスト
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

//App::uses('BoxesController', 'Boxes.Controller');
//App::uses('FramesController', 'Frames.Controller');
//App::uses('YAControllerTestCase', 'NetCommons.TestSuite');
App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');
//
///**
// * Plugin controller class for testAction
// */
//class TestBoxesController extends Controller {
//
///**
// * Set to true to automatically render the view
// * after action logic.
// *
// * @var bool
// */
//	public $autoRender = false;
//
///**
// * index action
// *
// * @param string $id frameId
// * @return string
// */
//	public function index($id = null) {
//		return 'TestPluginController_index_' . $id;
//	}
//
//}
//CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * BoxesのElementテスト
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Announcements\Test\Case\Controller
 */
class BoxesControllerTest extends NetCommonsControllerTestCase {

/**
 * Plugin name
 *
 * @var array
 */
	protected $_plugin = 'test_plugin';

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		Current::$current['Language']['id'] = '2';

		NetCommonsControllerTestCase::loadTestPlugin($this, 'NetCommons', 'TestPlugin');
		NetCommonsControllerTestCase::loadTestPlugin($this, 'Boxes', 'TestBoxes');
		parent::setUp();
	}

/**
 * Return setting mode text
 *
 * @param string $id Box ID
 * @return void
 */
	//private function __getSettingModeText($id) {
	//	$text = '<section class="modal fade" id="add-plugin-' . $id;
	//	return $text;
	//}

/**
 * render_boxesエレメントのテスト
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/test_boxes/test_boxes/index/3', array(
			'return' => 'view'
		));

//		debug($this->view);

		//$needle = $this->__getSettingModeText('1');
		//$this->assertTextNotContains($needle, $this->view);
		$this->assertTextContains('<div class="box-site">', $this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testIndexNotFound() {
		//$this->setExpectedException('NotFoundException');
		//$this->testAction('/boxes/boxes/index');
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		//$this->testAction('/' . Current::SETTING_MODE_WORD . '/boxes/boxes/index/1', array('return' => 'view'));
		//
		//$needle = $this->__getSettingModeText('1');
		//$this->assertTextContains($needle, $this->view);
		//$this->assertTextContains('<div class="box-site">', $this->view);
	}

}
