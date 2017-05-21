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
class SwitchBoxes extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'switch_boxes';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
		),
		'down' => array(
		),
	);

/**
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $records = array(
		'Box' => array(
			//サイト全体(パブリックスペース＝サイト全体として扱う)
			array(
				'type' => '1', 'space_id' => '1',
				'room_id' => '{WholeSiteRoomId}', 'page_id' => null, 'container_type' => '1',
			),
			array(
				'type' => '1', 'space_id' => '1',
				'room_id' => '{WholeSiteRoomId}', 'page_id' => null, 'container_type' => '2',
			),
			array(
				'type' => '1', 'space_id' => '1',
				'room_id' => '{WholeSiteRoomId}', 'page_id' => null, 'container_type' => '4',
			),
			array(
				'type' => '1', 'space_id' => '1',
				'room_id' => '{WholeSiteRoomId}', 'page_id' => null, 'container_type' => '5',
			),
		),
	);

/**
 * サイト全体のルームIDを$this->recordsにセットする
 *
 * @return void
 */
	private function __setWholeSiteRoomId() {
		$Room = $this->Room;

		$Room->unbindModel(['belongsTo' => ['ParentRoom']]);
		$this->wholeSiteSpace = $Room->find('first', array(
			'recursive' => 0,
			'conditions' => array('Room.space_id' => '1'),
		));

		foreach ($this->records as $modelName => $records) {
			foreach ($records as $i => $record) {
				if ($record['room_id'] === '{WholeSiteRoomId}') {
					$record['room_id'] = $this->wholeSiteSpace['Space']['room_id_root'];
				}
				$this->records[$modelName][$i] = $record;
			}
		}
	}

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		$this->loadModels([
			'Room' => 'Rooms.Room',
		]);

		$this->__setWholeSiteRoomId();

		if (! $this->__savePageContainer($direction)) {
			return false;
		}
		if (! $this->__saveBoxes($direction)) {
			return false;
		}
		if (! $this->__saveBoxesPageContainers($direction)) {
			return false;
		}
		if (! $this->__saveFrames($direction)) {
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

/**
 * PageContainerデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return bool
 */
	private function __savePageContainer($direction) {
		$PageContainers = $this->generateModel('PageContainer');
		$tablePrefix = $PageContainers->tablePrefix;

		if ($direction === 'down') {
			$PageContainers->query('TRUNCATE TABLE ' . $tablePrefix . $PageContainers->table);
		} else {
			$sql = 'INSERT INTO ' . $tablePrefix . $PageContainers->table .
					' SELECT' .
						' ContainersPage.id' .
						', ContainersPage.page_id' .
						', Container.type' .
						', ContainersPage.is_published' .
						', ContainersPage.is_configured' .
						', ContainersPage.created_user' .
						', ContainersPage.created' .
						', ContainersPage.modified_user' .
						', ContainersPage.modified' .
					' FROM ' . $tablePrefix . Inflector::tableize('ContainersPage') . ' ContainersPage' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Container') . ' Container' .
					' ON (ContainersPage.container_id = Container.id)';

			$PageContainers->query($sql);
			$result = $PageContainers->getAffectedRows() > 0;
			if (! $result) {
				return false;
			}
		}

		return true;
	}

/**
 * Boxesデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return bool
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
	private function __saveBoxes($direction) {
		$Box = $this->generateModel('Box');
		$Container = $this->generateModel('Container');
		$Room = $this->Room;
		$Page = $this->generateModel('Page');

		$boxTable = $Box->tablePrefix . $Box->table . ' ' . $Box->alias;
		$continerTable = $Container->tablePrefix . $Container->table . ' ' . $Container->alias;

		if ($direction === 'down') {
			//Migration downで元に戻す
			$conditions = array(
				'Box.container_id' => null
			);
			if (! $Box->deleteAll($conditions, false)) {
				return false;
			}

			//typeの更新(左右上下)
			$update = array(
				'Box.type' => '1',
				'Box.container_type' => null,
			);
			$conditions = array(
				'Box.container_id !=' => null,
				'Box.container_type !=' => '3',
			);
			if (! $Box->updateAll($update, $conditions)) {
				return false;
			}
			//typeの更新(センター)
			$update = array(
				'Box.type' => '4',
				'Box.container_type' => null,
			);
			$conditions = array(
				'Box.container_id !=' => null,
				'Box.container_type =' => '3',
			);
			if (! $Box->updateAll($update, $conditions)) {
				return false;
			}

		} else {
			$query = array(
				'recursive' => -1,
				'conditions' => array('space_id' => '1')
			);
			if ($Box->find('count', $query)) {
				return true;
			}

			//サイト全体の登録
			if (! $Box->saveMany($this->records['Box'])) {
				return false;
			}

			$schema = $Box->schema();
			unset($schema['id'], $schema['container_id'], $schema['weight']);
			unset($schema['created_user'], $schema['modified_user']);
			$schemaColumns = implode(', ', array_keys($schema));

			//スペース、ルームのボックスデータ登録
			$now = '\'' . gmdate('Y-m-d H:i:s') . '\'';
			$wheres = array(
				array(
					'type' => Box::TYPE_WITH_SPACE,
					'where' => 'id IN (1, 2, 3)'
				),
				array(
					'type' => Box::TYPE_WITH_ROOM,
					'where' => 'id NOT IN (' . $this->wholeSiteSpace['Room']['id'] . ')'
				),
			);
			foreach ($wheres as $where) {
				$sql = 'INSERT INTO ' . $Box->tablePrefix . $Box->table . '(' . $schemaColumns . ')' .
						' SELECT ' . $where['type'] . ', space_id, id, null, ' . Container::TYPE_HEADER .
									', ' . $now . ', ' . $now .
						' FROM ' . $Room->tablePrefix . $Room->table . ' WHERE ' . $where['where'] .
						' UNION SELECT ' . $where['type'] . ', space_id, id, null, ' . Container::TYPE_MAJOR .
									', ' . $now . ', ' . $now .
						' FROM ' . $Room->tablePrefix . $Room->table . ' WHERE ' . $where['where'] .
						' UNION SELECT ' . $where['type'] . ', space_id, id, null, ' . Container::TYPE_MINOR .
									', ' . $now . ', ' . $now .
						' FROM ' . $Room->tablePrefix . $Room->table . ' WHERE ' . $where['where'] .
						' UNION SELECT ' . $where['type'] . ', space_id, id, null, ' . Container::TYPE_FOOTER .
									', ' . $now . ', ' . $now .
						' FROM ' . $Room->tablePrefix . $Room->table . ' WHERE ' . $where['where'];
				$Box->query($sql);
			}

			//ページ(左右上下)のボックスデータ登録
			$tableFromWhere = ' FROM ' . $Page->tablePrefix . $Page->table . ' Page' .
					' INNER JOIN ' . $Room->tablePrefix . $Room->table . ' Room ON (Page.room_id = Room.id)' .
					' WHERE Page.id NOT IN (1, 2, 3)';
			$sql = 'INSERT INTO ' . $Box->tablePrefix . $Box->table . '(' . $schemaColumns . ')' .
					' SELECT ' . Box::TYPE_WITH_PAGE . ', Room.space_id, Room.id, Page.id, ' . Container::TYPE_HEADER .
								', ' . $now . ', ' . $now .
					$tableFromWhere .
					' UNION' .
					' SELECT ' . Box::TYPE_WITH_PAGE . ', Room.space_id, Room.id, Page.id, ' . Container::TYPE_MAJOR .
								', ' . $now . ', ' . $now .
					$tableFromWhere .
					' UNION' .
					' SELECT ' . Box::TYPE_WITH_PAGE . ', Room.space_id, Room.id, Page.id, ' . Container::TYPE_MINOR .
								', ' . $now . ', ' . $now .
					$tableFromWhere .
					' UNION' .
					' SELECT ' . Box::TYPE_WITH_PAGE . ', Room.space_id, Room.id, Page.id, ' . Container::TYPE_FOOTER .
								', ' . $now . ', ' . $now .
					$tableFromWhere;
			$Box->query($sql);

			//containre_typeの更新
			$sql = 'UPDATE ' . $boxTable . ', ' .
					'(' .
						'SELECT Box.id, Container.type' .
						' FROM ' . $boxTable . ', ' . $continerTable .
						' WHERE ' . $Box->alias . '.container_id' . ' = ' . $Container->alias . '.id' .
					') ContainerType' .
					' SET ' . $Box->alias . '.container_type' . ' = ContainerType.type' .
					' WHERE ' . $Box->alias . '.id' . ' = ContainerType.id' .
					'';
			$Box->query($sql);

			//typeの更新
			$update = array(
				'Box.type' => '4'
			);
			$conditions = array(
				'Box.container_id !=' => null
			);
			if (! $Box->updateAll($update, $conditions)) {
				return false;
			}
		}

		return true;
	}

/**
 * BoxesPageContainerデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return bool
 */
	private function __saveBoxesPageContainers($direction) {
		$BoxesPageContainer = $this->generateModel('BoxesPageContainer');
		$tablePrefix = $BoxesPageContainer->tablePrefix;

		if ($direction === 'down') {
			$BoxesPageContainer->query('TRUNCATE TABLE ' . $tablePrefix . $BoxesPageContainer->table);
		} else {
			$schema = $BoxesPageContainer->schema();
			unset($schema['id']);
			unset($schema['created_user'], $schema['modified_user']);
			$schemaColumns = implode(', ', array_keys($schema));

			$now = '\'' . gmdate('Y-m-d H:i:s') . '\'';

			//サイト全体
			$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
					' SELECT' .
						' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
						', 1 AS is_published, 1 AS weight, ' . $now . ', ' . $now .
					' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
					' ON (PageContainer.container_type = Box.container_type AND Box.type = 1)';
			$BoxesPageContainer->query($sql);
			//$result = $BoxesPageContainer->getAffectedRows() > 0;
			//if (! $result) {
			//	return false;
			//}

			//スペース
			$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
					' SELECT' .
						' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
						', 0 AS is_published, 2 AS weight, ' . $now . ', ' . $now .
					' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Page') . ' Page' .
					' ON (PageContainer.page_id = Page.id)' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Room') . ' Room' .
					' ON (Page.room_id = Room.id)' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
					' ON (PageContainer.container_type = Box.container_type' .
						' AND Room.space_id = Box.space_id AND Box.type = 2)';
			$BoxesPageContainer->query($sql);
			//$result = $BoxesPageContainer->getAffectedRows() > 0;
			//if (! $result) {
			//	return false;
			//}

			//ルーム
			$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
					' SELECT' .
						' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
						', 0 AS is_published, 3 AS weight, ' . $now . ', ' . $now .
					' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Page') . ' Page' .
					' ON (PageContainer.page_id = Page.id)' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Room') . ' Room' .
					' ON (Page.room_id = Room.id)' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
					' ON (PageContainer.container_type = Box.container_type' .
						' AND Room.space_id = Box.space_id AND Room.id = Box.room_id AND Box.type = 3)';
			$BoxesPageContainer->query($sql);
			//$result = $BoxesPageContainer->getAffectedRows() > 0;
			//if (! $result) {
			//	return false;
			//}

			//ページ(左右上下)
			$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
					' SELECT' .
						' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
						', 0 AS is_published, 4 AS weight, ' . $now . ', ' . $now .
					' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
					' ON (PageContainer.page_id = Box.page_id AND PageContainer.container_type = Box.container_type)' .
					' WHERE PageContainer.container_type != ' . Container::TYPE_MAIN;
			$BoxesPageContainer->query($sql);
			//$result = $BoxesPageContainer->getAffectedRows() > 0;
			//if (! $result) {
			//	return false;
			//}

			//ページ(センター)
			$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
					' SELECT' .
						' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
						', 1 AS is_published, 1 AS weight, ' . $now . ', ' . $now .
					' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
					' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
					' ON (PageContainer.page_id = Box.page_id AND PageContainer.container_type = Box.container_type)' .
					' WHERE PageContainer.container_type = ' . Container::TYPE_MAIN;
			$BoxesPageContainer->query($sql);
			//$result = $BoxesPageContainer->getAffectedRows() > 0;
			//if (! $result) {
			//	return false;
			//}
		}

		return true;
	}

/**
 * Frameデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return bool
 */
	private function __saveFrames($direction) {
		$Box = $this->generateModel('Box');
		$Frame = $this->generateModel('Frame');

		$publicBoxeIds = $Box->find('list', array(
			'recursive' => -1,
			'fields' => array('container_type', 'id'),
			'conditions' => array(
				'type' => Box::TYPE_WITH_SITE,
				'container_type' => ['1', '2', '4', '5'],
				'id !=' => ['1', '2', '4', '5'],
			)
		));

		foreach ($publicBoxeIds as $orgId => $covId) {
			if ($direction === 'down') {
				$update = array(
					'box_id' => $orgId
				);
				$conditions = array(
					'box_id' => $covId
				);
			} else {
				$update = array(
					'box_id' => $covId
				);
				$conditions = array(
					'box_id' => $orgId
				);
			}

			if (! $Frame->updateAll($update, $conditions)) {
				return false;
			}
		}

		return true;
	}

}
