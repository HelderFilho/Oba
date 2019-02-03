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
 * Powered by Frame2Days
 * @return void
 */

	
	public function index() {
	    $conditions = array();
        
        if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;

            foreach($this->data['Filter'] as $name => $value){
                if($value){
                   $filter_url[$name] = urlencode(urlencode($value));
                }
            }   
            return $this->redirect($filter_url);
        }else {
            foreach($this->params['named'] as $param_name => $value){
               
                if(!in_array($param_name, array('page','sort','direction','limit'))){
                        if (strripos($param_name, '_id') === false) {
                        $conditions['User.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['User.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->User->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('User.removed' => 'N');
		$this->set('users', $this->Paginator->paginate($options));
		
				$groups = $this->User->Group->find('list',array('conditions' => array('Group.removed' => 'N','Group.active' =>'S'),'order'=>'Group.name'));
		$prefectures = $this->User->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('groups', 'prefectures'));
	}


    /**
     * index method
     * Powered by Frame2Days
     * @return void
     */
    public function logout() {
        if ( $this->Auth->logout() ) {
            $this->Session->destroy();
            return $this->redirect('/');
        }
    }


    /**
 * view method
 * Powered by Frame2Days
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
					     if ($this->User->save($this->request->data)) {
                                                                $this->Flash->success(__('user').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('user').' '.__('could not be saved. Please, try again.'));
                        			}
		}
		$groups = $this->User->Group->find('list',array('conditions' => array('Group.removed' => 'N','Group.active' =>'S'),'order'=>'Group.name'));
		$prefectures = $this->User->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('groups', 'prefectures'));
	}

/**
 * edit method
 * Powered by Frame2Days
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
                                    $this->Flash->success(__('user').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('user').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list',array('conditions' => array('Group.removed' => 'N','Group.active' =>'S'),'order'=>'Group.name'));
	//	$prefectures = $this->User->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('groups'));
		}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->User->save($data)) {
            $this->Flash->success(__('user').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('user').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

public function permissaoErro() {

	}


	
}
