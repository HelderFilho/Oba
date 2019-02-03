<?php
App::uses('AppController', 'Controller');
/**
 * Revisors Controller
 *
 * @property Revisor $Revisor
 * @property PaginatorComponent $Paginator
 */
class RevisorsController extends AppController {

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
    public function retornaRevisores(){
        $user = AuthComponent::user();
        return $this->Revisor->find('list', array(
            'fields'=>array('Revisor.Nome', 'Revisor.Nome'),
            'conditions'=>array('Revisor.removed'=>'N','OR'=>array(
                array('Revisor.empresa'=>$user['empresa']), 
                array('Revisor.empresa'=>'Ambas')))
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
                        $conditions['Revisor.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Revisor.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->Revisor->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
            $user = AuthComponent::user();

		$options = array('Revisor.removed' => 'N', 'OR'=>array(
            array('Revisor.empresa'=>$user['empresa']),
            array('Revisor.empresa'=>'Ambas')));
		$this->set('revisors', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Revisor->exists($id)) {
			throw new NotFoundException(__('Invalid revisor'));
		}
		$options = array('conditions' => array('Revisor.' . $this->Revisor->primaryKey => $id));
		$this->set('revisor', $this->Revisor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Revisor->create();
			     $Data_Nascimento = new DateTime($this->request->data['Revisor']['Data_Nascimento']);
                 $this->request->data['Revisor']['Data_Nascimento'] = $Data_Nascimento->format('Y-m-d H:i');
                                 $Created = new DateTime($this->request->data['Revisor']['Created']);
                 $this->request->data['Revisor']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['Revisor']['Modified']);
                 $this->request->data['Revisor']['Modified'] = $Modified->format('Y-m-d H:i');
                            		     if ($this->Revisor->save($this->request->data)) {
                                                                $this->Flash->success(__('revisor').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('revisor').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->Revisor->exists($id)) {
			throw new NotFoundException(__('Invalid revisor'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Data_Nascimento = new DateTime($this->request->data['Revisor']['Data_Nascimento']);
                                $this->request->data['Revisor']['Data_Nascimento'] = $Data_Nascimento->format('Y-m-d H:i');
                                                            $Created = new DateTime($this->request->data['Revisor']['Created']);
                                $this->request->data['Revisor']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['Revisor']['Modified']);
                                $this->request->data['Revisor']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->Revisor->save($this->request->data)) {
                                    $this->Flash->success(__('revisor').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('revisor').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('Revisor.' . $this->Revisor->primaryKey => $id));
			$this->request->data = $this->Revisor->find('first', $options);
		}
	 $Data_Nascimento = new DateTime($this->request->data['Revisor']['Data_Nascimento']);
 $this->request->data['Revisor']['Data_Nascimento'] = $Data_Nascimento->format('d-m-Y H:i');
                             $Created = new DateTime($this->request->data['Revisor']['Created']);
 $this->request->data['Revisor']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['Revisor']['Modified']);
 $this->request->data['Revisor']['Modified'] = $Modified->format('d-m-Y H:i');
                            	}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Revisor->id = $id;
		if (!$this->Revisor->exists()) {
			throw new NotFoundException(__('Invalid revisor'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Revisor->save($data)) {
            $this->Flash->success(__('revisor').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('revisor').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
