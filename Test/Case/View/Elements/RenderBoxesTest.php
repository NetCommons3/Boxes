<?php
/**
 * View/Elements/render_boxesのテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsControllerTestCase', 'NetCommons.TestSuite');

/**
 * View/Elements/render_boxesのテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\Case\View\Elements\RenderBoxes
 */
class BoxesViewElementsRenderBoxesTest extends NetCommonsControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array();

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
		//テストコントローラ生成
		$this->generateNc('TestBoxes.TestViewElementsRenderBoxes');
	}

/**
 * View/Elements/render_boxesのテスト
 *
 * @return void
 */
	public function testRenderBoxes() {
		//テスト実行
		$this->_testGetAction('/test_boxes/test_view_elements_render_boxes/render_boxes',
				array('method' => 'assertNotEmpty'), null, 'view');

		//チェック
		$pattern = '/' . preg_quote('View/Elements/render_boxes', '/') . '/';
		$this->assertRegExp($pattern, $this->view);

		$pattern = '/<section.*?' . preg_quote('class="frame panel panel-default nc-content plugin-test-boxes">', '/') . '/';
		$this->assertRegExp($pattern, $this->view);

		$pattern = '/' . preg_quote('test_boxes/test_boxes/index', '/') . '/';
		$this->assertRegExp($pattern, $this->view);
	}

}
