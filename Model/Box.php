<?php
/**
 * Box Model
 *
 * @property Container $Container
 * @property Space $Space
 * @property Room $Room
 * @property Page $Page
 * @property Frame $Frame
 * @property Page $Page
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesAppModel', 'Boxes.Model');

/**
 * Summary for Box Model
 */
class Box extends BoxesAppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Container' => array(
			'className' => 'Container',
			'foreignKey' => 'container_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Space' => array(
			'className' => 'Space',
			'foreignKey' => 'space_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
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
			'order' => array('Frame.id DESC'),
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
	public $hasAndBelongsToMany = array(
		'Page' => array(
			'className' => 'Page',
			'joinTable' => 'boxes_pages',
			'foreignKey' => 'box_id',
			'associationForeignKey' => 'page_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
