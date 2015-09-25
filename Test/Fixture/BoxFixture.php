<?php
/**
 * BoxFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for BoxFixture
 */
class BoxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'container_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'type' => array('type' => 'integer', 'null' => true, 'default' => null),
		'space_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'room_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'page_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'container_id' => 1,
			'type' => 1,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 2,
			'container_id' => 2,
			'type' => 1,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 3,
			'container_id' => 3,
			'type' => 4,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 4,
			'container_id' => 4,
			'type' => 1,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 5,
			'container_id' => 5,
			'type' => 1,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//page.permalink=test
		array(
			'id' => 6,
			'container_id' => 6,
			'type' => 4,
			'space_id' => 1,
			'room_id' => 1,
			'page_id' => 2,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//別ルーム(room_id=4)
		array(
			'id' => 7,
			'container_id' => 7,
			'type' => 4,
			'space_id' => 1,
			'room_id' => 4,
			'page_id' => 3,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//別ルーム(room_id=5、ブロックなし)
		array(
			'id' => 8,
			'container_id' => 8,
			'type' => 4,
			'space_id' => 1,
			'room_id' => 5,
			'page_id' => 4,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
	);

}
