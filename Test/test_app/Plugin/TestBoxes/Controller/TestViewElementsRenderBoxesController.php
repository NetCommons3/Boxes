<?php
/**
 * View/Elements/render_boxesテスト用Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');
App::uses('Container', 'Containers.Model');

/**
 * View/Elements/render_boxesテスト用Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\test_app\Plugin\TestBoxes\Controller
 */
class TestViewElementsRenderBoxesController extends AppController {

/**
 * use components
 *
 * @var array
 */
	public $components = array(
		'Pages.PageLayout',
	);

/**
 * render_boxes
 *
 * @return void
 */
	public function render_boxes() {
		$this->autoRender = true;

		$this->set('containerType', Container::TYPE_HEADER);

		$boxes[0] = array(
			'BoxesPageContainer' => array(
				'id' => '29',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '1',
				'box_id' => '1',
				'is_published' => true,
				'weight' => '1',
			),
			'Box' => array(
				'id' => '1',
				'container_id' => null,
				'type' => '1',
				'space_id' => '1',
				'room_id' => '1',
				'page_id' => null,
				'container_type' => '1',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => null,
			),
			'Frame' => array(
				0 => array(
					'id' => '1',
					'language_id' => '2',
					'room_id' => '2',
					'box_id' => '1',
					'plugin_key' => 'test_pages',
					'block_id' => '2',
					'key' => 'frame_header',
					'name' => 'Test frame header',
					'header_type' => 'default',
					'weight' => '1',
					'is_deleted' => false,
					'default_action' => '',
				),
			),
		);
		$this->set('boxes', $boxes);
	}

}
