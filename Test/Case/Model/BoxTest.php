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
App::uses('NetCommonsModelTestCase', 'NetCommons.TestSuite');

/**
 * Box Test Case
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\Boxes\Test\Case\Model
 */
class BoxTest extends NetCommonsModelTestCase {

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

		parent::setUp();
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
		$this->assertArrayHasKey('BoxesPage.is_published', $containableQuery['conditions']);
		$this->assertContains(true, $containableQuery['conditions']);
	}

/**
 * testGetBoxWithFrame method
 *
 * @return void
 */
	public function testGetBoxWithFrame() {
		$box = $this->Box->getBoxWithFrame(3);

		$this->assertCount(3, $box);

		$this->assertArrayHasKey('Box', $box);
		$this->assertInternalType('array', $box['Box']);
		$this->assertGreaterThanOrEqual(1, count($box['Box']));

		$this->assertArrayHasKey('Frame', $box);
		$this->assertInternalType('array', $box['Frame']);
		$this->assertGreaterThanOrEqual(1, count($box['Frame']));

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
