<?php
/**
 * BoxesPageFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for BoxesPageFixture
 */
class BoxesPageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'page_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'box_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'is_visible' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'page_id' => 1,
			'box_id' => 1,
			'is_visible' => 1,
			'created_user_id' => 1,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 1,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 2,
			'page_id' => 2,
			'box_id' => 2,
			'is_visible' => 1,
			'created_user_id' => 2,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 2,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 3,
			'page_id' => 3,
			'box_id' => 3,
			'is_visible' => 1,
			'created_user_id' => 3,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 3,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 4,
			'page_id' => 4,
			'box_id' => 4,
			'is_visible' => 1,
			'created_user_id' => 4,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 4,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 5,
			'page_id' => 5,
			'box_id' => 5,
			'is_visible' => 1,
			'created_user_id' => 5,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 5,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 6,
			'page_id' => 6,
			'box_id' => 6,
			'is_visible' => 1,
			'created_user_id' => 6,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 6,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 7,
			'page_id' => 7,
			'box_id' => 7,
			'is_visible' => 1,
			'created_user_id' => 7,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 7,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 8,
			'page_id' => 8,
			'box_id' => 8,
			'is_visible' => 1,
			'created_user_id' => 8,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 8,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 9,
			'page_id' => 9,
			'box_id' => 9,
			'is_visible' => 1,
			'created_user_id' => 9,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 9,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'id' => 10,
			'page_id' => 10,
			'box_id' => 10,
			'is_visible' => 1,
			'created_user_id' => 10,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 10,
			'modified' => '2014-08-01 08:25:34'
		),
	);

}
