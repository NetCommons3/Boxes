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
		//'PageContainer' => array(
		//	'className' => 'PageContainer',
		//	'foreignKey' => 'page_container_id',
		//	'conditions' => '',
		//	'fields' => '',
		//	'order' => ''
		//),
		//'Page' => array(
		//	'className' => 'Page',
		//	'foreignKey' => 'page_id',
		//	'conditions' => '',
		//	'fields' => '',
		//	'order' => ''
		//),
		'Box' => array(
			'className' => 'Box',
			'foreignKey' => 'box_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
