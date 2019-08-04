<?php
/**
 * BoxesHelper::renderBoxes()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesHelperTestCase', 'Boxes.TestSuite');

/**
 * BoxesHelper::renderBoxes()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\Case\View\Helper\BoxesHelper
 */
class BoxesHelperRenderBoxesTest extends BoxesHelperTestCase {

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'boxes';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Boxes', 'TestBoxes');

		//テストデータ生成
		Current::write('PluginsRoom', array(
			0 => array(
				'Plugin' => array(
					'id' => '1',
					'key' => 'test_boxes',
					'name' => 'Test boxes',
				)
			),
		));

		$viewVars = array();
		$requestData = array();
		$params = array();
		$helpers = array(
			'Pages.PageLayout' => array(
				'page' => array(
					'PageContainer' => array(
						0 => array(
							'id' => '1',
							'page_id' => '1',
							'container_type' => '1',
							'box_id' => '1',
						)
					)
				)
			),
			'NetCommons.Composer'
		);

		//Helperロード
		$this->loadHelper('Boxes.Boxes', $viewVars, $requestData, $params, $helpers);
	}

/**
 * テストデータ
 *
 * @return void
 */
	private function __dataHeader() {
		//データ生成
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
					'plugin_key' => 'test_boxes',
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
		$boxes[1] = array(
			'BoxesPageContainer' => array(
				'id' => '30',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '1',
				'box_id' => '5',
				'is_published' => false,
				'weight' => '2',
			),
			'Box' => array(
				'id' => '5',
				'type' => '2',
				'space_id' => '2',
				'room_id' => '2',
				'page_id' => null,
				'container_type' => '1',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => 'Public',
			),
			'Frame' => array(),
		);

		return $boxes;
	}

/**
 * テストデータ
 *
 * @return void
 */
	private function __dataMain() {
		//データ生成
		$boxes[0] = array(
			'BoxesPageContainer' => array(
				'id' => '37',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '3',
				'box_id' => '23',
				'is_published' => true,
				'weight' => '1',
			),
			'Box' => array(
				'id' => '23',
				'type' => '4',
				'space_id' => '2',
				'room_id' => '2',
				'page_id' => '1',
				'container_type' => '3',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => null,
			),
			'Frame' => array(
				//Mockに差し替えられないため
				//空のテストとする
			),
		);

		return $boxes;
	}

/**
 * テストデータ
 *
 * @return void
 */
	private function __dataFooter() {
		//データ生成
		$boxes[0] = array(
			'BoxesPageContainer' => array(
				'id' => '29',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '5',
				'box_id' => '1',
				'is_published' => true,
				'weight' => '1',
			),
			'Box' => array(
				'id' => '1',
				'type' => '1',
				'space_id' => '1',
				'room_id' => '1',
				'page_id' => null,
				'container_type' => '5',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => null,
			),
			'Frame' => array(
				//Mockに差し替えられないため
				//空のテストとする
			),
		);
		$boxes[1] = array(
			'BoxesPageContainer' => array(
				'id' => '30',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '5',
				'box_id' => '5',
				'is_published' => false,
				'weight' => '2',
			),
			'Box' => array(
				'id' => '5',
				'type' => '2',
				'space_id' => '2',
				'room_id' => '2',
				'page_id' => null,
				'container_type' => '5',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => 'Public',
			),
			'Frame' => array(),
		);

		return $boxes;
	}

/**
 * テストデータ
 *
 * @return void
 */
	private function __dataMajor() {
		//データ生成
		$boxes[0] = array(
			'BoxesPageContainer' => array(
				'id' => '29',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '2',
				'box_id' => '1',
				'is_published' => true,
				'weight' => '1',
			),
			'Box' => array(
				'id' => '1',
				'type' => '1',
				'space_id' => '1',
				'room_id' => '1',
				'page_id' => null,
				'container_type' => '2',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => null,
			),
			'Frame' => array(
				//Mockに差し替えられないため
				//空のテストとする
			),
		);
		$boxes[1] = array(
			'BoxesPageContainer' => array(
				'id' => '30',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '2',
				'box_id' => '5',
				'is_published' => false,
				'weight' => '2',
			),
			'Box' => array(
				'id' => '5',
				'type' => '2',
				'space_id' => '2',
				'room_id' => '2',
				'page_id' => null,
				'container_type' => '2',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => 'Public',
			),
			'Frame' => array(),
		);

		return $boxes;
	}

/**
 * テストデータ
 *
 * @return void
 */
	private function __dataMinor() {
		//データ生成
		$boxes[0] = array(
			'BoxesPageContainer' => array(
				'id' => '29',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '4',
				'box_id' => '1',
				'is_published' => true,
				'weight' => '1',
			),
			'Box' => array(
				'id' => '1',
				'type' => '1',
				'space_id' => '1',
				'room_id' => '1',
				'page_id' => null,
				'container_type' => '4',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => null,
			),
			'Frame' => array(
				//Mockに差し替えられないため
				//空のテストとする
			),
		);
		$boxes[1] = array(
			'BoxesPageContainer' => array(
				'id' => '30',
				'page_container_id' => '1',
				'page_id' => '1',
				'container_type' => '4',
				'box_id' => '5',
				'is_published' => false,
				'weight' => '2',
			),
			'Box' => array(
				'id' => '5',
				'type' => '2',
				'space_id' => '2',
				'room_id' => '2',
				'page_id' => null,
				'container_type' => '4',
				'weight' => null,
			),
			'RoomsLanguage' => array(
				'id' => null,
				'name' => 'Public',
			),
			'Frame' => array(),
		);

		return $boxes;
	}

/**
 * renderBoxes()のテスト
 *
 * @return void
 */
	public function testSettionOff() {
		//データ生成
		$containerType = Container::TYPE_HEADER;
		$boxes = $this->__dataHeader();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);

		//チェック
		$expected =
			'<div id="box-1">' .
				'<section class="frame panel panel-default nc-content plugin-test-boxes">' .
					'<div class="panel-heading clearfix">' .
						'<span>Test frame header</span>' .
					'</div>' .
					'<div class="panel-body block">test_boxes/test_boxes/index</div>' .
				'</section>' .
			'</div>';
		$this->assertEquals($result, $expected);
	}

/**
 * renderBoxes()のHeaderテスト
 *
 * @return void
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
	public function testRenderBoxesForHeader() {
		//データ生成
		Current::setSettingMode(true);
		Current::write('Room.id', '2');
		Current::writePermission('1', 'page_editable', true);
		Current::writePermission('2', 'page_editable', true);

		$containerType = Container::TYPE_HEADER;
		$boxes = $this->__dataHeader();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = preg_replace('/[\s\t]+/u', ' ', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);

		//チェック
		$this->assertContains('サイト全体で共通のエリア', $result);
		$this->assertContains('Public共通のエリア', $result);
		$this->assertContains('プラグイン追加(ヘッダー)', $result);
	}

/**
 * renderBoxes()のFooterテスト
 *
 * @return void
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
	public function testRenderBoxesForFooter() {
		//データ生成
		Current::setSettingMode(true);
		Current::write('Room.id', '2');
		Current::writePermission('1', 'page_editable', true);
		Current::writePermission('2', 'page_editable', true);

		$containerType = Container::TYPE_FOOTER;
		$boxes = $this->__dataFooter();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = preg_replace('/[\s\t]+/u', ' ', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);

		//チェック
		$this->assertContains('サイト全体で共通のエリア', $result);
		$this->assertContains('Public共通のエリア', $result);
		$this->assertContains('プラグイン追加(フッター)', $result);
	}

/**
 * renderBoxes()のMainテスト
 *
 * @return void
 */
	public function testRenderBoxesForMain() {
		//データ生成
		Current::setSettingMode(true);
		Current::write('Room.id', '2');
		Current::writePermission('2', 'page_editable', true);

		$containerType = Container::TYPE_MAIN;
		$boxes = $this->__dataMain();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = preg_replace('/[\s\t]+/u', ' ', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);

		//チェック
		$this->assertContains('プラグイン追加(センター)', $result);
	}

/**
 * renderBoxes()のMajorテスト
 *
 * @return void
 */
	public function testRenderBoxesForMajor() {
		//データ生成
		Current::setSettingMode(true);

		Current::write('Room.id', '2');
		Current::writePermission('1', 'page_editable', true);
		Current::writePermission('2', 'page_editable', true);

		$containerType = Container::TYPE_MAJOR;
		$boxes = $this->__dataMajor();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = preg_replace('/[\s\t]+/u', ' ', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);
		//チェック
		$this->assertContains('サイト全体で共通のエリア(左)', $result);
		$this->assertContains('Public共通のエリア(左)', $result);
		$this->assertContains('プラグイン追加', $result);
	}

/**
 * renderBoxes()のMinorテスト
 *
 * @return void
 */
	public function testRenderBoxesForMinor() {
		//データ生成
		Current::setSettingMode(true);
		Current::write('Room.id', '2');
		Current::writePermission('1', 'page_editable', true);
		Current::writePermission('2', 'page_editable', true);

		$containerType = Container::TYPE_MINOR;
		$boxes = $this->__dataMinor();

		//テスト実施
		$result = $this->Boxes->renderBoxes($containerType, $boxes);
		$result = preg_replace('/[>][\s\t]+([^a-z])/u', '>$1', $result);
		$result = preg_replace('/[\s\t]+</u', '<', $result);
		$result = preg_replace('/[\s\t]+/u', ' ', $result);
		$result = str_replace("\n", '', $result);
		$result = trim($result);

		//チェック
		$this->assertContains('サイト全体で共通のエリア(右)', $result);
		$this->assertContains('Public共通のエリア(右)', $result);
		$this->assertContains('プラグイン追加', $result);
	}

}
