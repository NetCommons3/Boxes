<?php
/**
 * TestBoxes Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');

/**
 * TestBoxes Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\test_app\Plugin\Boxes\Controller
 */
class TestBoxesController extends AppController {

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
		$box['Box']['BoxesPage'] = $box['Page'][0]['BoxesPage'];
		$boxes[$box['Box']['id']] = $box['Box'];

		$this->set('boxes', $boxes);

		$container = $this->Container->findById($box['Box']['container_id']);
		$this->set('containerType', $container['Container']['type']);

		$this->set('page', Hash::merge($box, $container));
		$this->set('modal', null);

		$this->helpers[] = 'Pages.PageLayout';
	}

}
