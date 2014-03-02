<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		//pr($this->User->find()); exit;
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			//$this->request->data['Profile']=array('user_id'=>'xx');
			
			if ($this->User->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * registration
 *
 * @return void
 */
 
 
 	public function services_login(){
		
		$this->Auth->logout();
		
	    if ($this->request->is('get')) {
	        if ($this->Auth->login()) {
	            $sample = array('logged' => 'yes', 'token'=>'h3ohn5#3n300mjh3ndmabo9383n3h3');
				//pr($this->Auth->user());
				$data = array('success' => true, 'message' => "succesfully logged in", 'data' =>  $this->Auth->user() );
				
	        }
			else $data = array('success' => false, 'message' => "Invalid Credintial", 'data' =>  $this->Auth->user() );
	    }
		
		$this->set('data',$data);
	}
	
	
 
		public function services_register()
	{
		//pr($this->request); exit;
		
		//pr($this->User->saveAll($this->request->data)); exit;
		
		$user_name = $this->request->data['User']['username'];
		$user_password = $this->request->data['User']['password'];
		
		$username_exist = $this->User->find('first', array('conditions' => array('User.username' => $user_name)));
		
		
	//pr($username_exist); exit;
		
		
		
			//$this->User->create();
	if(!empty($user_name) && !empty($user_password)){		
		if(empty($username_exist)){					
			if($this->User->saveAll($this->request->data)) {
				$this->loadModel('Profile');
				$this->Profile->id;			
				$token = substr( "abcdefghijklmnopqrstuvwxyz", mt_rand(0, 25) , 1) .substr( md5( time() ), 1);
				$updateFiled = array('id' => $this->User->id, 'token'=>$token);
				$this->User->save($updateFiled);
				if($this->Auth->login()) $data = array('success' => true, 'message' => 'Registered', 'data' => $this->Auth->user());
			} else {
				$data = array('success' => false, 'message' => 'Can Not Register', 'data' => null);
			}
			}
		
		else{
			$data = array('success' => false, 'message' => 'Can Not Register, user name exist', 'data' => null);
		}
	}
	else $data = array('success' => false, 'message' => 'Can Not Register, user name and password require field', 'data' => null);
			
	$this->set('data',$data);
	}
	

	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        }
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
