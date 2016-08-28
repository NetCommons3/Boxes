<?php
/**
 * Initial data generation of Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsMigration', 'NetCommons.Config/Migration');

/**
 * Initial data generation of Migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Config\Migration
 */
class BoxRecords extends NetCommonsMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'records';

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
 * Records keyed by model name.
 *
 * @var array $records
 */
	public $records = array(
		'Box' => array(
			//パブリックスペース自体
			array(
				'id' => '1', 'container_id' => '1', 'type' => '1', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '1', 'weight' => '1',
			),
			array(
				'id' => '2', 'container_id' => '2', 'type' => '1', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '1', 'weight' => '1',
			),
			array(
				'id' => '3', 'container_id' => '3', 'type' => '4', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '1', 'weight' => '1',
			),
			array(
				'id' => '4', 'container_id' => '4', 'type' => '1', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '1', 'weight' => '1',
			),
			array(
				'id' => '5', 'container_id' => '5', 'type' => '1', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '1', 'weight' => '1',
			),
			//プライベートスペース自体
			array(
				'id' => '6', 'container_id' => '6', 'type' => '1', 'space_id' => '3',
				'room_id' => '2', 'page_id' => '2', 'weight' => '1',
			),
			array(
				'id' => '7', 'container_id' => '7', 'type' => '1', 'space_id' => '3',
				'room_id' => '2', 'page_id' => '2', 'weight' => '1',
			),
			array(
				'id' => '8', 'container_id' => '8', 'type' => '4', 'space_id' => '3',
				'room_id' => '2', 'page_id' => '2', 'weight' => '1',
			),
			array(
				'id' => '9', 'container_id' => '9', 'type' => '1', 'space_id' => '3',
				'room_id' => '2', 'page_id' => '2', 'weight' => '1',
			),
			array(
				'id' => '10', 'container_id' => '10', 'type' => '1', 'space_id' => '4',
				'room_id' => '2', 'page_id' => '2', 'weight' => '1',
			),
			//グループスペース自体
			array(
				'id' => '11', 'container_id' => '11', 'type' => '1', 'space_id' => '4',
				'room_id' => '3', 'page_id' => '3', 'weight' => '1',
			),
			array(
				'id' => '12', 'container_id' => '12', 'type' => '1', 'space_id' => '4',
				'room_id' => '3', 'page_id' => '3', 'weight' => '1',
			),
			array(
				'id' => '13', 'container_id' => '13', 'type' => '4', 'space_id' => '4',
				'room_id' => '3', 'page_id' => '3', 'weight' => '1',
			),
			array(
				'id' => '14', 'container_id' => '14', 'type' => '1', 'space_id' => '4',
				'room_id' => '3', 'page_id' => '3', 'weight' => '1',
			),
			array(
				'id' => '15', 'container_id' => '15', 'type' => '1', 'space_id' => '4',
				'room_id' => '3', 'page_id' => '3', 'weight' => '1',
			),
			//パブリックスペースのホーム
			array(
				'id' => '16', 'container_id' => '16', 'type' => '4', 'space_id' => '2',
				'room_id' => '1', 'page_id' => '4', 'weight' => '1',
			),
		),

		'BoxesPage' => array(
			//パブリックスペース自体
			array('id' => '1', 'page_id' => '1', 'box_id' => '1', 'is_published' => true),
			array('id' => '2', 'page_id' => '1', 'box_id' => '2', 'is_published' => true),
			array('id' => '3', 'page_id' => '1', 'box_id' => '3', 'is_published' => true),
			array('id' => '4', 'page_id' => '1', 'box_id' => '4', 'is_published' => true),
			array('id' => '5', 'page_id' => '1', 'box_id' => '5', 'is_published' => true),
			//プライベートスペース自体
			array('id' => '6', 'page_id' => '2', 'box_id' => '6', 'is_published' => true),
			array('id' => '7', 'page_id' => '2', 'box_id' => '7', 'is_published' => true),
			array('id' => '8', 'page_id' => '2', 'box_id' => '8', 'is_published' => true),
			array('id' => '9', 'page_id' => '2', 'box_id' => '9', 'is_published' => true),
			array('id' => '10', 'page_id' => '2', 'box_id' => '10', 'is_published' => true),
			//グループスペース自体
			array('id' => '11', 'page_id' => '3', 'box_id' => '11', 'is_published' => true),
			array('id' => '12', 'page_id' => '3', 'box_id' => '12', 'is_published' => true),
			array('id' => '13', 'page_id' => '3', 'box_id' => '13', 'is_published' => true),
			array('id' => '14', 'page_id' => '3', 'box_id' => '14', 'is_published' => true),
			array('id' => '15', 'page_id' => '3', 'box_id' => '15', 'is_published' => true),
			//パブリックスペースのホーム
			array('id' => '16', 'page_id' => '4', 'box_id' => '1', 'is_published' => true),
			array('id' => '17', 'page_id' => '4', 'box_id' => '2', 'is_published' => true),
			array('id' => '18', 'page_id' => '4', 'box_id' => '16', 'is_published' => true),
			array('id' => '19', 'page_id' => '4', 'box_id' => '4', 'is_published' => true),
			array('id' => '20', 'page_id' => '4', 'box_id' => '5', 'is_published' => true),
		),
	);

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
		return parent::updateAndDeleteRecords($direction);
	}
}
