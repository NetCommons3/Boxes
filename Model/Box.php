<?php
/**
 * Box Model
 *
 * @property Space $Space
 * @property Room $Room
 * @property Frame $Frame
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesAppModel', 'Boxes.Model');
App::uses('Current', 'NetCommons.Utility');

/**
 * Box Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Model
 */
class Box extends BoxesAppModel {

/**
 * サイトタイプ
 */
	const TYPE_WITH_SITE = '1';

/**
 * スペースタイプ
 */
	const TYPE_WITH_SPACE = '2';

/**
 * ルームタイプ
 */
	const TYPE_WITH_ROOM = '3';

/**
 * ページタイプ
 */
	const TYPE_WITH_PAGE = '4';

/**
 * ページで共通のものであれば、取得しないようにキャッシュする
 *
 * @var bool
 */
	private $__cacheBoxWithFrame = [];

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Space' => array(
			'className' => 'Rooms.Space',
			'foreignKey' => 'space_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Room' => array(
			'className' => 'Rooms.Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Frame' => array(
			'className' => 'Frames.Frame',
			'foreignKey' => 'box_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('Frame.weight' => 'asc'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * Frame付きのボックスを取得
 *
 * @param string $pageContainerId BoxesPageContainerのID
 * @return array
 */
	public function getBoxWithFrame($pageContainerId) {
		$this->loadModels([
			'BoxesPageContainer' => 'Boxes.BoxesPageContainer',
			'Frame' => 'Frames.Frame',
			'Room' => 'Rooms.Room',
			'RoomsLanguage' => 'Rooms.RoomsLanguage',
		]);

		if (isset($this->__cacheBoxWithFrame[$pageContainerId])) {
			return $this->__cacheBoxWithFrame[$pageContainerId];
		}

		$this->BoxesPageContainer->unbindModel(array(
			'belongsTo' => array(
				'Page', 'PageContainer'
			)
		), true);

		$query = array(
			'recursive' => -1,
			'fields' => [
				$this->BoxesPageContainer->alias . '.id',
				$this->BoxesPageContainer->alias . '.page_container_id',
				$this->BoxesPageContainer->alias . '.page_id',
				$this->BoxesPageContainer->alias . '.container_type',
				$this->BoxesPageContainer->alias . '.box_id',
				$this->BoxesPageContainer->alias . '.is_published',
				$this->BoxesPageContainer->alias . '.weight',
				$this->BoxesPageContainer->Box->alias . '.id',
				$this->BoxesPageContainer->Box->alias . '.container_id',
				$this->BoxesPageContainer->Box->alias . '.type',
				$this->BoxesPageContainer->Box->alias . '.space_id',
				$this->BoxesPageContainer->Box->alias . '.room_id',
				$this->BoxesPageContainer->Box->alias . '.page_id',
				$this->BoxesPageContainer->Box->alias . '.container_type',
				$this->BoxesPageContainer->Box->alias . '.weight',
				$this->Room->alias . '.id',
				$this->Room->alias . '.space_id',
				$this->Room->alias . '.page_id_top',
				$this->Room->alias . '.parent_id',
				$this->Room->alias . '.lft',
				$this->Room->alias . '.rght',
				$this->Room->alias . '.active',
				$this->Room->alias . '.in_draft',
				$this->Room->alias . '.default_role_key',
				$this->Room->alias . '.need_approval',
				$this->Room->alias . '.default_participation',
				$this->Room->alias . '.page_layout_permitted',
				$this->Room->alias . '.theme',
				$this->RoomsLanguage->alias . '.id',
				$this->RoomsLanguage->alias . '.name',
			],
			'conditions' => array(
				$this->BoxesPageContainer->alias . '.page_container_id' => $pageContainerId,
			),
			'joins' => [
				[
					'type' => 'INNER',
					'table' => $this->BoxesPageContainer->Box->table,
					'alias' => $this->BoxesPageContainer->Box->alias,
					'conditions' => [
						$this->BoxesPageContainer->Box->alias . '.id' . '=' .
										$this->BoxesPageContainer->alias . '.box_id',
					],
				],
				[
					'type' => 'INNER',
					'table' => $this->Room->table,
					'alias' => $this->Room->alias,
					'conditions' => [
						$this->BoxesPageContainer->Box->alias . '.room_id' . '=' .
										$this->Room->alias . '.id',
					],
				],
				[
					'type' => 'LEFT',
					'table' => $this->RoomsLanguage->table,
					'alias' => $this->RoomsLanguage->alias,
					'conditions' => [
						$this->Room->alias . '.id' . '=' .
										$this->RoomsLanguage->alias . '.room_id',
					],
				],
			],
			'order' => $this->BoxesPageContainer->alias . '.weight',
		);
		if (! Current::isSettingMode()) {
			$query['conditions'][$this->BoxesPageContainer->alias . '.is_published'] = true;
		}
		$boxes = $this->BoxesPageContainer->find('all', $query);

		foreach ($boxes as $i => $box) {
			$box['Frame'] = $this->Frame->getFrameByBox($box['Box']['id']);
			$boxes[$i] = $box;
		}

		$this->__cacheBoxWithFrame[$pageContainerId] = $boxes;
		return $boxes;
	}

}
