<?php
App::uses('AppController', 'Controller');

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
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

	public function nomesClientes(){
	 $user = AuthComponent::user();
	return	$this->ClientesPDV->find('list', array(
        'fields' => array('ClientesPDV.Nome_Fantasia',"ClientesPDV.Nome_Fantasia"),
        'conditions' =>array('ClientesPDV.removed'=>'N', 'ClientesPDV.empresa'=>$user['empresa'])
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
 $user = AuthComponent::user();
   	$options = array('ClientesPDV.removed' => 'N', 'ClientesPDV.empresa'=>$user['empresa']);
			$this->set('ClientesPDV', $this->Paginator->paginate($options));
		
	
	

			}



	public function todos(){
	 $user = AuthComponent::user();
        return $this->ClientesPDV->find('all',array('ClientesPDV.removed' => 'N', 'ClientesPDV.empresa'=>$user['empresa']));

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
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('ClientesPDV.' . $this->ClientesPDV->primaryKey => $id));
		$this->set('ClientesPDV', $this->ClientesPDV->find('first', $options));
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
		if (!$this->ClientesPDV->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Created = new DateTime($this->request->data['ClientesPDV']['Created']);
                                $this->request->data['ClientesPDV']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['ClientesPDV']['Modified']);
                                $this->request->data['ClientesPDV']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->ClientesPDV->save($this->request->data)) {
                                    $this->Flash->success(__('cliente').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('cliente').' '.__('could not be edited. Please, try again.'));
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
		$this->ClientesPDV->set(array('Id'=>$id, 'Removed'=>'S'));

		if (!$this->ClientesPDV->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientesPDV->save($data)) {
            $this->Flash->success(__('cliente').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('cliente').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
