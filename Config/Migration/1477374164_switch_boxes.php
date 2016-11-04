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
			'create_table' => array(
				'boxes_bk1477374164s' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'container_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'type' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Type of the box.
1:each site, 2:each space, 3:each room, 4:each page'),
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
				'boxes_page_containers' => array(
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
						'box_id' => array('column' => 'box_id', 'unique' => 0),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'frames_bk1477374164s' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'language_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false),
					'room_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'box_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
					'plugin_key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'block_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'key' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'utf8_general_ci', 'comment' => 'Key of the frame.', 'charset' => 'utf8'),
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Name of the frame.', 'charset' => 'utf8'),
					'header_type' => array('type' => 'string', 'null' => false, 'default' => 'default', 'collate' => 'utf8_general_ci', 'comment' => 'Header type of the frame.', 'charset' => 'utf8'),
					'weight' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'Display order.'),
					'is_deleted' => array('type' => 'boolean', 'null' => true, 'default' => null),
					'default_action' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Default action for content rendering', 'charset' => 'utf8'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'box_id' => array('column' => 'box_id', 'unique' => 0),
						'key' => array('column' => 'key', 'unique' => 0),
						'box_id_2' => array('column' => array('box_id', 'language_id', 'is_deleted', 'weight'), 'unique' => 0)
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
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
				'boxes_bk1477374164s', 'boxes_page_containers', 'frames_bk1477374164s', 'page_containers'
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
		if ($direction === 'down') {
			if (! $this->__saveBoxes($direction)) {
				return false;
			}
			if (! $this->__saveFrames($direction)) {
				return false;
			}
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
		$db = ConnectionManager::getDataSource($this->connection);
		$db->begin();
		try {
			if ($direction === 'up') {
				if (! $this->__savePageContainer()) {
					throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				}
				if (! $this->__saveBoxes($direction)) {
					throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				}
				if (! $this->__saveBoxesPageContainers()) {
					throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				}
				if (! $this->__saveFrames($direction)) {
					throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				}
			}

			$db->commit();
			$return = true;

		} catch (Exception $ex) {
			CakeLog::error($ex);
			$db->rollback();
			$return = false;
		}

		return $return;
	}

/**
 * PageContainerデータの登録
 *
 * @return void
 */
	private function __savePageContainer() {
		$PageContainers = $this->generateModel('PageContainer');

		$tablePrefix = $PageContainers->tablePrefix;

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

		return $result;
	}

/**
 * Boxesデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return void
 * @throws InternalErrorException
 */
	private function __saveBoxes($direction) {
		$Box = $this->generateModel('Box');
		$BoxOld = $this->generateModel('BoxesBk1477374164');
		$schemaColumns = implode(', ', array_keys($BoxOld->schema()));

		if ($direction === 'up') {
			$sql = 'INSERT INTO ' . $BoxOld->tablePrefix . $BoxOld->table . '(' . $schemaColumns . ') ' .
					'SELECT ' . $schemaColumns . ' FROM ' . $Box->tablePrefix . $Box->table;
			$BoxOld->query($sql);
			$result = $BoxOld->getAffectedRows() > 0;
			if (! $result) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if (! $Box->deleteAll(array('1' => '1'), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			$Box->query('TRUNCATE TABLE ' . $Box->tablePrefix . $Box->table);

			$Room = $this->generateModel('Room');
			$Page = $this->generateModel('Page');

			$schema = $Box->schema();
			unset($schema['id'], $schema['container_id'], $schema['weight']);
			unset($schema['created_user'], $schema['modified_user']);
			$schemaColumns = implode(', ', array_keys($schema));

			$now = '\'' . gmdate('Y-m-d H:i:s') . '\'';
			$wheres = array(
				array('type' => Box::TYPE_WITH_SITE, 'where' => 'id = 1'),
				array('type' => Box::TYPE_WITH_SPACE, 'where' => 'id IN (2, 3, 4)'),
				array('type' => Box::TYPE_WITH_ROOM, 'where' => 'id NOT IN (1)'),
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

			$tableFromWhere = ' FROM ' . $Page->tablePrefix . $Page->table . ' Page' .
					' INNER JOIN ' . $Room->tablePrefix . $Room->table . ' Room ON (Page.room_id = Room.id)' .
					' WHERE 1 = 1';
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

			$tableFromWhere = ' FROM ' . $Page->tablePrefix . $Page->table . ' Page' .
					' INNER JOIN ' . $Room->tablePrefix . $Room->table . ' Room ON (Page.room_id = Room.id)' .
					' WHERE Page.root_id IS NOT NULL';
			$sql = 'INSERT INTO ' . $Box->tablePrefix . $Box->table . '(' . $schemaColumns . ')' .
					' SELECT ' . Box::TYPE_WITH_PAGE . ', Room.space_id, Room.id, Page.id, ' . Container::TYPE_MAIN .
								', ' . $now . ', ' . $now .
					$tableFromWhere;
			$Box->query($sql);

		} else {
			if (! $Box->deleteAll(array('1' => '1'), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$sql = 'INSERT INTO ' . $Box->tablePrefix . $Box->table . '(' . $schemaColumns . ') ' .
					'SELECT ' . $schemaColumns . ' FROM ' . $BoxOld->tablePrefix . $BoxOld->table;
			$Box->query($sql);
			$result = $Box->getAffectedRows() > 0;
			if (! $result) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}

		return true;
	}

/**
 * BoxesPageContainerデータの登録
 *
 * @return void
 * @throws InternalErrorException
 */
	private function __saveBoxesPageContainers() {
		$BoxesPageContainer = $this->generateModel('BoxesPageContainer');

		$tablePrefix = $BoxesPageContainer->tablePrefix;

		$schema = $BoxesPageContainer->schema();
		unset($schema['id']);
		unset($schema['created_user'], $schema['modified_user']);
		$schemaColumns = implode(', ', array_keys($schema));

		$now = '\'' . gmdate('Y-m-d H:i:s') . '\'';

		$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
				' SELECT' .
					' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
					', 1 AS is_published, 1 AS weight, ' . $now . ', ' . $now .
				' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
				' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
				' ON (PageContainer.container_type = Box.container_type AND Box.type = 1)';
		$BoxesPageContainer->query($sql);
		$result = $BoxesPageContainer->getAffectedRows() > 0;
		if (! $result) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

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
		$result = $BoxesPageContainer->getAffectedRows() > 0;
		if (! $result) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

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
		$result = $BoxesPageContainer->getAffectedRows() > 0;
		if (! $result) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

		$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
				' SELECT' .
					' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
					', 0 AS is_published, 4 AS weight, ' . $now . ', ' . $now .
				' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
				' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
				' ON (PageContainer.page_id = Box.page_id AND PageContainer.container_type = Box.container_type)' .
				' WHERE PageContainer.container_type != ' . Container::TYPE_MAIN;
		$BoxesPageContainer->query($sql);
		$result = $BoxesPageContainer->getAffectedRows() > 0;
		if (! $result) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

		$sql = 'INSERT INTO ' . $tablePrefix . $BoxesPageContainer->table . '(' . $schemaColumns . ')' .
				' SELECT' .
					' PageContainer.id, PageContainer.page_id, PageContainer.container_type, Box.id' .
					', 1 AS is_published, 1 AS weight, ' . $now . ', ' . $now .
				' FROM ' . $tablePrefix . Inflector::tableize('PageContainer') . ' PageContainer' .
				' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
				' ON (PageContainer.page_id = Box.page_id AND PageContainer.container_type = Box.container_type)' .
				' WHERE PageContainer.container_type = ' . Container::TYPE_MAIN;
		$BoxesPageContainer->query($sql);
		$result = $BoxesPageContainer->getAffectedRows() > 0;
		if (! $result) {
			throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
		}

		return $result;
	}

/**
 * Frameデータの登録
 *
 * @param string $direction Migration処理 (up or down)
 * @return void
 * @throws InternalErrorException
 */
	private function __saveFrames($direction) {
		$Frame = $this->generateModel('Frame');
		$FrameOld = $this->generateModel('FramesBk1477374164');

		$tablePrefix = $Frame->tablePrefix;

		if ($direction === 'up') {
			$sql = 'INSERT INTO ' . $FrameOld->tablePrefix . $FrameOld->table .
					' SELECT * FROM ' . $Frame->tablePrefix . $Frame->table;
			$FrameOld->query($sql);
			$result = $FrameOld->getAffectedRows() > 0;
			if (! $result) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$sql = 'UPDATE ' .
					$Frame->tablePrefix . $Frame->table . ' Frame, ' .
					'(' .
						'SELECT Frame2.id AS frame_id, Box.id AS box_id' .
						' FROM ' . $FrameOld->tablePrefix . $FrameOld->table . ' Frame2' .
						' INNER JOIN ' . $tablePrefix . Inflector::tableize('BoxesBk1477374164') . ' BoxBk' .
						' ON (BoxBk.id = Frame2.box_id)' .
						' INNER JOIN ' . $tablePrefix . Inflector::tableize('Box') . ' Box' .
						' ON (BoxBk.page_id = Box.page_id AND Box.container_type = 3)' .
					') AS Bk1477374164' .
					' SET Frame.box_id = Bk1477374164.box_id' .
					' WHERE Frame.id = Bk1477374164.frame_id';
			$Frame->query($sql);
			$result = $Frame->getAffectedRows() > 0;
			if (! $result) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$sql = 'UPDATE ' .
					$Frame->tablePrefix . $Frame->table . ' Frame' .
					' SET Frame.box_id = 3' .
					' WHERE Frame.box_id = 4';
			$Frame->query($sql);
			$Frame->getAffectedRows() > 0;
			//if (! $result) {
			//	throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			//}

			$sql = 'UPDATE ' .
					$Frame->tablePrefix . $Frame->table . ' Frame' .
					' SET Frame.box_id = 4' .
					' WHERE Frame.box_id = 5';
			$Frame->query($sql);
			//$result = $Frame->getAffectedRows() > 0;
			//if (! $result) {
			//	throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			//}

		} else {
			$sql = 'UPDATE ' .
						$Frame->tablePrefix . $Frame->table . ' Frame, ' .
						$FrameOld->tablePrefix . $FrameOld->table . ' FrameOld' .
					' SET Frame.box_id = FrameOld.box_id' .
					' WHERE Frame.id = FrameOld.id';
			$Frame->query($sql);
			$result = $Frame->getAffectedRows() > 0;
			//if (! $result) {
			//	throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			//}
		}

		return $result;
	}

}
