<?php
/**
 * TestBoxes Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesAppController', 'Boxes.Controller');

/**
 * TestBoxes Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\test_app\Plugin\Boxes\Controller
 */
class TestBoxesController extends BoxesAppController {

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
 * index method
 *
 * @param string $id boxId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		Current::$current['Language']['id'] = '2';

		$box = $this->Box->getBoxWithFrame($id);

		$box['Box']['Frame'] = $box['Frame'];
		$boxes = array($box['Box']['id'] => $box['Box']);
		$this->set('boxes', $boxes);

		$container = $this->Container->findById($box['Box']['container_id']);
		$this->set('containerType', $container['Container']['type']);

		$results = array(
			'containers' => Hash::combine($container['Container'], '{n}.type', '{n}'),
			'boxes' => Hash::combine($box['Box'], '{n}.id', '{n}', '{n}.container_id'),
			'plugins' => array(),
		);
		$this->helpers['Pages.PageLayout'] = $results;
	}

}
