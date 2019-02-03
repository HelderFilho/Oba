<?php
App::uses('AppController', 'Controller');
/**
 * AcceptTerms Controller
 *
 * @property AcceptTerm $AcceptTerm
 * @property PaginatorComponent $Paginator
 */
class AcceptTermsController extends AppController {

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
                        $conditions['AcceptTerm.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['AcceptTerm.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->AcceptTerm->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('AcceptTerm.removed' => 'N');
		$this->set('acceptTerms', $this->Paginator->paginate($options));
		
				$prefectures = $this->AcceptTerm->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('prefectures'));
	}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AcceptTerm->exists($id)) {
			throw new NotFoundException(__('Invalid accept term'));
		}
		$options = array('conditions' => array('AcceptTerm.' . $this->AcceptTerm->primaryKey => $id));
		$this->set('acceptTerm', $this->AcceptTerm->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AcceptTerm->create();
					     if ($this->AcceptTerm->save($this->request->data)) {
                                                                $this->Flash->success(__('accept term').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('accept term').' '.__('could not be saved. Please, try again.'));
                        			}
		}
		$prefectures = $this->AcceptTerm->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('prefectures'));
	}

/**
 * edit method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AcceptTerm->exists($id)) {
			throw new NotFoundException(__('Invalid accept term'));
		}
		if ($this->request->is(array('post', 'put'))) {
		   			if ($this->AcceptTerm->save($this->request->data)) {
                                    $this->Flash->success(__('accept term').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('accept term').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('AcceptTerm.' . $this->AcceptTerm->primaryKey => $id));
			$this->request->data = $this->AcceptTerm->find('first', $options);
		}
		$prefectures = $this->AcceptTerm->Prefecture->find('list',array('conditions' => array('Prefecture.removed' => 'N','Prefecture.active' =>'S'),'order'=>'Prefecture.name'));
		$this->set(compact('prefectures'));
		}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AcceptTerm->id = $id;
		if (!$this->AcceptTerm->exists()) {
			throw new NotFoundException(__('Invalid accept term'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->AcceptTerm->save($data)) {
            $this->Flash->success(__('accept term').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('accept term').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
