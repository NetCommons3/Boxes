<?php
/**
 * BoxesController Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesController', 'Boxes.Controller');

/**
 * Summary for BoxesController Test Case
 */
class BoxesControllerTest extends ControllerTestCase {

/**
 * AutoMock
 *
 * @var bool
 */
	public $autoMock = false;

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.box',
		'plugin.boxes.container',
		'plugin.boxes.space',
		'plugin.boxes.room',
		'plugin.boxes.page',
		'plugin.boxes.boxes_page',
		'plugin.boxes.frame',
		'plugin.boxes.site_setting',
		'plugin.boxes.site_setting_value',
		'plugin.boxes.plugin',
		'plugin.boxes.block',
		'plugin.boxes.language',
		'plugin.boxes.frames_language'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/boxes/boxes/index/1', array('return' => 'view'));
		$this->assertTextContains('<div class="frame frame-id-', $this->view);
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

}
