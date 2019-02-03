<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
CakePlugin::load('Upload');
App::import('Controller', 'AcaoSupervisorLocals');
App::import('Controller', 'AcaoClientes');

/**
 * Acaos Controller
 *
 * @property Acao $Acao
 * @property PaginatorComponent $Paginator
 */
class AcaosController extends AppController {
public $components = array('Upload','Paginator');
  public $uses = array();





/**
 * Components
 *
 * @var array
 */
//	public $components = array('Paginator');

/**
 * index method
 * Powered by Frame2Days
 * @return void
 */

public function ApagarFoto($id, $foto){
  unlink(WWW_ROOT . '/img/uploads' . DS . $id . DS. $foto);
      return $this->redirect(array('action' => 'view', $id));

}



public function AcaoPorTempo($inicio){
  $user = AuthComponent::user();
    
            return $this->Acao->find('all',array('conditions'=>array('Acao.removed'=>'N','Acao.empresa'=>$user['empresa'], 'Acao.Inicio >'=>$inicio )));

}

  public function AcaoPorId($id){
      $user = AuthComponent::user();
            return $this->Acao->find('first',array('conditions'=>array('Acao.removed'=>'N','Acao.empresa'=>$user['empresa'], 'Acao.Id'=>$id )));

  }
  public function todos(){
      $user = AuthComponent::user();
            return $this->Acao->find('all',array('conditions'=>array('Acao.removed'=>'N','Acao.empresa'=>$user['empresa'] )));

  }   

  public function todosAndamento(){
      $user = AuthComponent::user();
            return $this->Acao->find('all',array('conditions'=>array('Acao.removed'=>'N','Acao.empresa'=>$user['empresa'], 'Acao.Encerrado'=>'N' )));

  }   

  public function nomesAcoes(){
  return  $this->Acao->find('list', array(
        'fields' => array('Acao.Id',"Acao.Nome"),
        'conditions' =>array('Acao.removed'=>'N')
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
    $user = AuthComponent::user();
   	$options = array('Acao.removed' => 'N', 'Acao.empresa'=>$user['empresa']);
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
  App::uses('Sanitize', 'Utility');
$AcaoSupervisorLocal = new AcaoSupervisorLocalsController();
$AcaoCliente = new AcaoClientesController();

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
    
      $imagem = $this->request->data['Acao']['Fotos1'];
      $tempoInicio =strtotime($this->request->data['Acao']['Inicio']);
      $tempoTermino = strtotime($this->request->data['Acao']['Termino']);
         if ($tempoTermino - $tempoInicio<7200||empty($this->request->data['Acao']['Nome'])){
             $this->Flash->error('A duração da ação não pode ser menor que 2 (duas) horas e o campo Nome deve ser preenchido');
         }else{
              if ($this->Acao->save($this->request->data)) {
              $qtdLocais = intval($this->request->data['Acao']['QuantidadeLocais']);
              $qtdClientes = intval($this->request->data['Acao']['QuantidadeClientes']);
                                             
                     $Acao = $this->Acao->getLastInsertID();

                        for ($i = 1; $i<=$qtdLocais; $i++ ){
                          $Supervisor = $this->request->data['supervisor'.$i];
                          $Local = $this->request->data['local'.$i];
                        $AcaoSupervisorLocal->salvar($Acao, $Supervisor, $Local);
                        }

                        for ($j = 1; $j<=$qtdClientes; $j++){
                            $Cliente = $this->request->data['cliente'.$j];
                            $Setor = $this->request->data['setorCliente'.$j];
                            $AcaoCliente->salvar($Acao, $Cliente, $Setor);
                        }

               $directory = new Folder( WWW_ROOT . 'img' . DS . 'uploads' . DS . $Acao, true);
               $supervisores = $this->requestAction('/AcaoSupervisorLocals/retornaSupervisores/'.$Acao);
              
               foreach ($supervisores as $supervisor) {
                $IdUser = $this->requestAction('/Funcionarios/retornaIdUsuario/'.$supervisor['AcaoSupervisorLocal']['IdSupervisor']);
               if(!empty($IdUser)){
                $token=$this->requestAction(array('admin'=>true, 'controller'=>'Users', 'action'=>'retornaToken/' . $IdUser['Funcionario']['IdUser']));
                                $this->sendMessage($Acao, $this->request->data, $token['User']['token']);
          }

                                
               }

      return $this->redirect(array('action' => 'index'));
   } else {
                                        $this->Flash->error(__('acao').' '.__('could not be saved. Please, try again.'));
                              }

  }
  }

	}


  public function sendMessage($id, $acao, $token) {
      # code...
    
    $content      = array(
      "en"=>"A ação "."{$acao['Acao']['Nome']}"." foi cadastrada para você",
        "pt" => "A ação "."{$acao['Acao']['Nome']}"." foi cadastrada para você"
    );
     $fields = array(
        'app_id' => "e53e0d95-7979-4400-9a47-5dd613218d18",
          'include_player_ids' => array($token),
        'data' => array(
            "id"=> $id,
            "foo" => "bar"
        ),
        'contents' => $content,
       );
    
    $fields = json_encode($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic N2M4YTgwOWYtYTA2NS00ODQ3LTgyNDktMGMzNjlkZDk3MmFj'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

public function encerrar($id = null){
  $AcaoCliente = new AcaoClientesController();
  $AcaoSupervisorLocal = new AcaoSupervisorLocalsController();
  $this->Acao->id = $id;
  $this->Acao->set(array('Id'=>$id, 'Encerrado'=>'S'));
    $AcaoCliente->encerrar($id);
    $AcaoSupervisorLocal->encerrar($id);

    if (!$this->Acao->exists()) {
      throw new NotFoundException(__('Invalid acao'));
    }
    $data = array('id' => $id, 'encerrado' => 'S');
    $this->request->allowMethod('post', 'delete');
    if ($this->Acao->save($data)) {
            $this->Flash->success(__('acao').' '.__('has been finished.'));
    } else {
            $this->Flash->error(__('acao').' '.__('could not be finished. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}


public function upload(){
    if (!empty($this->request->data)){
      $this->Upload->upload($this->request->data['Arquivo']['uploadfile']);
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
		App::uses('Sanitize', 'Utility');

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
        $this->Upload->upload($this->request->data['Acao']['Videos1'],$this->request->data['Acao']['Nome'] );
        $this->Upload->upload($this->request->data['Acao']['Fotos1'],$this->request->data['Acao']['Nome'] );
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
      $this->Acao->set(array('Id'=>$id, 'Removed'=>'S'));

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
