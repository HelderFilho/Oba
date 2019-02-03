<?php
require_once 'Classes/PHPExcel.php';
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
CakePlugin::load('Upload');
App::import('Controller', 'ClienteEmails');



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
	public $components = array('Upload', 'Paginator');
	public $uses = array();

/**
 * index method
 * Powered by Frame2Days
 * @return void
 */

public function nomeCliente($id){
		return $this->Cliente->find('first', array(
			'fields' => array('Cliente.Nome'),
			'conditions' => array('Cliente.removed'=>'N', 'Cliente.id'=>$id)
		));
	}

public function redireciona(){
	return $this->redirect(array('controller'=>'pages', 'action'=>'index'));
}

	public function nomesClientes(){
	 $user = AuthComponent::user();
	return	$this->Cliente->find('list', array(
        'fields' => array('Cliente.Id',"Cliente.Nome"),
        'conditions' =>array('Cliente.removed'=>'N', 'OR'=>array('Cliente.empresa'=>$user['empresa'], 'Cliente.empresa'=>'Ambas'))
    ));
	}


	public function retornaResponsavel($cliente){
		$Cliente =  $this->Cliente->find('first', array(
			'fields'=>'Cliente.Responsavel',
			'conditions'=>array('Cliente.removed'=>'N', 'Cliente.Id'=>$cliente)
		));
		return $Cliente['Cliente']['Responsavel'];
	}



public function retornaEmail($cliente){
		$Cliente =  $this->Cliente->find('first', array(
			'fields'=>'Cliente.Email',
			'conditions'=>array('Cliente.removed'=>'N', 'Cliente.Id'=>$cliente)
		));
		return $Cliente['Cliente']['Email'];
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
 $user = AuthComponent::user();
   	$options = array('Cliente.removed' => 'N', 'OR'=>array('Cliente.empresa'=>$user['empresa'], 'Cliente.empresa'=>'Ambas'));
			$this->set('clientes', $this->Paginator->paginate($options));
	}



public function todos(){
	 $user = AuthComponent::user();
        return $this->Cliente->find('all',array('Cliente.removed' => 'N', 'Cliente.empresa'=>$user['empresa']));

	}		

public function apagarFotos ($dir = null){
	$pasta = new Folder ($dir);
	$arquivos = $pasta->find('.*\.(png|jpg|jpeg)', true);     
		foreach ($arquivos as $arquivo) {
			unlink ($dir . DS . $arquivo);
			# code...
		}
}
public function apagarPlanilhas ($dir = null){
	$pasta = new Folder ($dir);
	$arquivos = $pasta->find('.*\.xls', true);     
		foreach ($arquivos as $arquivo) {
			unlink ($dir . DS . $arquivo);
			# code...
		}
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



	public function importarExcel(){



		
$host = 'fabtech.com.br';
$user = 'sistemao_user';
$pass = '4Fj345=[9Fhm';
$database = 'sistemao_sistena';
$conn = mysqli_connect($host, $user, $pass, $database);
	
$dirFotos = new Folder(WWW_ROOT.'planilhas'.DS.'clientes');
$fotosPasta =WWW_ROOT.DS.'/planilhas/clientes';
$fotos = $dirFotos->find('.*\.(xls)', true);          
$cont = 0;
		 foreach ($fotos as $foto ){
			$objReader = new PHPExcel_Reader_Excel5();
			$objReader->setReadDataOnly(true);
			$objPHPExcel = $objReader->load($fotosPasta.DS.$foto);
					
			//TOTAL COLUNAS
			$colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
			$total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);
			
			//TOTAL LINHAS
			$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
			$Imprimir;
			for($coluna = 2; $coluna<=$total_linhas; $coluna++){
			$cont++;	
		
			   $Nome = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $coluna)->getValue());
				//1 é razao social
			   $CNPJ = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $coluna)->getValue());
			   //3 é CPF
			   $Email = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $coluna)->getValue());
			   $CEP = 	utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $coluna)->getValue());
			   //6 é estado
			   $Cidade = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $coluna)->getValue());
			   $Endereco = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $coluna)->getValue()) .', '. utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $coluna)->getValue()) . ' ' . utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $coluna)->getValue());
			   $Bairro = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $coluna)->getValue());			   
			   $Telefone = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $coluna)->getValue());			   

			 	   $user = AuthComponent::user();
  
			 	$Empresa =   $user['empresa'];         

			   $sql = "INSERT INTO Clientes (Id, CNPJ, Nome, Responsavel, Endereco, Email, Telefone,Empresa, Bairro,
				CEP, Cidade,Item_Novo, Removed, Created, Modified, IdUser) VALUES(NULL, '$CNPJ', '$Nome', '', '$Endereco',
				'$Email','$Telefone', '$Empresa', '$Bairro', '$CEP','$Cidade','','N', '','', '');";
			 	$query = mysqli_query($conn, $sql); 


			  //   echo "<th> ".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue());
			}
		 }
		 return $this->redirect(array('action' => 'index'));


	}


	public function add() {
		$ClienteEmail = new ClienteEmailsController();
		App::uses('Sanitize', 'Utility');
	
		if ($this->request->is('post')) {
			$this->Cliente->create();
			

			$file = $this->request->data['Cliente']['Excel'];
	
				if ($file['name']==''){
					if (empty($this->request->data['Cliente']['Nome'])||empty($this->request->data['Cliente']['IdUser']) || empty($this->request->data['Cliente']['Responsavel'])){
						$this->Flash->error("Nome, Usuário ou Responsável vazios, por favor preencha os campos");
					}else{



				     $Created = new DateTime($this->request->data['Cliente']['Created']);
    	             $this->request->data['Cliente']['Created'] = $Created->format('Y-m-d H:i');
        	         $Modified = new DateTime($this->request->data['Cliente']['Modified']);
            	     $this->request->data['Cliente']['Modified'] = $Modified->format('Y-m-d H:i');
                	 
	
                	 if ($this->request->data['Cliente']['Duplicar']=='Não'){
	                    if ($this->Cliente->save($this->request->data)) {
								$qtdEmails = intval($this->request->data['Cliente']['QuantidadeEmails']);
								$Cliente = $this->Cliente->getLastInsertID();
									for ($i=1; $i<=$qtdEmails;$i++){
										$Email = $this->request->data['email'.$i];
										$ClienteEmail->salvar($Cliente, $Email);
									}




							$this->Upload->uploadLogo($this->request->data['Cliente']['Logomarca'], $this->request->data['Cliente']['Nome']);
							$this->Flash->success(__('Cliente').' '.__('has been saved.'));
        		            return $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Flash->error(__('cliente').' '.__('could not be saved. Please, try again.'));        
						}
					}	else{
	                    $this->Cliente->save($this->request->data); 
	                   	$this->request->data['Cliente']['Duplicar'] = "Não";
	                    $this->add();
						$this->Flash->success(__('Cliente').' '.__('has been saved.'));
       		            return $this->redirect(array('action' => 'index'));
                     
						}
}				





				}else{
					$dir = WWW_ROOT . DS . 'planilhas' . DS . 'clientes';
					$this->apagarPlanilhas($dir);
					$this->Upload->uploadExcel($this->request->data['Cliente']['Excel'],'clientes');
					$this->importarExcel();
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
            $logo = $this->request->data['Cliente']['Logomarca'];
            	if (!$logo['name']==''){
            		$dir = WWW_ROOT . DS . 'logomarcas' . DS . $this->request->data['Cliente']['Nome'];
            		$this->apagarFotos($dir);
            		$this->Upload->uploadLogo($this->request->data['Cliente']['Logomarca'], $this->request->data['Cliente']['Nome']);
            	}




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
		$this->Cliente->set(array('Id'=>$id, 'Removed'=>'S'));

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
