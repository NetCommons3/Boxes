<?php
/**
 * ボックスの切り替え機能追加 Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsMigration', 'NetCommons.Config/Migration');
App::uses('Box', 'Boxes.Model');
App::uses('Container', 'Containers.Model');

/**
 * ボックスの切り替え機能追加 Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Config\Migration
 */
class SwitchBoxesModifiedTables extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'switch_boxes_modified_tables';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'boxes_page_containers' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'page_container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'container_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'コンテナータイプ.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer'),
					'box_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'is_published' => array('type' => 'boolean', 'null' => true, 'default' => '1', 'comment' => 'ボックスの表示・非表示'),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'ボックスの並び順'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'page_container_id' => array('column' => 'page_container_id', 'unique' => 0),
						'page_id' => array('column' => array('page_id', 'container_type'), 'unique' => 0),
						'box_id' => array('column' => 'box_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'page_containers' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'container_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'コンテナータイプ.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer'),
					'is_published' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'コンテナーの表示・非表示'),
					'is_configured' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => '設定したかどうか。1の場合、サイト管理もしくはルームで変更しても反映させない。'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
			'create_field' => array(
				'boxes' => array(
					'container_type' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'コンテナータイプ.  1:Header, 2:Major, 3:Main, 4:Minor, 5:Footer', 'after' => 'page_id'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'boxes_page_containers', 'page_containers'
			),
			'drop_field' => array(
				'boxes' => array('container_type'),
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
		$Plugin = ClassRegistry::init('PluginManager.Plugin');

		if (! $Plugin->runMigration('Pages', $this->connection)) {
			return false;
		}
		if (! $Plugin->runMigration('Containers', $this->connection)) {
			return false;
		}
		if (! $Plugin->runMigration('Frames', $this->connection)) {
			return false;
		}
		if (! $Plugin->runMigration('Rooms', $this->connection)) {
			return false;
		}
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 * @throws InternalErrorException
 */
	public function after($direction) {
		return true;
	}

}
