<?php
/**
 * BoxesPageContainer Model
 *
 * @property PageContainer $PageContainer
 * @property Page $Page
 * @property Box $Box
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesAppModel', 'Boxes.Model');
App::uses('Container', 'Containers.Model');
App::uses('Box', 'Boxes.Model');

/**
 * BoxesPageContainer Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Model
 */
class BoxesPageContainer extends BoxesAppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PageContainer' => array(
			'className' => 'Pages.PageContainer',
			'foreignKey' => 'page_container_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Page' => array(
			'className' => 'Pages.Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Box' => array(
			'className' => 'Boxes.Box',
			'foreignKey' => 'box_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Called during validation operations, before validation. Please note that custom
 * validation rules can be defined in $validate.
 *
 * @param array $options Options passed from Model::save().
 * @return bool True if validate operation should continue, false to abort
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforevalidate
 * @see Model::save()
 */
	public function beforeValidate($options = array()) {
		$this->validate = Hash::merge($this->validate, array(
			'page_container_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
			'box_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
			'page_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
			'container_type' => array(
				'inList' => array(
					'rule' => array('inList', array(
						Container::TYPE_HEADER,
						Container::TYPE_MAJOR,
						Container::TYPE_MAIN,
						Container::TYPE_MINOR,
						Container::TYPE_FOOTER,
					)),
					'message' => __d('net_commons', 'Invalid request.'),
				)
			),
			'is_published' => array(
				'boolean' => array(
					'rule' => array('boolean'),
					'message' => __d('net_commons', 'Invalid request.'),
					'required' => false,
				),
			),
		));

		return parent::beforeValidate($options);
	}

/**
 * 表示・非表示の切り替え
 *
 * @param array $data リクエストデータ
 * @return bool True on success
 * @throws InternalErrorException
 */
	public function updateDisplay($data) {
		//トランザクションBegin
		$this->begin();

		$containerType = $data[$this->alias]['container_type'];
		$boxType = $data['Box']['type'];
		$pageRoomdId = $data['Page']['room_id'];
		$isPublished = $data[$this->alias]['is_published'];

		if (! $this->_updateDisplay($data)) {
			return false;
		}

		if ($boxType !== Box::TYPE_WITH_PAGE &&
				in_array($containerType, [Container::TYPE_HEADER, Container::TYPE_FOOTER], true)) {

			$boxes = $this->find('all', array(
				'recursive' => 0,
				'conditions' => array(
					'Page.room_id' => $pageRoomdId,
					$this->alias . '.container_type' => $containerType,
					'Box.type' => $boxType,
				),
			));

			$boxesByPageType = $this->find('list', array(
				'recursive' => 0,
				'fields' => array(
					$this->alias . '.id',
					$this->alias . '.page_id'
				),
				'conditions' => array(
					'Page.room_id' => $pageRoomdId,
					$this->alias . '.container_type' => $containerType,
					$this->alias . '.is_published' => true,
					'Box.type' => Box::TYPE_WITH_PAGE,
				),
			));

			foreach ($boxes as $box) {
				if ($box[$this->alias]['is_published'] ||
						in_array($box[$this->alias]['page_id'], $boxesByPageType, true)) {
					continue;
				}
				$box[$this->alias]['is_published'] = $isPublished;
				if (! $this->_updateDisplay($box)) {
					return false;
				}
			}
		}

		//トランザクションCommit
		$this->commit();

		return true;
	}

/**
 * 表示・非表示の切り替え
 *
 * @param array $data リクエストデータ
 * @return bool True on success
 * @throws InternalErrorException
 */
	protected function _updateDisplay($data) {
		$containerType = $data[$this->alias]['container_type'];

		$this->id = $data[$this->alias]['id'];
		if (! $this->exists()) {
			return false;
		}

		//バリデーション
		$this->set($data);
		if (! $this->validates()) {
			return false;
		}

		try {
			//BoxPageContainerテーブルの登録
			if (! $this->saveField('is_published', $data[$this->alias]['is_published'], false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if ($data[$this->alias]['is_published'] &&
					in_array($containerType, [Container::TYPE_HEADER, Container::TYPE_FOOTER], true)) {
				$update = array(
					'is_published' => '0'
				);
				$conditions = array(
					$this->alias . '.id !=' => $data[$this->alias]['id'],
					$this->alias . '.page_container_id' => $data[$this->alias]['page_container_id'],
				);
				if (! $this->updateAll($update, $conditions)) {
					throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				}
			}
		} catch (Exception $ex) {
			//トランザクションRollback
			$this->rollback($ex);
		}

		return true;
	}

}
