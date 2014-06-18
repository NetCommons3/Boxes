<?php
/**
 * FrameFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for FrameFixture
 */
class FrameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'box_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null),
		'plugin_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'block_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null),
		'is_published' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'to' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'box_id' => 1,
			'parent_id' => 1,
			'lft' => 1,
			'rght' => 1,
			'plugin_id' => 1,
			'block_id' => 1,
			'weight' => 1,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 1,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 1,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 2,
			'box_id' => 2,
			'parent_id' => 2,
			'lft' => 2,
			'rght' => 2,
			'plugin_id' => 2,
			'block_id' => 2,
			'weight' => 2,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 2,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 2,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 3,
			'box_id' => 3,
			'parent_id' => 3,
			'lft' => 3,
			'rght' => 3,
			'plugin_id' => 3,
			'block_id' => 3,
			'weight' => 3,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 3,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 3,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 4,
			'box_id' => 4,
			'parent_id' => 4,
			'lft' => 4,
			'rght' => 4,
			'plugin_id' => 4,
			'block_id' => 4,
			'weight' => 4,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 4,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 4,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 5,
			'box_id' => 5,
			'parent_id' => 5,
			'lft' => 5,
			'rght' => 5,
			'plugin_id' => 5,
			'block_id' => 5,
			'weight' => 5,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 5,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 5,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 6,
			'box_id' => 6,
			'parent_id' => 6,
			'lft' => 6,
			'rght' => 6,
			'plugin_id' => 6,
			'block_id' => 6,
			'weight' => 6,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 6,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 6,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 7,
			'box_id' => 7,
			'parent_id' => 7,
			'lft' => 7,
			'rght' => 7,
			'plugin_id' => 7,
			'block_id' => 7,
			'weight' => 7,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 7,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 7,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 8,
			'box_id' => 8,
			'parent_id' => 8,
			'lft' => 8,
			'rght' => 8,
			'plugin_id' => 8,
			'block_id' => 8,
			'weight' => 8,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 8,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 8,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 9,
			'box_id' => 9,
			'parent_id' => 9,
			'lft' => 9,
			'rght' => 9,
			'plugin_id' => 9,
			'block_id' => 9,
			'weight' => 9,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 9,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 9,
			'modified' => '2014-06-18 05:53:24'
		),
		array(
			'id' => 10,
			'box_id' => 10,
			'parent_id' => 10,
			'lft' => 10,
			'rght' => 10,
			'plugin_id' => 10,
			'block_id' => 10,
			'weight' => 10,
			'is_published' => 1,
			'from' => '2014-06-18 05:53:24',
			'to' => '2014-06-18 05:53:24',
			'created_user_id' => 10,
			'created' => '2014-06-18 05:53:24',
			'modified_user_id' => 10,
			'modified' => '2014-06-18 05:53:24'
		),
	);

}
