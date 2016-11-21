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

		//テストプラグインのロード
		NetCommonsCakeTestCase::loadTestPlugin($this, 'Boxes', 'TestBoxes');
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
				0 => array(
					'id' => '1',
					'language_id' => '2',
					'room_id' => '2',
					'box_id' => '23',
					'plugin_key' => 'test_boxes',
					'block_id' => '2',
					'key' => 'frame_main',
					'name' => 'Test frame main',
					'header_type' => 'default',
					'weight' => '1',
					'is_deleted' => false,
					'default_action' => '',
				),
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
				0 => array(
					'id' => '1',
					'language_id' => '2',
					'room_id' => '2',
					'box_id' => '1',
					'plugin_key' => 'test_boxes',
					'block_id' => '2',
					'key' => 'frame_header',
					'name' => 'Test frame footer',
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
				0 => array(
					'id' => '1',
					'language_id' => '2',
					'room_id' => '2',
					'box_id' => '1',
					'plugin_key' => 'test_boxes',
					'block_id' => '2',
					'key' => 'frame_major',
					'name' => 'Test frame major',
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
				0 => array(
					'id' => '1',
					'language_id' => '2',
					'room_id' => '2',
					'box_id' => '1',
					'plugin_key' => 'test_boxes',
					'block_id' => '2',
					'key' => 'frame_minor',
					'name' => 'Test frame minor',
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
 */
	public function testRenderBoxesForHeader() {
		//データ生成
		Current::isSettingMode(true);
		Current::write('Room.id', '2');
		Current::$permission = Hash::insert(Current::$permission, '1.Permission.page_editable.value', true);
		Current::$permission = Hash::insert(Current::$permission, '2.Permission.page_editable.value', true);

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
		$pattern =
			preg_quote('<div class="row">', '/') .
				preg_quote('<div class="col-xs-3" id="box-1">', '/') .
					preg_quote('<div class="panel panel-success box-panel-head">', '/') .
						preg_quote('<div class="panel-heading cleafix">', '/') .
							preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
								preg_quote('<div style="display:none;">', '/') .
									preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="29"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="1" ', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
								preg_quote('<div class="radio">', '/') .
								preg_quote('<label class="control-label">', '/') .
								preg_quote('<input type="radio" name="data[BoxesPageContainer][is_published]"', '/') . '.*?' . '>' .
								preg_quote('サイト全体で共通のエリア', '/') .
								preg_quote('</label>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]" id="_NetCommonsTimeUserTimezone"/>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
							preg_quote('</form>', '/') .
						preg_quote('</div>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div class="col-xs-3" id="box-5">', '/') .
					preg_quote('<div class="panel panel-default box-panel-head">', '/') .
						preg_quote('<div class="panel-heading cleafix">', '/') .
							preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
								preg_quote('<div style="display:none;">', '/') .
									preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="30"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="5"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
								preg_quote('<div class="radio">', '/') .
								preg_quote('<label class="control-label">', '/') .
								preg_quote('<input type="radio" name="data[BoxesPageContainer][is_published]"', '/') . '.*?' . '>' .
								preg_quote('Public共通のエリア', '/') .
								preg_quote('</label>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
							preg_quote('</form>', '/') .
						preg_quote('</div>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			preg_quote('<div class="panel panel-success box-panel-body">', '/') .
				'.*?' .
				preg_quote('<div class="add-plugin">', '/') .
					preg_quote('<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-1">', '/') .
					preg_quote('<span class="glyphicon glyphicon-pushpin">', '/') .
					preg_quote('</span>プラグイン追加(ヘッダー)</button>', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div id="box-1">', '/') .
					preg_quote('<section class="frame panel panel-default nc-content plugin-test-boxes">', '/') .
						preg_quote('<div class="panel-heading clearfix">', '/') .
							preg_quote('<span>Test frame header</span>', '/') .
							preg_quote('<div class="pull-right">', '/') .
								preg_quote('<form action="/frames/frames/order"', '/') . '.*?' . preg_quote('</form>', '/') .
								preg_quote('<form action="/frames/frames/delete"', '/') . '.*?' . preg_quote('</form>', '/') .
							preg_quote('</div>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<div class="panel-body block"> test_boxes/test_boxes/index</div>', '/') .
					preg_quote('</section>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/');

		$this->assertRegExp('/' . $pattern . '/', $result);
	}

/**
 * renderBoxes()のFooterテスト
 *
 * @return void
 */
	public function testRenderBoxesForFooter() {
		//データ生成
		Current::isSettingMode(true);
		Current::write('Room.id', '2');
		Current::$permission = Hash::insert(Current::$permission, '1.Permission.page_editable.value', true);
		Current::$permission = Hash::insert(Current::$permission, '2.Permission.page_editable.value', true);

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
		$pattern =
			preg_quote('<div class="row">', '/') .
				preg_quote('<div class="col-xs-3" id="box-1">', '/') .
					preg_quote('<div class="panel panel-success box-panel-head">', '/') .
						preg_quote('<div class="panel-heading cleafix">', '/') .
							preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
								preg_quote('<div style="display:none;">', '/') .
									preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="29"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="1" ', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="5"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
								preg_quote('<div class="radio">', '/') .
								preg_quote('<label class="control-label">', '/') .
								preg_quote('<input type="radio" name="data[BoxesPageContainer][is_published]"', '/') . '.*?' . '>' .
								preg_quote('サイト全体で共通のエリア', '/') .
								preg_quote('</label>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]" id="_NetCommonsTimeUserTimezone"/>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
							preg_quote('</form>', '/') .
						preg_quote('</div>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div class="col-xs-3" id="box-5">', '/') .
					preg_quote('<div class="panel panel-default box-panel-head">', '/') .
						preg_quote('<div class="panel-heading cleafix">', '/') .
							preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
								preg_quote('<div style="display:none;">', '/') .
									preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="30"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="5"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="5"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
								preg_quote('<div class="radio">', '/') .
								preg_quote('<label class="control-label">', '/') .
								preg_quote('<input type="radio" name="data[BoxesPageContainer][is_published]"', '/') . '.*?' . '>' .
								preg_quote('Public共通のエリア', '/') .
								preg_quote('</label>', '/') .
								preg_quote('</div>', '/') .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
								preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
							preg_quote('</form>', '/') .
						preg_quote('</div>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			preg_quote('<div class="panel panel-success box-panel-body">', '/') .
				'.*?' .
				preg_quote('<div class="add-plugin">', '/') .
					preg_quote('<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-1">', '/') .
					preg_quote('<span class="glyphicon glyphicon-pushpin">', '/') .
					preg_quote('</span>プラグイン追加(フッター)</button>', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div id="box-1">', '/') .
					preg_quote('<section class="frame panel panel-default nc-content plugin-test-boxes">', '/') .
						preg_quote('<div class="panel-heading clearfix">', '/') .
							preg_quote('<span>Test frame footer</span>', '/') .
							preg_quote('<div class="pull-right">', '/') .
								preg_quote('<form action="/frames/frames/order"', '/') . '.*?' . preg_quote('</form>', '/') .
								preg_quote('<form action="/frames/frames/delete"', '/') . '.*?' . preg_quote('</form>', '/') .
							preg_quote('</div>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<div class="panel-body block"> test_boxes/test_boxes/index</div>', '/') .
					preg_quote('</section>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/');

		$this->assertRegExp('/' . $pattern . '/', $result);
	}

/**
 * renderBoxes()のMainテスト
 *
 * @return void
 */
	public function testRenderBoxesForMain() {
		//データ生成
		Current::isSettingMode(true);
		Current::write('Room.id', '2');
		Current::$permission = Hash::insert(Current::$permission, '2.Permission.page_editable.value', true);

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
		$pattern =
			'.*?' .
			preg_quote('<div class="add-plugin">', '/') .
				preg_quote('<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-23">', '/') .
				preg_quote('<span class="glyphicon glyphicon-pushpin">', '/') .
				preg_quote('</span>プラグイン追加(センター)</button>', '/') .
			preg_quote('</div>', '/') .
			preg_quote('<div id="box-23">', '/') .
				preg_quote('<section class="frame panel panel-default nc-content plugin-test-boxes">', '/') .
					preg_quote('<div class="panel-heading clearfix">', '/') .
						preg_quote('<span>Test frame main</span>', '/') .
						preg_quote('<div class="pull-right">', '/') .
							preg_quote('<form action="/frames/frames/order"', '/') . '.*?' . preg_quote('</form>', '/') .
							preg_quote('<form action="/frames/frames/delete"', '/') . '.*?' . preg_quote('</form>', '/') .
						preg_quote('</div>', '/') .
					preg_quote('</div>', '/') .
					preg_quote('<div class="panel-body block"> test_boxes/test_boxes/index</div>', '/') .
				preg_quote('</section>', '/') .
			preg_quote('</div>', '/');

		$this->assertRegExp('/' . $pattern . '/', $result);
	}

/**
 * renderBoxes()のMajorテスト
 *
 * @return void
 */
	public function testRenderBoxesForMajor() {
		//データ生成
		Current::isSettingMode(true);
		Current::write('Room.id', '2');
		Current::$permission = Hash::insert(Current::$permission, '1.Permission.page_editable.value', true);
		Current::$permission = Hash::insert(Current::$permission, '2.Permission.page_editable.value', true);

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
		$pattern =
			preg_quote('<div class="panel panel-success box-panel" id="box-1">', '/') .
				preg_quote('<div class="panel-heading cleafix">', '/') .
					preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
						preg_quote('<div style="display:none;">', '/') .
							preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="29"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="2"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][is_published]" value="0"', '/') . '.*?' . '>' .
						preg_quote('<button name="save" class="btn btn-xs btn-default active" ng-class="{disabled: sending}" type="submit">', '/') .
							preg_quote('<span class="glyphicon glyphicon-eye-open" aria-hidden="true">', '/') .
							preg_quote('</span>', '/') .
						preg_quote('</button>', '/') .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
					preg_quote('</form>', '/') .
					preg_quote('サイト全体で共通のエリア(左)', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div class="panel-body">', '/') .
					preg_quote('<section class="modal fade" id="add-plugin-1" tabindex="-1" role="dialog" aria-hidden="true">', '/') .
					'.*?' .
					preg_quote('</section>', '/') .
					preg_quote('<div class="add-plugin">', '/') .
						preg_quote('<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-1">', '/') .
						preg_quote('<span class="glyphicon glyphicon-pushpin">', '/') .
						preg_quote('</span>プラグイン追加</button>', '/') .
					preg_quote('</div>', '/') .
					preg_quote('<div id="box-1">', '/') .
						preg_quote('<section class="frame panel panel-default nc-content plugin-test-boxes">', '/') .
							preg_quote('<div class="panel-heading clearfix">', '/') .
								preg_quote('<span>Test frame major</span>', '/') .
									preg_quote('<div class="pull-right">', '/') .
										preg_quote('<form action="/frames/frames/order"', '/') . '.*?' . preg_quote('</form>', '/') .
										preg_quote('<form action="/frames/frames/delete"', '/') . '.*?' . preg_quote('</form>', '/') .
									preg_quote('</div>', '/') .
							preg_quote('</div>', '/') .
							preg_quote('<div class="panel-body block"> test_boxes/test_boxes/index</div>', '/') .
						preg_quote('</section>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			preg_quote('<div class="panel panel-default box-panel" id="box-5">', '/') .
				preg_quote('<div class="panel-heading cleafix">', '/') .
					preg_quote('<form action="/setting/boxes/boxes/display?page_id=1"', '/') . '.*?' . '>' .
						preg_quote('<div style="display:none;">', '/') .
							preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="30"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="5"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="2"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][is_published]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<button name="save" class="btn btn-xs btn-default" ng-class="{disabled: sending}" type="submit">', '/') .
							preg_quote('<span class="glyphicon glyphicon-minus" aria-hidden="true">', '/') .
							preg_quote('</span>', '/') .
						preg_quote('</button>', '/') .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
					preg_quote('</form>', '/') .
					preg_quote('Public共通のエリア(左)', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			'';

		$this->assertRegExp('/' . $pattern . '/', $result);
	}

/**
 * renderBoxes()のMinorテスト
 *
 * @return void
 */
	public function testRenderBoxesForMinor() {
		//データ生成
		Current::isSettingMode(true);
		Current::write('Room.id', '2');
		Current::$permission = Hash::insert(Current::$permission, '1.Permission.page_editable.value', true);
		Current::$permission = Hash::insert(Current::$permission, '2.Permission.page_editable.value', true);

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
		$pattern =
			preg_quote('<div class="panel panel-success box-panel" id="box-1">', '/') .
				preg_quote('<div class="panel-heading cleafix">', '/') .
					preg_quote('<form action="/setting/boxes/boxes/display"', '/') . '.*?' . '>' .
						preg_quote('<div style="display:none;">', '/') .
							preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="29"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="4"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][is_published]" value="0"', '/') . '.*?' . '>' .
						preg_quote('<button name="save" class="btn btn-xs btn-default active" ng-class="{disabled: sending}" type="submit">', '/') .
							preg_quote('<span class="glyphicon glyphicon-eye-open" aria-hidden="true">', '/') .
							preg_quote('</span>', '/') .
						preg_quote('</button>', '/') .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
					preg_quote('</form>', '/') .
					preg_quote('サイト全体で共通のエリア(右)', '/') .
				preg_quote('</div>', '/') .
				preg_quote('<div class="panel-body">', '/') .
					preg_quote('<section class="modal fade" id="add-plugin-1" tabindex="-1" role="dialog" aria-hidden="true">', '/') .
					'.*?' .
					preg_quote('</section>', '/') .
					preg_quote('<div class="add-plugin">', '/') .
						preg_quote('<button class="btn btn-primary form-control" data-toggle="modal" data-target="#add-plugin-1">', '/') .
						preg_quote('<span class="glyphicon glyphicon-pushpin">', '/') .
						preg_quote('</span>プラグイン追加</button>', '/') .
					preg_quote('</div>', '/') .
					preg_quote('<div id="box-1">', '/') .
						preg_quote('<section class="frame panel panel-default nc-content plugin-test-boxes">', '/') .
							preg_quote('<div class="panel-heading clearfix">', '/') .
								preg_quote('<span>Test frame minor</span>', '/') .
									preg_quote('<div class="pull-right">', '/') .
										preg_quote('<form action="/frames/frames/order"', '/') . '.*?' . preg_quote('</form>', '/') .
										preg_quote('<form action="/frames/frames/delete"', '/') . '.*?' . preg_quote('</form>', '/') .
									preg_quote('</div>', '/') .
							preg_quote('</div>', '/') .
							preg_quote('<div class="panel-body block"> test_boxes/test_boxes/index</div>', '/') .
						preg_quote('</section>', '/') .
					preg_quote('</div>', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			preg_quote('<div class="panel panel-default box-panel" id="box-5">', '/') .
				preg_quote('<div class="panel-heading cleafix">', '/') .
					preg_quote('<form action="/setting/boxes/boxes/display?page_id=1"', '/') . '.*?' . '>' .
						preg_quote('<div style="display:none;">', '/') .
							preg_quote('<input type="hidden" name="_method" value="PUT"/>', '/') .
						preg_quote('</div>', '/') .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][id]" value="30"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][box_id]" value="5"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_container_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][page_id]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][container_type]" value="4"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[Page][id]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[BoxesPageContainer][is_published]" value="1"', '/') . '.*?' . '>' .
						preg_quote('<button name="save" class="btn btn-xs btn-default" ng-class="{disabled: sending}" type="submit">', '/') .
							preg_quote('<span class="glyphicon glyphicon-minus" aria-hidden="true">', '/') .
							preg_quote('</span>', '/') .
						preg_quote('</button>', '/') .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][user_timezone]"', '/') . '.*?' . '>' .
						preg_quote('<input type="hidden" name="data[_NetCommonsTime][convert_fields]" value=""', '/') . '.*?' . '>' .
					preg_quote('</form>', '/') .
					preg_quote('Public共通のエリア(右)', '/') .
				preg_quote('</div>', '/') .
			preg_quote('</div>', '/') .
			'';

		$this->assertRegExp('/' . $pattern . '/', $result);
	}

}
