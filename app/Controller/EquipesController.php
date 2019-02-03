<?php
App::uses('AppController', 'Controller');
App::import('Controller','Funcionario');

/**
 * Equipes Controller
 *
 * @property Equipe $Equipe
 * @property PaginatorComponent $Paginator
 */
class EquipesController extends AppController {

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

	public function nomes(){
		$user = AuthComponent::user();	
	return	$this->Equipe->find('list', array(
	
        'fields' => array('Equipe.Nome',"Equipe.Nome"),
       'conditions'=>array('Equipe.Removed'=>'N','OR'=>array('Equipe.empresa'=>$user['empresa'], 'Equipe.empresa'=>'Ambas'))
    ));
	}

public function TrocarEmpresa(){
	if (AuthComponent::user('empresa')=='Oba'){
		$this->Session->write('Auth.User.empresa', 'Top');
		$this->Session->write('Auth.User.image', 'TopLogo.png');
	} else {
		$this->Session->write('Auth.User.empresa','Oba');
				$this->Session->write('Auth.User.image', 'ObaLogo.png');

	}
}

public function teste(){
               return $this->redirect(array(
                        'plugin' => false, 'admin' => false, 'controller' => 'pages',
                        'action' => 'display'));

}

	public function EquipesFuncionario (){
		$fun = $this->requestAction(array('controller'=>'Funcionario', 'action'=>'todosFuncionarios'));
		return $fun;
		
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
                        $conditions['Equipe.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Equipe.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
	    
		$this->Equipe->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
 $user = AuthComponent::user();
   	$options = array('Equipe.removed' => 'N', 'OR'=>array(
   		array('Equipe.empresa'=>$user['empresa']), 
   		array('Equipe.empresa'=>'Ambas')));
			$this->set('equipes', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Equipe->exists($id)) {
			throw new NotFoundException(__('Invalid equipe'));
		}
		$options = array('conditions' => array('Equipe.' . $this->Equipe->primaryKey => $id));
		$this->set('equipe', $this->Equipe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipe->create();
			     $Created = new DateTime($this->request->data['Equipe']['Created']);
                 $this->request->data['Equipe']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['Equipe']['Modified']);
                 $this->request->data['Equipe']['Modified'] = $Modified->format('Y-m-d H:i');
                            		     if ($this->Equipe->save($this->request->data)) {
                                            // $this->Flash->success(__('equipe').' '.__('has been saved.'));
                            		     $id = $this->Equipe->getLastInsertID();

                                 $this->Flash->success(__($id).' '.__('has been saved.'));
                                                                      return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('equipe').' '.__('could not be saved. Please, try again.'));
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
		if (!$this->Equipe->exists($id)) {
			throw new NotFoundException(__('Invalid equipe'));
		}
		if ($this->request->is(array('post', 'put'))) {
		                                   $Created = new DateTime($this->request->data['Equipe']['Created']);
                                $this->request->data['Equipe']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['Equipe']['Modified']);
                                $this->request->data['Equipe']['Modified'] = $Modified->format('Y-m-d H:i');
                            			if ($this->Equipe->save($this->request->data)) {
                                    $this->Flash->success(__('equipe').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('equipe').' '.__('could not be edited. Please, try again.'));
                			}
		} else {
			$options = array('conditions' => array('Equipe.' . $this->Equipe->primaryKey => $id));
			$this->request->data = $this->Equipe->find('first', $options);
		}
	 $Created = new DateTime($this->request->data['Equipe']['Created']);
 $this->request->data['Equipe']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['Equipe']['Modified']);
 $this->request->data['Equipe']['Modified'] = $Modified->format('d-m-Y H:i');
                            	}

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Equipe->id = $id;
		$this->Equipe->set(array('Id'=>$id, 'Removed'=>'S'));

		if (!$this->Equipe->exists()) {
			throw new NotFoundException(__('Invalid equipe'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Equipe->save($data)) {
            $this->Flash->success(__('equipe').' '.__('has been deleted.'));
		} else {
            $this->Flash->error(__('equipe').' '.__('could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}









