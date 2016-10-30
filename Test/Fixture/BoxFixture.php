<?php
/**
 * BoxFixture
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

/**
 * Summary for BoxFixture
 */
class BoxFixture extends CakeTestFixture {

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1', 'type' => '1', 'space_id' => '1', 'room_id' => '1', 'page_id' => null, 'container_type' => '1',
		),
		array(
			'id' => '2', 'type' => '1', 'space_id' => '1', 'room_id' => '1', 'page_id' => null, 'container_type' => '2',
		),
		array(
			'id' => '3', 'type' => '1', 'space_id' => '1', 'room_id' => '1', 'page_id' => null, 'container_type' => '4',
		),
		array(
			'id' => '4', 'type' => '1', 'space_id' => '1', 'room_id' => '1', 'page_id' => null, 'container_type' => '5',
		),
		array(
			'id' => '5', 'type' => '2', 'space_id' => '2', 'room_id' => '2', 'page_id' => null, 'container_type' => '1',
		),
		array(
			'id' => '6', 'type' => '2', 'space_id' => '3', 'room_id' => '3', 'page_id' => null, 'container_type' => '1',
		),
		array(
			'id' => '7', 'type' => '2', 'space_id' => '4', 'room_id' => '4', 'page_id' => null, 'container_type' => '1',
		),
		array(
			'id' => '8', 'type' => '2', 'space_id' => '2', 'room_id' => '2', 'page_id' => null, 'container_type' => '2',
		),
		array(
			'id' => '9', 'type' => '2', 'space_id' => '3', 'room_id' => '3', 'page_id' => null, 'container_type' => '2',
		),
		array(
			'id' => '10', 'type' => '2', 'space_id' => '4', 'room_id' => '4', 'page_id' => null, 'container_type' => '2',
		),
		array(
			'id' => '11', 'type' => '2', 'space_id' => '2', 'room_id' => '2', 'page_id' => null, 'container_type' => '4',
		),
		array(
			'id' => '12', 'type' => '2', 'space_id' => '3', 'room_id' => '3', 'page_id' => null, 'container_type' => '4',
		),
		array(
			'id' => '13', 'type' => '2', 'space_id' => '4', 'room_id' => '4', 'page_id' => null, 'container_type' => '4',
		),
		array(
			'id' => '14', 'type' => '2', 'space_id' => '2', 'room_id' => '2', 'page_id' => null, 'container_type' => '5',
		),
		array(
			'id' => '15', 'type' => '2', 'space_id' => '3', 'room_id' => '3', 'page_id' => null, 'container_type' => '5',
		),
		array(
			'id' => '16', 'type' => '2', 'space_id' => '4', 'room_id' => '4', 'page_id' => null, 'container_type' => '5',
		),

		//ルーム、ページのBoxはinit()でセットする
	);

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
		$this->fields = (new BoxesSchema())->tables['boxes'];

		$this->setRecords();
		parent::init();
	}

/**
 * recordsのセット
 *
 * @return void
 */
	public function setRecords() {
		$id = 16;

		foreach ($this->_roomId as $spaceId => $roomIds) {
			foreach ($roomIds as $roomId) {
				foreach (['1', '2', '4', '5'] as $containerType) {
					$id++;
					$this->records[] = array(
						'id' => (string)$id,
						'type' => '3',
						'space_id' => $spaceId,
						'room_id' => $roomId,
						'page_id' => null,
						'container_type' => $containerType,
					);
				}

				foreach ($this->_pageId[$roomId] as $pageId) {
					foreach (['1', '2', '3', '4', '5'] as $containerType) {
						$id++;
						$this->records[] = array(
							'id' => (string)$id,
							'type' => '4',
							'space_id' => $spaceId,
							'room_id' => $roomId,
							'page_id' => $pageId,
							'container_type' => $containerType,
						);
					}
				}
			}
		}
	}

}
