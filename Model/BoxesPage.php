<?php
/**
 * BoxesPage Model
 *
 * @property Page $Page
 * @property Box $Box
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('PagesAppModel', 'Pages.Model');

/**
 * Summary for BoxesPage Model
 */
class BoxesPage extends PagesAppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
 * Called before each save operation, after validation. Return a non-true result
 * to halt the save.
 *
 * @param array $options Options passed from Model::save().
 * @return bool True if the operation should continue, false if it should abort
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforesave
 * @throws InternalErrorException
 * @see Model::save()
 */
	public function beforeSave($options = array()) {
		if (! isset($this->data['Box'])) {
			return true;
		}

		$conditions = array(
			'type' => Hash::get($this->data, 'Box.type'),
			'container_id' => Hash::get($this->data, 'Box.container_id'),
		);
		if (Hash::get($this->data, 'Box.type') === Box::TYPE_WITH_PAGE) {
			$conditions['page_id'] = Current::read('Page.id');
			$this->data['Box']['space_id'] = Current::read('Room.space_id');
			$this->data['Box']['room_id'] = Current::read('Room.id');
		} elseif (Hash::get($this->data, 'Box.type') === Box::TYPE_WITH_ROOM) {
			$conditions['room_id'] = Current::read('Room.id');
			$this->data['Box']['space_id'] = Current::read('Room.space_id');
			$this->data['Box']['page_id'] = Current::read('Room.page_id_top');
		} elseif (Hash::get($this->data, 'Box.type') === Box::TYPE_WITH_SPACE) {
			$conditions['space_id'] = Current::read('Room.space_id');
			$this->data['Box']['room_id'] = Current::read('Room.id');
			$this->data['Box']['page_id'] = Current::read('Room.page_id_top');
		}

		$box = $this->Box->find('first', array(
			'recursive' => -1,
			'fields' => array('id'),
			'conditions' => $conditions,
		));
		if ($box) {
			$this->data['BoxesPage']['box_id'] = $box['Box']['id'];
			return true;
		}

		//バリデーション
		$this->data['Box'] = Hash::merge($this->data['Box'], $conditions);

		$this->Box->set($this->data['Box']);
		if (! $this->Box->validates()) {
			return false;
		}

		$result = $this->Box->save(null, false);
		if (! $result) {
			return false;
		}
		$this->data['Box'] = $result['Box'];
		$this->data['BoxesPage']['box_id'] = $this->data['Box']['id'];

		return true;
	}

/**
 * BoxesPageの登録
 *
 * @param array $data received post data
 * @return bool True on success, false on validation errors
 * @throws InternalErrorException
 */
	public function saveBoxesPage($data) {
		//トランザクションBegin
		$this->begin();

		//バリデーション
		$this->set($data);
		if (! $this->validates()) {
			return false;
		}

		try {
			//登録処理
			if (! $this->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			//トランザクションCommit
			$this->commit();

		} catch (Exception $ex) {
			//トランザクションRollback
			$this->rollback($ex);
		}

		return true;
	}

}
