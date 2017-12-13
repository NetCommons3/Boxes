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
class AddIndex2 extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_index_2';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'boxes' => array(
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index', 'comment' => 'ボックスタイプ 1:サイト全体, 2:スペース, 3:ルーム, 4:ページ'),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '表示順序'),
				),
			),
			'create_field' => array(
				'boxes' => array(
					'indexes' => array(
						'type' => array('column' => array('type', 'room_id', 'container_type', 'id'), 'unique' => 0),
					),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'boxes' => array(
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'ボックスタイプ 1:サイト全体, 2:スペース, 3:ルーム, 4:ページ'),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'ボックスの並び順'),
				),
			),
			'drop_field' => array(
				'boxes' => array('indexes' => array('type')),
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
