<?php
App::uses('AppController', 'Controller');
/**
 * MedicalsUsers Controller
 *
 * @property MedicalsUser $MedicalsUser
 * @property PaginatorComponent $Paginator
 */
class MedicalsUsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MedicalsUser->recursive = 0;
		$this->set('medicalsUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MedicalsUser->exists($id)) {
			throw new NotFoundException(__('Invalid medicals user'));
		}
		$options = array('conditions' => array('MedicalsUser.' . $this->MedicalsUser->primaryKey => $id));
		$this->set('medicalsUser', $this->MedicalsUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MedicalsUser->create();
			if ($this->MedicalsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The medicals user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medicals user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MedicalsUser->exists($id)) {
			throw new NotFoundException(__('Invalid medicals user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MedicalsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The medicals user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medicals user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MedicalsUser.' . $this->MedicalsUser->primaryKey => $id));
			$this->request->data = $this->MedicalsUser->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MedicalsUser->id = $id;
		if (!$this->MedicalsUser->exists()) {
			throw new NotFoundException(__('Invalid medicals user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MedicalsUser->delete()) {
			$this->Session->setFlash(__('The medicals user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medicals user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
