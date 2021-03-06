<?php
/**
 * Box::getBoxWithFrame()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesGetTestCase', 'Boxes.TestSuite');

/**
 * Box::getBoxWithFrame()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\Case\Model\Box
 */
class BoxGetBoxWithFrameTest extends BoxesGetTestCase {

/**
 * Model name
 *
 * @var string
 */
	protected $_modelName = 'Box';

/**
 * Method name
 *
 * @var string
 */
	protected $_methodName = 'getBoxWithFrame';

/**
 * getBoxWithFrame()のテスト
 *
 * @return void
 */
	public function testGetBoxWithFrame() {
		//データ生成
		$model = $this->_modelName;
		$methodName = $this->_methodName;
		$pageContainerId = '1';

		//テスト実施
		$result = $this->$model->$methodName($pageContainerId);

		//チェック
		$expected = array(
			0 => array(
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
				'Room' => array(
					'id' => '1',
					'space_id' => '1',
					'page_id_top' => null,
					'parent_id' => null,
					//'lft' => '1',
					//'rght' => '12',
					'weight' => '1',
					'sort_key' => '~00000001',
					'child_count' => '5',
					'active' => true,
					'in_draft' => false,
					'default_role_key' => 'visitor',
					'need_approval' => true,
					'default_participation' => true,
					'page_layout_permitted' => false,
					'theme' => null,
				),
				'RoomsLanguage' => array(
					'id' => null,
					'name' => null,
				),
				'Frame' => array(
					0 => array(
						'id' => '1',
						'language_id' => '2',
						'frame_id' => '1',
						'name' => 'Test frame header',
						'is_origin' => true,
						'is_translation' => false,
						'is_original_copy' => false,
						'room_id' => '2',
						'box_id' => '1',
						'plugin_key' => 'test_pages',
						'block_id' => '2',
						'key' => 'frame_header',
						'header_type' => 'default',
						'weight' => '1',
						'is_deleted' => false,
						'default_action' => '',
						'default_setting_action' => '',
						'created_user' => null,
						'created' => null,
						'modified_user' => null,
						'modified' => null,
					),
				),
			),
		);
		$this->assertEquals($result, $expected);
	}

}
