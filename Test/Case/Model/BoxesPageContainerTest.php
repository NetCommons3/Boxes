<?php
/**
 * BoxesPageContainer Test Case
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesPageContainer', 'Boxes.Model');

/**
 * Summary for BoxesPageContainer Test Case
 */
class BoxesPageContainerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.boxes_page_container',
		'plugin.boxes.page_container',
		'plugin.boxes.user',
		'plugin.boxes.role',
		'plugin.boxes.user_role_setting',
		'plugin.boxes.users_language',
		'plugin.boxes.language',
		'plugin.boxes.page',
		'plugin.boxes.box'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BoxesPageContainer = ClassRegistry::init('Boxes.BoxesPageContainer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BoxesPageContainer);

		parent::tearDown();
	}

}
