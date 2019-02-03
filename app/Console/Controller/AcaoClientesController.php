<?php
App::uses('AppController', 'Controller');
/**
 * AcaoClientes Controller
 *
 * @property AcaoCliente $AcaoCliente
 * @property PaginatorComponent $Paginator
 */
class AcaoClientesController extends AppController {

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
                        $conditions['AcaoCliente.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['AcaoCliente.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->AcaoCliente->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('AcaoCliente.removed' => 'N');
		$this->set('acaoClientes', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AcaoCliente->exists($id)) {
			throw new NotFoundException(__('Invalid acao cliente'));
		}
		$options = array('conditions' => array('AcaoCliente.' . $this->AcaoCliente->primaryKey => $id));
		$this->set('acaoCliente', $this->AcaoCliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AcaoCliente->create();
					     if ($this->AcaoCliente->save($this->request->data)) {
                                                                $this->Flash->success(__('acao cliente').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('acao cliente').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->AcaoCliente->exists($id)) {
			throw new NotFoundException(__('Invalid acao cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
		   			if ($this->AcaoCliente->save($this->request->data)) {
                                    $this->Flash->success(__('acao cliente').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('acao cliente').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('AcaoCliente.' . $this->AcaoCliente->primaryKey => $id));
			$this->request->data = $this->AcaoCliente->find('first', $options);
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
		$this->AcaoCliente->id = $id;
		if (!$this->AcaoCliente->exists()) {
			throw new NotFoundException(__('Invalid acao cliente'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->AcaoCliente->save($data)) {
            $this->Flash->success(__('acao cliente').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('acao cliente').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
