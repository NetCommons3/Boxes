<?php
/**
 * Boxes All Test Suite
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('NetCommonsTestSuite', 'NetCommons.TestSuite');

/**
 * Boxes All Test Suite
 *
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @package NetCommons\NetCommons\Test\Case
 * @codeCoverageIgnore
 */
class AllBoxesTest extends NetCommonsTestSuite {

/**
 * Suite defines all the tests for Containers
 *
 * @return NetCommonsTestSuite
 */
	public static function suite() {
		$suite = new NetCommonsTestSuite();
		$suite->addTestDirectoryRecursive(dirname(__FILE__));
		return $suite;
	}
}
