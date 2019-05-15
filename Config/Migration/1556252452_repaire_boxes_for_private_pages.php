<?php
/**
 * マイポータルスペースのページのフッターのspace_idがコミュニティスペースになっているレコードの修正
 *
 * @author Japan Science and Technology Agency
 * @author National Institute of Informatics
 * @link http://researchmap.jp researchmap Project
 * @link http://www.netcommons.org NetCommons Project
 * @license http://researchmap.jp/public/terms-of-service/ researchmap license
 * @copyright Copyright 2017, researchmap Project
 */

App::uses('NetCommonsMigration', 'NetCommons.Config/Migration');
App::uses('Box', 'Boxes.Model');
App::uses('Container', 'Containers.Model');

/**
 * マイポータルスペースのページのフッターのspace_idがコミュニティスペースになっているレコードの修正
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package Researchmap\RmPages\Config\Migration
 */
class RepaireBoxesForPrivatePages extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'repaire_boxes_for_private_pages';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(),
		'down' => array(),
	);

/**
 * plugin data
 *
 * @var array $migration
 */
	public $records = array();

/**
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $updateRecords = array();

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

		$this->loadModels([
			'Box' => 'Boxes.Box',
		]);

		$conditions = [
			'Box.space_id != Room.space_id',
			'Box.type' => Box::TYPE_WITH_PAGE,
			'Box.container_type' => Container::TYPE_FOOTER,
		];
		$update = [
			'Box.space_id' => 'Room.space_id',
			'Box.modified' => "'" . gmdate('Y-m-d H:i:s') . "'"
		];

		return $this->Box->updateAll($update, $conditions);
	}
}
