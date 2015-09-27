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
		'Pages.Page',
		'PluginManager.PluginsRoom',
	);

/**
 * use component
 *
 * @var array
 */
//	public $helpers = array(
//		'Pages.PageLayout',
//	);

/**
 * index method
 *
 * @param string $id boxId
 * @throws NotFoundException
 * @return void
 */
	public function index($id = null) {
		//$page = $this->Page->getPageWithFrame(Current::read('Page.permalink'));
debug($id);
		$box = $this->Box->getBoxWithFrame($id);

		if (empty($box)) {
			throw new NotFoundException();
		}
		//$box['Box']['Frame'] = $box['Frame'];
		//$boxes = array($box['Box']['id'] => $box['Box']);
		$boxes = array($box['Box']['id'] => $box);
		$this->set('boxes', $boxes);

		$container = $this->Container->findById($box['Box']['container_id']);
		$this->set('containerType', $container['Container']['type']);

		$results = array(
			//'current' => $this->controller->current,
			'containers' => Hash::combine($container['Container'], '{n}.type', '{n}'),
			'boxes' => Hash::combine($box['Box'], '{n}.id', '{n}', '{n}.container_id'),
			'plugins' => array(),
		);
		$this->helpers['Pages.PageLayout'] = $results;
	}

}
