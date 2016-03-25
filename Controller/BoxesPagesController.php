<?php
/**
 * BbsBlocks Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesAppController', 'Boxes.Controller');

/**
 * BbsBlocks Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Controller
 */
class BoxesPagesController extends BoxesAppController {

/**
 * use models
 *
 * @var array
 */
	public $uses = array(
		'Boxes.BoxesPage',
	);

/**
 * edit
 *
 * @return void
 */
	public function edit() {
		if (! $this->request->is('put')) {
			return $this->throwBadRequest();
		}

		if ($this->BoxesPage->saveBoxesPage($this->data)) {
			$this->NetCommons->setFlashNotification(
				__d('net_commons', 'Successfully saved.'), array('class' => 'success')
			);
		} else {
			$this->NetCommons->handleValidationError($this->BoxesPage->validationErrors);
		}
		$this->redirect('/' . Current::SETTING_MODE_WORD . '/' . h($this->request->data['Page']['permalink']));
	}
}
