<?php
App::uses('AppController', 'Controller');
/**
 * ClientesPDVs Controller
 *
 * @property ClientesPDV $ClientesPDV
 * @property PaginatorComponent $Paginator
 */
class ClientesPDVsController extends AppController {

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
                        $conditions['ClientesPDV.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['ClientesPDV.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->ClientesPDV->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('ClientesPDV.removed' => 'N');
		$this->set('clientesPDVs', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientesPDV->exists($id)) {
			throw new NotFoundException(__('Invalid clientes p d v'));
		}
		$options = array('conditions' => array('ClientesPDV.' . $this->ClientesPDV->primaryKey => $id));
		$this->set('clientesPDV', $this->ClientesPDV->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientesPDV->create();
			     $Created = new DateTime($this->request->data['ClientesPDV']['Created']);
                 $this->request->data['ClientesPDV']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['ClientesPDV']['Modified']);
                 $this->request->data['ClientesPDV']['Modified'] = $Modified->format('Y-m-d H:i');
                            		     if ($this->ClientesPDV->save($this->request->data)) {
                                                                $this->Flash->success(__('clientes p d v').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('clientes p d v').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->ClientesPDV->exists($id)) {
			throw new NotFoundException(__('Invalid clientes p d v'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Created = new DateTime($this->request->data['ClientesPDV']['Created']);
                                $this->request->data['ClientesPDV']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['ClientesPDV']['Modified']);
                                $this->request->data['ClientesPDV']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->ClientesPDV->save($this->request->data)) {
                                    $this->Flash->success(__('clientes p d v').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('clientes p d v').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('ClientesPDV.' . $this->ClientesPDV->primaryKey => $id));
			$this->request->data = $this->ClientesPDV->find('first', $options);
		}
	 $Created = new DateTime($this->request->data['ClientesPDV']['Created']);
 $this->request->data['ClientesPDV']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['ClientesPDV']['Modified']);
 $this->request->data['ClientesPDV']['Modified'] = $Modified->format('d-m-Y H:i');
                            	}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClientesPDV->id = $id;
		if (!$this->ClientesPDV->exists()) {
			throw new NotFoundException(__('Invalid clientes p d v'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientesPDV->save($data)) {
            $this->Flash->success(__('clientes p d v').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('clientes p d v').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
