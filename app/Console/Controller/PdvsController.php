<?php
App::uses('AppController', 'Controller');
/**
 * Pdvs Controller
 *
 * @property Pdv $Pdv
 * @property PaginatorComponent $Paginator
 */
class PdvsController extends AppController {

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
                        $conditions['Pdv.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Pdv.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->Pdv->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Pdv.removed' => 'N');
		$this->set('pdvs', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pdv->exists($id)) {
			throw new NotFoundException(__('Invalid pdv'));
		}
		$options = array('conditions' => array('Pdv.' . $this->Pdv->primaryKey => $id));
		$this->set('pdv', $this->Pdv->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pdv->create();
					     if ($this->Pdv->save($this->request->data)) {
                                                                $this->Flash->success(__('pdv').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('pdv').' '.__('could not be saved. Please, try again.'));
                        			}
		}
	}

/**
 * edit method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pdv->exists($id)) {
			throw new NotFoundException(__('Invalid pdv'));
		}
		if ($this->request->is(array('post', 'put'))) {
		   			if ($this->Pdv->save($this->request->data)) {
                                    $this->Flash->success(__('pdv').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('pdv').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('Pdv.' . $this->Pdv->primaryKey => $id));
			$this->request->data = $this->Pdv->find('first', $options);
		}
		}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pdv->id = $id;
		if (!$this->Pdv->exists()) {
			throw new NotFoundException(__('Invalid pdv'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Pdv->save($data)) {
            $this->Flash->success(__('pdv').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('pdv').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
