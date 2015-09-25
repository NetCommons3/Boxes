<?php
/**
 * BoxesPageFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
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
		'is_published' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'page_id' => 1,
			'box_id' => 1,
			'is_published' => 1,
			'created_user_id' => 1,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 1,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'page_id' => 1,
			'box_id' => 2,
			'is_published' => 1,
			'created_user_id' => 2,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 2,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'page_id' => 1,
			'box_id' => 3,
			'is_published' => 1,
			'created_user_id' => 3,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 3,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'page_id' => 1,
			'box_id' => 4,
			'is_published' => 1,
			'created_user_id' => 4,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 4,
			'modified' => '2014-08-01 08:25:34'
		),
		array(
			'page_id' => 1,
			'box_id' => 5,
			'is_published' => 1,
			'created_user_id' => 5,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 5,
			'modified' => '2014-08-01 08:25:34'
		),
		//page.permalink=test
		array(
			'page_id' => 2,
			'box_id' => 6,
			'is_published' => 1,
			'created_user_id' => 6,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 6,
			'modified' => '2014-08-01 08:25:34'
		),
		//別ルーム(room_id=4)
		array(
			'page_id' => 3,
			'box_id' => 7,
			'is_published' => 1,
			'created_user_id' => 6,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 6,
			'modified' => '2014-08-01 08:25:34'
		),
		//別ルーム(room_id=5、ブロックなし)
		array(
			'page_id' => 4,
			'box_id' => 8,
			'is_published' => 1,
			'created_user_id' => 6,
			'created' => '2014-08-01 08:25:34',
			'modified_user_id' => 6,
			'modified' => '2014-08-01 08:25:34'
		),
	);
}
