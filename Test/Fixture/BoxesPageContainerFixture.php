<?php
/**
 * BoxesPageContainerFixture
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

/**
 * Summary for BoxesPageContainerFixture
 */
class BoxesPageContainerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'page_container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'container_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'コンテナータイプ.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer'),
		'box_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'is_published' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'comment' => 'ボックスの表示・非表示'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Display order.'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'page_container_id' => array('column' => 'page_container_id', 'unique' => 0),
			'page_id' => array('column' => array('page_id', 'container_type'), 'unique' => 0),
			'box_id' => array('column' => 'box_id', 'unique' => 0)
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
			'page_container_id' => 1,
			'page_id' => 1,
			'container_type' => 1,
			'box_id' => 1,
			'is_published' => 1,
			'weight' => 1,
			'created_user' => 1,
			'created' => '2016-10-26 05:01:59',
			'modified_user' => 1,
			'modified' => '2016-10-26 05:01:59'
		),
	);

}
