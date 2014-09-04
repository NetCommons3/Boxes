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

/**
 * Summary for BoxesController Test Case
 */
class BoxesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
		'plugin.boxes.site_setting',
		'plugin.boxes.site_setting_value',
		'plugin.boxes.page',
		'plugin.boxes.plugin',
		'plugin.frames.frame',
		'plugin.frames.language',
		'plugin.frames.frames_language'
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
		$text = '<button ' .
			'class="btn btn-primary form-control" ' .
			'data-toggle="modal" ' .
			'data-target="#pluginList" ' .
			'ng-controller="PluginController" ' .
			'ng-click="showPluginList(' . $id . ')">';
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
		$this->assertTextContains('<div class="box-site box-id-1">', $this->view);
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
		$this->assertTextContains('<div class="box-site box-id-1">', $this->view);
	}

}
