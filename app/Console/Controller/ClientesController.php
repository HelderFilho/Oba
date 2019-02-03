<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

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
                        $conditions['Cliente.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Cliente.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->Cliente->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Cliente.removed' => 'N');
		$this->set('clientes', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			     $Created = new DateTime($this->request->data['Cliente']['Created']);
                 $this->request->data['Cliente']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['Cliente']['Modified']);
                 $this->request->data['Cliente']['Modified'] = $Modified->format('Y-m-d H:i');
                            		     if ($this->Cliente->save($this->request->data)) {
                                                                $this->Flash->success(__('cliente').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('cliente').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Created = new DateTime($this->request->data['Cliente']['Created']);
                                $this->request->data['Cliente']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['Cliente']['Modified']);
                                $this->request->data['Cliente']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->Cliente->save($this->request->data)) {
                                    $this->Flash->success(__('cliente').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('cliente').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
		}
	 $Created = new DateTime($this->request->data['Cliente']['Created']);
 $this->request->data['Cliente']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['Cliente']['Modified']);
 $this->request->data['Cliente']['Modified'] = $Modified->format('d-m-Y H:i');
                            	}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Cliente->save($data)) {
            $this->Flash->success(__('cliente').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('cliente').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
