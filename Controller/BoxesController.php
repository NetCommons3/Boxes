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
 * index method
 *
 * @throws NotFoundException
 * @param string $id boxId
 * @return void
 */
	public function index($id = null) {
		$box = $this->Box->findById($id);
		if (empty($box)) {
			throw new NotFoundException();
		}

		$this->set('box', $box);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Box->exists($id)) {
			throw new NotFoundException(__('Invalid box'));
		}
		$options = array('conditions' => array('Box.' . $this->Box->primaryKey => $id));
		$this->set('box', $this->Box->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Box->create();
			if ($this->Box->save($this->request->data)) {
				return $this->flash(__('The box has been saved.'), array('action' => 'index'));
			}
		}
		$containers = $this->Box->Container->find('list');
		$spaces = $this->Box->Space->find('list');
		$rooms = $this->Box->Room->find('list');
		$pages = $this->Box->Page->find('list');
		$pages = $this->Box->Page->find('list');
		$this->set(compact('containers', 'spaces', 'rooms', 'pages', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Box->exists($id)) {
			throw new NotFoundException(__('Invalid box'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Box->save($this->request->data)) {
				return $this->flash(__('The box has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Box.' . $this->Box->primaryKey => $id));
			$this->request->data = $this->Box->find('first', $options);
		}
		$containers = $this->Box->Container->find('list');
		$spaces = $this->Box->Space->find('list');
		$rooms = $this->Box->Room->find('list');
		$pages = $this->Box->Page->find('list');
		$pages = $this->Box->Page->find('list');
		$this->set(compact('containers', 'spaces', 'rooms', 'pages', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Box->id = $id;
		if (!$this->Box->exists()) {
			throw new NotFoundException(__('Invalid box'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Box->delete()) {
			return $this->flash(__('The box has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The box could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
