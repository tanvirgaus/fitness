<?php
App::uses('AppController', 'Controller');
/**
 * Profiles Controller
 *
 * @property Profile $Profile
 * @property PaginatorComponent $Paginator
 */
class ProfilesController extends AppController {

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
		//pr($this->Profile->find()); exit;
		$this->Profile->recursive = 0;
		$this->set('profiles', $this->Paginator->paginate());
	}
	
// display user info

public function services_display(){
		//pr($this->Medical->find('all')); exit;
		//pr($this -> Auth -> user('id')); exit;
		$conditions =   array('conditions' => array('Profile.user_id' => $this -> Auth -> user('id')), 'recursive' => -1);
		$response = $this->Profile->find('first', $conditions); 
		$data = array('success' => true, 'message' => 'Profile result', 'data' => array('data' => $response));
		 $this -> set('data', $data);
	}

public function services_updateprofile()
	{
		//pr($this->request->data); exit;
		
		//pr($this->Profile->save($this->request->data)); exit;
		
	
				
			if($this->Profile->save($this->request->data)) {
				$data = array('success' => true, 'message' => 'Successfully Updated', 'data' => $this->Auth->user());
			} 
			else {
				$data = array('success' => false, 'message' => 'Can Not Update', 'data' => null);
			}
			$this->set('data',$data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
		$this->set('profile', $this->Profile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Profile->create();
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
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
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profile->save($this->request->data)) {
				$this->Session->setFlash(__('The profile has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);
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
		$this->Profile->id = $id;
		if (!$this->Profile->exists()) {
			throw new NotFoundException(__('Invalid profile'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Profile->delete()) {
			$this->Session->setFlash(__('The profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
