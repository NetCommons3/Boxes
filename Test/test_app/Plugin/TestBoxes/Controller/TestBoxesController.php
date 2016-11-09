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
class TestBoxesController extends AppController {

/**
 * render_boxes
 *
 * @return void
 */
	public function index() {
		$this->autoRender = true;
	}

}
