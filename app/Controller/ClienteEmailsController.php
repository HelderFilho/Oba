<?php
App::uses('AppController', 'Controller');
/**
 * ClienteEmails Controller
 *
 * @property ClienteEmail $ClienteEmail
 * @property PaginatorComponent $Paginator
 */
class ClienteEmailsController extends AppController {

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

public function salvar($idCliente, $email){
		$this->ClienteEmail->create();
		$this->request->data['ClienteEmail']['IdCliente'] = $idCliente;
		$this->request->data['ClienteEmail']['Email'] = $email;
		$this->ClienteEmail->save($this->request->data);
	}

	public function retornaClientes($idCliente){
		return $this->ClienteEmail->find('all', array(
			'fields'=>array('DISTINCT ClienteEmail.Email'),
			'conditions'=>array('ClienteEmail.IdCliente' => $idCliente)
				));
	}








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
                        $conditions['ClienteEmail.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['ClienteEmail.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->ClienteEmail->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('ClienteEmail.removed' => 'N');
		$this->set('clienteEmails', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClienteEmail->exists($id)) {
			throw new NotFoundException(__('Invalid cliente email'));
		}
		$options = array('conditions' => array('ClienteEmail.' . $this->ClienteEmail->primaryKey => $id));
		$this->set('clienteEmail', $this->ClienteEmail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClienteEmail->create();
					     if ($this->ClienteEmail->save($this->request->data)) {
                                                                $this->Flash->success(__('cliente email').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('cliente email').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->ClienteEmail->exists($id)) {
			throw new NotFoundException(__('Invalid cliente email'));
		}
		if ($this->request->is(array('post', 'put'))) {
		   			if ($this->ClienteEmail->save($this->request->data)) {
                                    $this->Flash->success(__('cliente email').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('cliente email').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('ClienteEmail.' . $this->ClienteEmail->primaryKey => $id));
			$this->request->data = $this->ClienteEmail->find('first', $options);
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
		$this->ClienteEmail->id = $id;
		if (!$this->ClienteEmail->exists()) {
			throw new NotFoundException(__('Invalid cliente email'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->ClienteEmail->save($data)) {
            $this->Flash->success(__('cliente email').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('cliente email').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
