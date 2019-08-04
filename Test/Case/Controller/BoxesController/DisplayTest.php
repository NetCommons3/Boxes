<?php
/**
 * BoxesController::display()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');
App::uses('Current', 'NetCommons.Utility');

/**
 * BoxesController::display()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\Case\Controller\BoxesController
 */
class BoxesControllerDisplayTest extends NetCommonsControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.boxes.box',
		'plugin.boxes.boxes_page',
		'plugin.boxes.boxes_page_container',
	);

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'boxes';

/**
 * Controller name
 *
 * @var string
 */
	protected $_controller = 'boxes';

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//ログイン
		TestAuthGeneral::login($this);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		//ログアウト
		TestAuthGeneral::logout($this);

		parent::tearDown();
	}

/**
 * display()アクションのGetリクエストテスト
 *
 * @return void
 */
	public function testDisplayGet() {
		//テスト実行
		$this->_testGetAction(array('action' => 'display', '1'), null, 'BadRequestException', 'view');
	}

/**
 * display()アクションのPUTリクエストテスト
 *
 * @return void
 */
	public function testPutOnSuccess() {
		//テストデータ
		$data = array(
			'BoxesPageContainer' => array(
				'box_id' => '1'
			),
			'Page' => array(
				'id' => '1'
			)
		);
		$this->_mockForReturnTrue('Boxes.BoxesPageContainer', 'updateDisplay');

		//テスト実行
		$this->_testPostAction('put', $data, array('action' => 'display'), null, 'view');

		//チェック
		$header = $this->controller->response->header();
		$pattern = '/' . Current::SETTING_MODE_WORD . '/' . Current::read('Page.permalink') . '#/box-1';
		$this->assertTextContains($pattern, $header['Location']);
	}

/**
 * display()アクションのPUTリクエストのエラーテスト
 *
 * @return void
 */
	public function testPutOnExceptionError() {
		//テストデータ
		$data = array(
			'BoxesPageContainer' => array(
				'box_id' => '1'
			),
			'Page' => array(
				'id' => '1'
			)
		);
		$this->_mockForReturnFalse('Boxes.BoxesPageContainer', 'updateDisplay');

		//テスト実行
		$this->_testPostAction('put', $data, array('action' => 'display'), 'BadRequestException', 'view');
	}

}
