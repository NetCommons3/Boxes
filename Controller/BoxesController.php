<?php
/**
 * Boxes Controller
 *
 * @property Box $Box
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('BoxesAppController', 'Boxes.Controller');

/**
 * Summary for Boxes Controller
 */
class BoxesController extends BoxesAppController {

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'Boxes.Box',
		'Containers.Container',
	);

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'Pages.PageLayout',
	);

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
		$boxes = $this->camelizeKeyRecursive($boxes);
		$this->set('boxes', $boxes);

		$container = $this->Container->findById($box['Box']['container_id']);
		$this->set('containerType', $container['Container']['type']);
	}

}
