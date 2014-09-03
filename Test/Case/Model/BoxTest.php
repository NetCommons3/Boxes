<?php
/**
 * Box Test Case
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
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
		'plugin.boxes.page',
		'plugin.boxes.boxes_page',
		'plugin.boxes.plugin',
		'plugin.frames.frame',
		'plugin.frames.language',
		'plugin.frames.frames_language'
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
 * It asserts containable query
 *
 * @param array $containableQuery Containable query
 * @return void
 */
	private function __assertContainableQuery($containableQuery) {
		$this->assertCount(3, $containableQuery);

		$this->assertArrayHasKey('order', $containableQuery);
		$this->assertCount(1, $containableQuery['order']);
		$this->assertContains('Box.weight', $containableQuery['order']);

		$this->assertArrayHasKey('Frame', $containableQuery);
		$this->assertInternalType('array', $containableQuery['Frame']);
		$this->assertGreaterThan(1, count($containableQuery['Frame']));
	}

/**
 * It asserts containable query for association page 
 *
 * @param array $containableQuery Containable query
 * @return void
 */
	private function __assertContainableQueryForAssociationPage($containableQuery) {
		$this->assertArrayHasKey('conditions', $containableQuery);
		$this->assertCount(1, $containableQuery['conditions']);
		$this->assertArrayHasKey('BoxesPage.is_visible', $containableQuery['conditions']);
		$this->assertContains(true, $containableQuery['conditions']);
	}

/**
 * testGetBoxWithFrame method
 *
 * @return void
 */
	public function testGetBoxWithFrame() {
		$box = $this->Box->getBoxWithFrame(1);

		$this->assertCount(3, $box);

		$this->assertArrayHasKey('Box', $box);
		$this->assertInternalType('array', $box['Box']);
		$this->assertGreaterThanOrEqual(1, count($box['Box']));

		$this->assertArrayHasKey('Frame', $box);
		$this->assertInternalType('array', $box['Frame']);
		$this->assertGreaterThanOrEqual(1, count($box['Frame']));

		$this->assertArrayHasKey('Plugin', $box['Frame'][0]);
		$this->assertInternalType('array', $box['Frame'][0]['Plugin']);
		$this->assertEqual(0, count($box['Frame'][0]['Plugin']));

		$this->assertArrayHasKey('Language', $box['Frame'][0]);
		$this->assertInternalType('array', $box['Frame'][0]['Language']);
		$this->assertGreaterThanOrEqual(1, count($box['Frame'][0]['Language']));

		$this->assertArrayHasKey('FramesLanguage', $box['Frame'][0]['Language'][0]);
		$this->assertInternalType('array', $box['Frame'][0]['Language'][0]['FramesLanguage']);
		$this->assertGreaterThanOrEqual(1, count($box['Frame'][0]['Language'][0]['FramesLanguage']));

		$this->assertArrayHasKey('Page', $box);
		$this->assertInternalType('array', $box['Page']);
		$this->assertGreaterThanOrEqual(1, count($box['Page']));

		$this->assertArrayHasKey('BoxesPage', $box['Page'][0]);
		$this->assertInternalType('array', $box['Page'][0]['BoxesPage']);
		$this->assertGreaterThanOrEqual(1, count($box['Page'][0]['BoxesPage']));
	}

/**
 * testGetContainableQueryAssociatedPage method
 *
 * @return void
 */
	public function testGetContainableQueryAssociatedPage() {
		$containableQuery = $this->Box->getContainableQueryAssociatedPage();

		$this->__assertContainableQuery($containableQuery);
		$this->assertArrayHasKey('Page', $containableQuery);
		$this->__assertContainableQueryForAssociationPage($containableQuery['Page']);
	}

/**
 * testGetContainableQueryNotAssociatedPage method
 *
 * @return void
 */
	public function testGetContainableQueryNotAssociatedPage() {
		$containableQuery = $this->Box->getContainableQueryNotAssociatedPage(false);

		$this->__assertContainableQuery($containableQuery);
		$this->__assertContainableQueryForAssociationPage($containableQuery);
	}

}
