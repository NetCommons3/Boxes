<?php
/**
 * BbsArticles Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesAppController', 'Boxes.Controller');

/**
 * Boxes Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Bbses\Controller
 */
class BoxesController extends BoxesAppController {

/**
 * use models
 *
 * @var array
 */
	public $uses = array(
		'Boxes.BoxesPageContainer',
	);

/**
 * 表示・非表示の切り替え
 *
 * @return void
 */
	public function display() {
		if (! $this->request->is('put')) {
			return $this->throwBadRequest();
		}

		if (! $this->BoxesPageContainer->updateDisplay($this->data)) {
			return $this->throwBadRequest();
		}

		$this->NetCommons->setFlashNotification(
			__d('net_commons', 'Successfully saved.'), array('class' => 'success')
		);
		$this->redirect(
			NetCommonsUrl::backToPageUrl(true) .
			'#/box-' . Hash::get($this->data, 'BoxesPageContainer.box_id')
		);
	}

}
