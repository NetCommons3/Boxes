<?php
/**
 * BoxesPageContainerFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxFixture', 'Boxes.Test/Fixture');
App::uses('PageContainerFixture', 'Pages.Test/Fixture');
App::uses('Space', 'Pages.Model');
App::uses('Room', 'Pages.Model');

/**
 * Summary for BoxesPageContainerFixture
 */
class BoxesPageContainerFixture extends CakeTestFixture {

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		//initでセットする
	);

/**
 * Recordsをセットしたかどうかをチェックするためのもの
 *
 * @var array
 */
	protected $_addedRecords = [];

/**
 * Boxデータ
 *
 * @var array
 */
	protected $_boxes = array();

/**
 * PageContainerデータ
 *
 * @var array
 */
	protected $_pageContainers = array();

/**
 * ルームID
 *
 * @var array
 */
	protected $_roomId = array(
		'2' => array('2', '5', '6')
	);

/**
 * ページID
 *
 * @var array
 */
	protected $_pageId = array(
		'2' => array('1', '2', '3'),
		'5' => array('4'),
		'6' => array('5'),
	);

/**
 * Initialize the fixture.
 *
 * @return void
 */
	public function init() {
		require_once App::pluginPath('Boxes') . 'Config' . DS . 'Schema' . DS . 'schema.php';
		$this->fields = (new BoxesSchema())->tables['boxes_page_containers'];

		$this->setRecords();
		parent::init();
	}

/**
 * recordsのセット
 *
 * @return void
 */
	public function setRecords() {
		if (! $this->_boxes) {
			$fixture = new BoxFixture();
			$fixture->setRecords();
			$this->_boxes = $fixture->records;
		}

		if (! $this->_pageContainers) {
			$fixture = new PageContainerFixture();
			$fixture->setRecords();
			$this->_pageContainers = $fixture->records;
		}

		$this->_id = 0;

		//サイト全体
		//$this->setRecord('1', '1', '1', ['1', '2', '4', '5']);
		//パブリックスペース
		$this->setRecord('2', '2', '2', ['1', '2', '4', '5']);
		//プライベートスペース
		$this->setRecord('3', '3', '3', ['1', '2', '4', '5']);
		//コミュニティスペース
		$this->setRecord('4', '3', '4', ['1', '2', '4', '5']);

		//ページ
		foreach ($this->_roomId as $spaceId => $roomIds) {
			foreach ($roomIds as $roomId) {
				foreach ($this->_pageId[$roomId] as $pageId) {
					$this->setRecord($spaceId, $roomId, $pageId, ['1', '2', '3', '4', '5']);
				}
			}
		}
	}

/**
 * recordsのセット
 *
 * @param int $spaceId スペースID
 * @param int $roomId ルームID
 * @param int $pageId ページID
 * @param array $containerTypes コンテントタイプ
 * @return void
 */
	public function setRecord($spaceId, $roomId, $pageId, $containerTypes) {
		$pathKey = $spaceId . '_' . $roomId . '_' . $pageId;
		foreach ($containerTypes as $containerType) {
			$result = $this->_pageContainers;
			$result = Hash::extract($result, '{n}[page_id=' . $pageId . ']');
			$result = Hash::extract($result, '{n}[container_type=' . $containerType . ']');
			$pageContainerId = Hash::get($result, '0.id');
			if (! $pageContainerId) {
				continue;
			}

			$this->_weight = 0;
			if ($containerType != '3') {
				//サイト全体
				$result = $this->_boxes;
				$result = Hash::extract($result, '{n}[type=1]');
				$result = Hash::extract($result, '{n}[container_type=' . $containerType . ']');
				$boxId = Hash::get($result, '0.id');
				$this->__setRecord($pageContainerId, $boxId, $pageId, $containerType, $pathKey);

				//スペース
				$result = $this->_boxes;
				$result = Hash::extract($result, '{n}[type=2]');
				$result = Hash::extract($result, '{n}[space_id=' . $spaceId . ']');
				$result = Hash::extract($result, '{n}[container_type=' . $containerType . ']');
				$boxId = Hash::get($result, '0.id');
				$this->__setRecord($pageContainerId, $boxId, $pageId, $containerType, $pathKey);

				//ルーム
				$result = $this->_boxes;
				$result = Hash::extract($result, '{n}[type=3]');
				$result = Hash::extract($result, '{n}[space_id=' . $spaceId . ']');
				$result = Hash::extract($result, '{n}[room_id=' . $roomId . ']');
				$result = Hash::extract($result, '{n}[container_type=' . $containerType . ']');
				$boxId = Hash::get($result, '0.id');
				$this->__setRecord($pageContainerId, $boxId, $pageId, $containerType, $pathKey);
			}
			//ページ
			$result = $this->_boxes;
			$result = Hash::extract($result, '{n}[type=4]');
			$result = Hash::extract($result, '{n}[space_id=' . $spaceId . ']');
			$result = Hash::extract($result, '{n}[room_id=' . $roomId . ']');
			$result = Hash::extract($result, '{n}[page_id=' . $pageId . ']');
			$result = Hash::extract($result, '{n}[container_type=' . $containerType . ']');
			$boxId = Hash::get($result, '0.id');
			$this->__setRecord($pageContainerId, $boxId, $pageId, $containerType, $pathKey);
		}
	}

/**
 * recordsのセット
 *
 * @param int $pageContainerId ページコンテナーID
 * @param int $boxId ボックスID
 * @param int $pageId ページID
 * @param int $containerType コンテナータイプ
 * @param string $pathKey パスKey
 * @return void
 */
	private function __setRecord($pageContainerId, $boxId, $pageId, $containerType, $pathKey) {
		if (! $boxId) {
			return;
		}

		$pathKey .= '_' . $pageContainerId . '_' . $boxId . '_' . $containerType;
		if (in_array($pathKey, $this->_addedRecords, true)) {
			return;
		}
		$this->_addedRecords[] = $pathKey;

		$this->_id++;
		$this->_weight++;
		$this->records[] = array(
			'id' => (string)$this->_id,
			'page_container_id' => (string)$pageContainerId,
			'page_id' => $pageId,
			'container_type' => $containerType,
			'box_id' => (string)$boxId,
			'is_published' => ($this->_weight === 1),
			'weight' => $this->_weight
		);
	}

}
