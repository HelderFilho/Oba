<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
CakePlugin::load('Upload');

/**
 * Acaos Controller
 *
 * @property Acao $Acao
 * @property PaginatorComponent $Paginator
 */
class AcaoPDVsController extends AppController {
public $components = array('Upload','Paginator');
  public $uses = array();


/**
 * Components
 *
 * @var array
 */
//  public $components = array('Paginator');

/**
 * index method
 * Powered by Frame2Days
 * @return void
 */


  public function todos(){
$user = AuthComponent::user();
            return $this->AcaoPDV->find('all', array('AcaoPDV.removed'=>'N','AcaoPDV.empresa'=>$user['empresa'] ));

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
                        $conditions['AcaoPDV.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['AcaoPDV.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
        
        $this->AcaoPDV->recursive = 0;
        $this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
    $user = AuthComponent::user();
    $options = array('AcaoPDV.removed' => 'N', 'AcaoPDV.empresa'=>$user['empresa']);
        $this->set('acaosPDV', $this->Paginator->paginate($options));
        
            }

/**
 * view method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->AcaoPDV->exists($id)) {
            throw new NotFoundException(__('Invalid acao'));
        }
        $options = array('conditions' => array('AcaoPDV.' . $this->AcaoPDV->primaryKey => $id));
        $this->set('acao', $this->AcaoPDV->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
App::uses('Sanitize', 'Utility');

        if ($this->request->is('post')) {

            $this->AcaoPDV->create();
                 $Inicio = new DateTime($this->request->data['AcaoPDV']['Inicio']);
                 $this->request->data['AcaoPDV']['Inicio'] = $Inicio->format('Y-m-d H:i');
                                 $Termino = new DateTime($this->request->data['AcaoPDV']['Termino']);
                 $this->request->data['AcaoPDV']['Termino'] = $Termino->format('Y-m-d H:i');
                                 $Created = new DateTime($this->request->data['AcaoPDV']['Created']);
                 $this->request->data['AcaoPDV']['Created'] = $Created->format('Y-m-d H:i');
                                 $Modified = new DateTime($this->request->data['AcaoPDV']['Modified']);
                 $this->request->data['AcaoPDV']['Modified'] = $Modified->format('Y-m-d H:i');
                  $imagem = $this->request->data['AcaoPDV']['Fotos1'];

$tempoInicio =strtotime($this->request->data['AcaoPDV']['Inicio']);
$tempoTermino = strtotime($this->request->data['AcaoPDV']['Termino']);
  if ($tempoTermino - $tempoInicio<7200){
    $this->Flash->error('A duração da ação não pode ser menor que 2 (duas) horas');
 }else{

                   //   $this->request->data['Acao']['Fotos'] = $imagem['name'];
                                     if ($this->AcaoPDV->save($this->request->data)) {                           
//$dir = new Folder(WWW_ROOT . $this->request->data['Acao']['Nome'], true);
//$file = new File ($dir->path. '/' . $this->request->data['Acao']['Fotos']);      
      $this->Upload->upload($this->request->data['AcaoPDV']['Videos1'],$this->request->data['AcaoPDV']['Nome'] );
      $this->Upload->upload($this->request->data['AcaoPDV']['Fotos1'],$this->request->data['AcaoPDV']['Nome'] );
      //     $this->Flash->success(__('acao').' '.__('has been saved.'));
                                        return $this->redirect(array('action' => 'index'));
                                    } else {
                                        $this->Flash->error(__('acao').' '.__('could not be saved. Please, try again.'));
                              }

  }
  }
    }

public function encerrar($id = null){
  $this->AcaoPDV->id = $id;
  $this->AcaoPDV->set(array('Id'=>$id, 'Removed'=>'S'));

    if (!$this->AcaoPDV->exists()) {
      throw new NotFoundException(__('Invalid acao'));
    }
    $data = array('id' => $id, 'removed' => 'S');
    $this->request->allowMethod('post', 'delete');
    if ($this->AcaoPDV->save($data)) {
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
        if (!$this->AcaoPDV->exists($id)) {
            throw new NotFoundException(__('Invalid acao'));
        }
        if ($this->request->is(array('post', 'put'))) {
                                           $Inicio = new DateTime($this->request->data['Acao']['Inicio']);
                                $this->request->data['AcaoPDV']['Inicio'] = $Inicio->format('Y-m-d H:i');
                                                            $Termino = new DateTime($this->request->data['AcaoPDV']['Termino']);
                                $this->request->data['AcaoPDV']['Termino'] = $Termino->format('Y-m-d H:i');
                                                            $Created = new DateTime($this->request->data['AcaoPDV']['Created']);
                                $this->request->data['AcaoPDV']['Created'] = $Created->format('Y-m-d H:i');
                                                            $Modified = new DateTime($this->request->data['AcaoPDV']['Modified']);
                                $this->request->data['AcaoPDV']['Modified'] = $Modified->format('Y-m-d H:i');
                                        if ($this->AcaoPDV->save($this->request->data)) {
                                       $this->Upload->upload($this->request->data['Acao']['Videos1'],$this->request->data['Acao']['Nome'] );
        $this->Upload->upload($this->request->data['Acao']['Fotos1'],$this->request->data['Acao']['Nome'] );
   
                                    $this->Flash->success(__('acao').' '.__('has been edited.'));
                    return $this->redirect(array('action' => 'index'));
                    } else {
                    $this->Flash->error(__('acao').' '.__('could not be edited. Please, try again.'));
                            }
        } else {
            $options = array('conditions' => array('AcaoPDV.' . $this->AcaoPDV->primaryKey => $id));
            $this->request->data = $this->AcaoPDV->find('first', $options);
        }
     $Inicio = new DateTime($this->request->data['AcaoPDV']['Inicio']);
 $this->request->data['AcaoPDV']['Inicio'] = $Inicio->format('d-m-Y H:i');
                             $Termino = new DateTime($this->request->data['AcaoPDV']['Termino']);
 $this->request->data['AcaoPDV']['Termino'] = $Termino->format('d-m-Y H:i');
                             $Created = new DateTime($this->request->data['AcaoPDV']['Created']);
 $this->request->data['AcaoPDV']['Created'] = $Created->format('d-m-Y H:i');
                             $Modified = new DateTime($this->request->data['AcaoPDV']['Modified']);
 $this->request->data['AcaoPDV']['Modified'] = $Modified->format('d-m-Y H:i');
                                }

/**
 * delete method
 * Powered by Frame2Days
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->AcaoPDV->id = $id;
      $this->AcaoPDV->set(array('Id'=>$id, 'Removed'=>'S'));

        if (!$this->AcaoPDV->exists()) {
            throw new NotFoundException(__('Invalid acao'));
        }
        $data = array('id' => $id, 'removed' => 'S');
        $this->request->allowMethod('post', 'delete');
        if ($this->AcaoPDV->save($data)) {
            $this->Flash->success(__('acao').' '.__('has been deleted.'));
        } else {
            $this->Flash->error(__('acao').' '.__('could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
