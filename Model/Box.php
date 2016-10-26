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
 * Default behaviors
 *
 * @var array
 */
//	public $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
//		'Container' => array(
//			'className' => 'Containers.Container',
//			'foreignKey' => 'container_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
//	public $hasAndBelongsToMany = array(
//		'Page' => array(
//			'className' => 'Pages.Page',
//			'joinTable' => 'boxes_pages',
//			'foreignKey' => 'box_id',
//			'associationForeignKey' => 'page_id',
//			'unique' => 'keepExisting',
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//		)
//	);

/**
 * Constructor. Binds the model's database table to the object.
 *
 * @param bool|int|string|array $id Set this ID for this model on startup,
 * can also be an array of options, see above.
 * @param string $table Name of database table to use.
 * @param string $ds DataSource connection name.
 * @see Model::__construct()
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
//	public function __construct($id = false, $table = null, $ds = null) {
//		parent::__construct($id, $table, $ds);
//		$this->loadModels([
//			'BoxesPage' => 'Boxes.BoxesPage',
//		]);
//	}

/**
 * Get box with frame
 *
 * @param string $id Box ID
 * @return array
 */
//	public function getBoxWithFrame($id) {
//		$query = array(
//			'conditions' => array(
//				'Box.id' => $id,
//			),
//			'contain' => array(
//				'Page' => array(
//					'conditions' => array(
//						// It must check settingmode and page_id
//						'BoxesPage.is_published' => true
//					)
//				),
//				'Frame' => $this->Frame->getContainableQuery()
//			)
//		);
//
//		return $this->find('first', $query);
//	}

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

/**
 * Get query option for containable behavior with frame
 *
 * @return array
 */
//	private function __getContainableQuery() {
//		$query = array(
//			'order' => array(
//				'Box.weight'
//			),
//			'Frame' => $this->Frame->getContainableQuery()
//		);
//
//		return $query;
//	}

/**
 * Get condition of query option for containable behavior
 *
 * @return array
 */
//	private function __getConditionsQuery() {
//		$conditions = array(
//			'conditions' => array(
//				// It must check settingmode and page_id
//				'BoxesPage.is_published' => true
//			)
//		);
//
//		return $conditions;
//	}

/**
 * Get query option for containable behavior with frame
 *
 * @return array
 */
//	public function getContainableQueryAssociatedPage() {
//		$query = $this->__getContainableQuery();
//		$query['Page'] = $this->__getConditionsQuery();
//
//		return $query;
//	}

/**
 * Get query option for containable behavior with frame
 *
 * @return array
 */
//	public function getContainableQueryNotAssociatedPage() {
//		$query = $this->__getContainableQuery();
//		$conditions = $this->__getConditionsQuery();
//
//		return array_merge($query, $conditions);
//	}

}
