<?php
/**
 * BoxesHelperTestCase TestCase
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

//@codeCoverageIgnoreStart;
App::uses('NetCommonsHelperTestCase', 'NetCommons.TestSuite');
App::uses('Container', 'Containers.Model');
App::uses('Current', 'NetCommons.Utility');
//@codeCoverageIgnoreEnd;

/**
 * BoxesHelperTestCase TestCase
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\TestSuite
 * @codeCoverageIgnore
 */
abstract class BoxesHelperTestCase extends NetCommonsHelperTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	private $__fixtures = array(
		'plugin.pages.box4pages',
		'plugin.pages.boxes_page_container4pages',
		'plugin.pages.frame4pages',
		'plugin.pages.frame_public_language4pages',
		'plugin.pages.frames_language4pages',
		'plugin.pages.pages_language4pages',
		'plugin.pages.page_container4pages',
		'plugin.pages.page4pages',
		'plugin.pages.plugin4pages',
		'plugin.pages.plugins_room4pages',
		'plugin.roles.default_role_permission'
	);

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'boxes';

/**
 * Fixtures load
 *
 * @param string $name The name parameter on PHPUnit_Framework_TestCase::__construct()
 * @param array  $data The data parameter on PHPUnit_Framework_TestCase::__construct()
 * @param string $dataName The dataName parameter on PHPUnit_Framework_TestCase::__construct()
 * @return void
 */
	public function __construct($name = null, array $data = array(), $dataName = '') {
		if (! isset($this->fixtures)) {
			$this->fixtures = array();
		}
		$this->fixtures = array_merge($this->__fixtures, $this->fixtures);
		parent::__construct($name, $data, $dataName);
	}

}
