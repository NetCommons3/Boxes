<?php
/**
 * BoxesController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesController', 'Boxes.Controller');
App::uses('FramesController', 'Frames.Controller');
App::uses('YAControllerTestCase', 'NetCommons.TestSuite');

/**
 * Plugin controller class for testAction
 */
class TestPluginController extends FramesController {

/**
 * Set to true to automatically render the view
 * after action logic.
 *
 * @var bool
 */
	public $autoRender = false;

/**
 * index action
 *
 * @param string $id frameId
 * @return string
 */
	public function index($id = null) {
		return 'TestPluginController_index_' . $id;
	}

}
CakePlugin::load('TestPlugin', array('path' => 'test_plugin'));

/**
 * Summary for BoxesController Test Case
 */
class BoxesControllerTest extends YAControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.blocks.block',
		'plugin.blocks.block_role_permission',
		//'plugin.boxes.box',
		//'plugin.boxes.boxes_page',
		//'plugin.containers.container',
		//'plugin.containers.containers_page',
		//'plugin.frames.frame',
		//'plugin.m17n.language',
		//'plugin.net_commons.site_setting',
		//'plugin.pages.languages_page',
		//'plugin.pages.page',
		//'plugin.pages.space',
		//'plugin.plugin_manager.plugin',
		//'plugin.plugin_manager.plugins_room',
		//'plugin.roles.default_role_permission',
		//'plugin.rooms.roles_room',
		//'plugin.rooms.roles_rooms_user',
		//'plugin.rooms.room',
		//'plugin.rooms.room_role_permission',
		//'plugin.users.user',
		//'plugin.users.user_attributes_user',
	);

/**
 * setUp
 *
 * @return   void
 */
	public function setUp() {
		parent::setUp();

		App::uses('Page', 'Pages.Model');
		Page::unsetIsSetting();
	}

/**
 * Return setting mode text
 *
 * @param string $id Box ID
 * @return void
 */
	private function __getSettingModeText($id) {
		$text = '<section class="modal fade" id="add-plugin-' . $id;
		return $text;
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/boxes/boxes/index/1', array('return' => 'view'));

		$needle = $this->__getSettingModeText('1');
		$this->assertTextNotContains($needle, $this->view);
		$this->assertTextContains('<div class="box-site">', $this->view);
	}

/**
 * testIndexNotFound method
 *
 * @return void
 */
	public function testIndexNotFound() {
		$this->setExpectedException('NotFoundException');
		$this->testAction('/boxes/boxes/index');
	}

/**
 * testIndexSettingMode method
 *
 * @return void
 */
	public function testIndexSettingMode() {
		$this->testAction('/' . Page::SETTING_MODE_WORD . '/boxes/boxes/index/1', array('return' => 'view'));

		$needle = $this->__getSettingModeText('1');
		$this->assertTextContains($needle, $this->view);
		$this->assertTextContains('<div class="box-site">', $this->view);
	}

}
