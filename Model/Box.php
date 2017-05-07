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
		]);

		$this->BoxesPageContainer->bindModel(array(
			'belongsTo' => array(
				'Room' => array(
					'className' => 'Rooms.Room',
					//'fields' => array('id', 'name'),
					'foreignKey' => false,
					'type' => 'LEFT',
					'conditions' => array(
						'Room.id' . ' = ' . 'Box.room_id',
					),
				),
				'RoomsLanguage' => array(
					'className' => 'Rooms.RoomsLanguage',
					'fields' => array('id', 'name'),
					'foreignKey' => false,
					'type' => 'LEFT',
					'conditions' => array(
						'RoomsLanguage.room_id' . ' = ' . 'Box.room_id',
						'RoomsLanguage.language_id' => Current::read('Language.id', '0'),
					),
				),
			)
		), false);
		$this->BoxesPageContainer->Room->useDbConfig = $this->BoxesPageContainer->useDbConfig;
		$this->BoxesPageContainer->RoomsLanguage->useDbConfig = $this->BoxesPageContainer->useDbConfig;

		$this->BoxesPageContainer->unbindModel(array(
			'belongsTo' => array(
				'Page', 'PageContainer'
			)
		), true);

		$query = array(
			'recursive' => 0,
			'conditions' => array(
				$this->BoxesPageContainer->alias . '.page_container_id' => $pageContainerId,
			),
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

		return $boxes;
	}

}
