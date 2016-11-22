<?php
/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Config\Migration
 */
class Init extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'init';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'boxes' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'ボックスタイプ 1:サイト全体, 2:スペース, 3:ルーム, 4:ページ'),
					'space_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'room_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Display order.'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'boxes_pages' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'page_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'box_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'is_published' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'ボックスの表示・非表示'),
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
		),
		'down' => array(
			'drop_table' => array(
				'boxes', 'boxes_pages'
			),
		),
	);

/**
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $records = array(
		'Box' => array(
			array(
				'id' => '1',
				'container_id' => '1',
				'type' => '1',
				'space_id' => '1',
				'room_id' => null,
				'page_id' => null,
				'weight' => '1',
			),
			array(
				'id' => '2',
				'container_id' => '2',
				'type' => '1',
				'space_id' => '1',
				'room_id' => null,
				'page_id' => null,
				'weight' => '1',
			),
			array(
				'id' => '3',
				'container_id' => '3',
				'type' => '4',
				'space_id' => null,
				'room_id' => 1,
				'page_id' => '1',
				'weight' => '1',
			),
			array(
				'id' => '4',
				'container_id' => '4',
				'type' => '1',
				'space_id' => 1,
				'room_id' => null,
				'page_id' => null,
				'weight' => '1',
			),
			array(
				'id' => '5',
				'container_id' => '5',
				'type' => '1',
				'space_id' => 1,
				'room_id' => null,
				'page_id' => null,
				'weight' => '1',
			),
		),

		'BoxesPage' => array(
			array(
				'id' => '1',
				'page_id' => '1',
				'box_id' => '1',
				'is_published' => true,
			),
			array(
				'id' => '2',
				'page_id' => '1',
				'box_id' => '2',
				'is_published' => true,
			),
			array(
				'id' => '3',
				'page_id' => '1',
				'box_id' => '3',
				'is_published' => true,
			),
			array(
				'id' => '4',
				'page_id' => '1',
				'box_id' => '4',
				'is_published' => true,
			),
			array(
				'id' => '5',
				'page_id' => '1',
				'box_id' => '5',
				'is_published' => true,
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
		if ($direction === 'down') {
			return true;
		}

		foreach ($this->records as $model => $records) {
			if (!$this->updateRecords($model, $records)) {
				return false;
			}
		}

		return true;
	}

/**
 * Update model records
 *
 * @param string $model model name to update
 * @param string $records records to be stored
 * @param string $scope ?
 * @return bool Should process continue
 */
	public function updateRecords($model, $records, $scope = null) {
		$Model = $this->generateModel($model);
		foreach ($records as $record) {
			$Model->create();
			if (!$Model->save($record, false)) {
				return false;
			}
		}

		return true;
	}
}
