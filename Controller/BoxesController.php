<?php
/**
 * Boxes Controller
 *
 * @property Box $Box
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesAppController', 'Boxes.Controller');

class BoxesController extends BoxesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array('Boxes.Box');

/**
 * index method
 *
 * @param string $id boxId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		$box = $this->Box->getBoxWithFrame($id);
		if (empty($box)) {
			throw new NotFoundException();
		}

		$box['Box']['Frame'] = $box['Frame'];
		$boxes = array($box['Box']['id'] => $box['Box']);

		$this->set('boxes', $boxes);
	}

}
