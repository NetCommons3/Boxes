<?php
/**
 * Box Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('Box', 'Boxes.Model');

/**
 * Summary for Box Test Case
 */
class BoxTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.box',
		//'plugin.boxes.container',
		//'plugin.boxes.space',
		//'plugin.boxes.room',
		//'plugin.boxes.page',
		//'plugin.boxes.boxes_page',
		//'plugin.boxes.frame'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Box = ClassRegistry::init('Boxes.Box');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Box);

		parent::tearDown();
	}

/**
 * test method
 *
 * @return void
 */
	public function test() {
	}
}
