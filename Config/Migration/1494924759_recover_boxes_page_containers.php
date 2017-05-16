<?php
/**
 * BoxesPageContainer.weight=3のデータ不正を修正 Migration
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
 * BoxesPageContainer.weight=3のデータ不正を修正 Migration
 *
 * 本来、当該ルームのbox_idが入るはずが、スペースのルームのbox_idが入ってしまっている
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Config\Migration
 */
class RecoverBoxesPageContainers extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'recover_boxes_page_containers';

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
	public $records = array();

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
 * @throws InternalErrorException
 */
	public function after($direction) {
		if ($direction === 'down') {
			return true;
		}

		$Box = $this->generateModel('Box');
		$Room = $this->generateModel('Room');
		$Page = $this->generateModel('Page');
		$BoxesPageContainer = $this->generateModel('BoxesPageContainer');

		$boxesPageContainers = $BoxesPageContainer->find('all', [
			'recursive' => -1,
			'fields' => '*',
			'joins' => [
				array(
					'table' => $Page->table,
					'alias' => $Page->alias,
					'type' => 'INNER',
					'conditions' => array(
						$BoxesPageContainer->alias . '.page_id' . ' = ' . $Page->alias . ' .id',
					),
				),
				array(
					'table' => $Room->table,
					'alias' => $Room->alias,
					'type' => 'INNER',
					'conditions' => array(
						$Page->alias . '.room_id' . ' = ' . $Room->alias . ' .id',
					),
				),
				array(
					'table' => $Box->table,
					'alias' => $Box->alias,
					'type' => 'INNER',
					'conditions' => array(
						$Box->alias . '.room_id' . ' = ' . $Room->alias . ' .id',
						$Box->alias . '.container_type' . ' = ' . $BoxesPageContainer->alias . ' .container_type',
						$Box->alias . '.type' => Box::TYPE_WITH_ROOM
					),
				),
			],
			'conditions' => [
				$BoxesPageContainer->alias . '.weight' => '3'
			],
		]);

		foreach ($boxesPageContainers as $boxesPageContainer) {
			$conditions = [
				$BoxesPageContainer->alias . '.id' => $boxesPageContainer[$BoxesPageContainer->alias]['id']
			];
			$update = [
				'box_id' => $boxesPageContainer[$Box->alias]['id']
			];
			if (! $BoxesPageContainer->updateAll($update, $conditions)) {
				return false;
			}
		}

		return true;
	}

}
