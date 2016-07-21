<?php
/**
 * AddIndex
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * AddIndex
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Config\Migration
 */
class AddIndex extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_index';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'boxes_pages' => array(
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'box_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
				),
			),
			'create_field' => array(
				'boxes_pages' => array(
					'indexes' => array(
						'page_id' => array('column' => 'page_id', 'unique' => 0),
						'box_id' => array('column' => 'box_id', 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'boxes_pages' => array(
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'box_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
				),
			),
			'drop_field' => array(
				'boxes_pages' => array('indexes' => array('page_id', 'box_id')),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
