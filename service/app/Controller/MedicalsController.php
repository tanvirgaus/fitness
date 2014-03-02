<?php
App::uses('AppController', 'Controller');
/**
 * Medicals Controller
 *
 * @property Medical $Medical
 * @property PaginatorComponent $Paginator
 */
class MedicalsController extends AppController {

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
		$this->Medical->recursive = 0;
		$this->set('medicals', $this->Paginator->paginate());
	}
	
	public function services_display(){
		//pr($this->Medical->find('all')); exit;
		$response = $this->Medical->find('all', array('fields'=>array('name'))); 
		$data = array('success' => true, 'message' => 'Medical List result', 'data' => array('data' => $response));
		 $this -> set('data', $data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medical->exists($id)) {
			throw new NotFoundException(__('Invalid medical'));
		}
		$options = array('conditions' => array('Medical.' . $this->Medical->primaryKey => $id));
		$this->set('medical', $this->Medical->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medical->create();
			if ($this->Medical->save($this->request->data)) {
				$this->Session->setFlash(__('The medical has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medical could not be saved. Please, try again.'));
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
		if (!$this->Medical->exists($id)) {
			throw new NotFoundException(__('Invalid medical'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medical->save($this->request->data)) {
				$this->Session->setFlash(__('The medical has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medical could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medical.' . $this->Medical->primaryKey => $id));
			$this->request->data = $this->Medical->find('first', $options);
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
		$this->Medical->id = $id;
		if (!$this->Medical->exists()) {
			throw new NotFoundException(__('Invalid medical'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Medical->delete()) {
			$this->Session->setFlash(__('The medical has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medical could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
