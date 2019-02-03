<?php
App::uses('AppController', 'Controller');
/**
 * Acaos Controller
 *
 * @property Acao $Acao
 * @property PaginatorComponent $Paginator
 */
class AcaosController extends AppController {

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
                        $conditions['Acao.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Acao.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->Acao->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Acao.removed' => 'N');
		$this->set('acaos', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Acao->exists($id)) {
			throw new NotFoundException(__('Invalid acao'));
		}
		$options = array('conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
		$this->set('acao', $this->Acao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Acao->create();
			     $Inicio = new DateTime($this->request->data['Acao']['Inicio']);
                 $this->request->data['Acao']['Inicio'] = $Inicio->format('Y-m-d H:i');
                                 $Termino = new DateTime($this->request->data['Acao']['Termino']);
                 $this->request->data['Acao']['Termino'] = $Termino->format('Y-m-d H:i');
                                 $Created = new DateTime($this->request->data['Acao']['Created']);
                 $this->request->data['Acao']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['Acao']['Modified']);
                 $this->request->data['Acao']['Modified'] = $Modified->format('Y-m-d H:i');
                            		     if ($this->Acao->save($this->request->data)) {
                                                                $this->Flash->success(__('acao').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('acao').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->Acao->exists($id)) {
			throw new NotFoundException(__('Invalid acao'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Inicio = new DateTime($this->request->data['Acao']['Inicio']);
                                $this->request->data['Acao']['Inicio'] = $Inicio->format('Y-m-d H:i');
                                                            $Termino = new DateTime($this->request->data['Acao']['Termino']);
                                $this->request->data['Acao']['Termino'] = $Termino->format('Y-m-d H:i');
                                                            $Created = new DateTime($this->request->data['Acao']['Created']);
                                $this->request->data['Acao']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['Acao']['Modified']);
                                $this->request->data['Acao']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->Acao->save($this->request->data)) {
                                    $this->Flash->success(__('acao').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('acao').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('Acao.' . $this->Acao->primaryKey => $id));
			$this->request->data = $this->Acao->find('first', $options);
		}
	 $Inicio = new DateTime($this->request->data['Acao']['Inicio']);
 $this->request->data['Acao']['Inicio'] = $Inicio->format('d-m-Y H:i');
                             $Termino = new DateTime($this->request->data['Acao']['Termino']);
 $this->request->data['Acao']['Termino'] = $Termino->format('d-m-Y H:i');
                             $Created = new DateTime($this->request->data['Acao']['Created']);
 $this->request->data['Acao']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['Acao']['Modified']);
 $this->request->data['Acao']['Modified'] = $Modified->format('d-m-Y H:i');
                            	}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Acao->id = $id;
		if (!$this->Acao->exists()) {
			throw new NotFoundException(__('Invalid acao'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Acao->save($data)) {
            $this->Flash->success(__('acao').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('acao').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
