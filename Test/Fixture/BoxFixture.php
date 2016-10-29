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
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Type of the box.
1:each site, 2:each space, 3:each room, 4:each page'),
		'space_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'room_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'container_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'コンテナータイプ.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Display order.'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'type' => 1,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 1,
			'container_type' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 2,
			'type' => 2,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 1,
			'container_type' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 3,
			'type' => 4,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 1,
			'container_type' => 3,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 4,
			'type' => 1,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 1,
			'container_type' => 4,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		array(
			'id' => 5,
			'type' => 1,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 1,
			'container_type' => 5,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//page.permalink=test
		array(
			'id' => 6,
			'type' => 4,
			'space_id' => 1,
			'room_id' => '2',
			'page_id' => 2,
			'container_type' => 3,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//別ルーム(room_id=4)
		array(
			'id' => 7,
			'type' => 4,
			'space_id' => 1,
			'room_id' => '5',
			'page_id' => 3,
			'weight' => 1,
			'container_type' => 3,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
		//別ルーム(room_id=5、ブロックなし)
		array(
			'id' => 8,
			'type' => 4,
			'space_id' => 1,
			'room_id' => '6',
			'page_id' => 4,
			'container_type' => 3,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2014-04-30 06:57:01',
			'modified_user' => 1,
			'modified' => '2014-04-30 06:57:01'
		),
	);

}
