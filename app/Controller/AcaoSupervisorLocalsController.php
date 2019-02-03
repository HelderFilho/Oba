<?php
App::uses('AppController', 'Controller');
/**
 * AcaoSupervisorLocals Controller
 *
 */
class AcaoSupervisorLocalsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;


	public function salvar($idAcao, $idSupervisor, $Local){
		$this->AcaoSupervisorLocal->create();
		$this->request->data['AcaoSupervisorLocal']['IdAcao'] = $idAcao;
		$this->request->data['AcaoSupervisorLocal']['IdSupervisor'] = $idSupervisor;
		$this->request->data['AcaoSupervisorLocal']['Local'] = $Local;
		$this->AcaoSupervisorLocal->save($this->request->data);
	}

public function encerrar($id = null){

		$this->AcaoSupervisorLocal->updateAll(
				array('AcaoSupervisorLocal.Encerrado'=>"'S'"),
				array('AcaoSupervisorLocal.IdAcao'=>$id)
			);
}


	public function retornaLocais($idAcao){
		return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('DISTINCT AcaoSupervisorLocal.Local'),
			'conditions'=>array('AcaoSupervisorLocal.IdAcao' => $idAcao)
				));
	}

	public function retornaSupervisores($idAcao){
		return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('DISTINCT AcaoSupervisorLocal.IdSupervisor'),
			'conditions'=>array('AcaoSupervisorLocal.IdAcao' => $idAcao)
				));
	}

	public function retornaTodosIdsSupervisores(){
		return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('DISTINCT AcaoSupervisorLocal.IdSupervisor')
		));
	}

	public function retornaTodosSupervisores($idAcao){
		return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('AcaoSupervisorLocal.IdSupervisor', 'AcaoSupervisorLocal.Local'),
			'conditions'=>array('AcaoSupervisorLocal.IdAcao' => $idAcao)
				));

	}


	public function retornaQuantidadeSupervisores($idSupervisor){
		return $this->AcaoSupervisorLocal->find('count', array(
			'conditions'=> array('AcaoSupervisorLocal.IdSupervisor'=>$idSupervisor)
		));
	}


	public function retornaAcoesPorCliente($idCliente){
	return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('DISTINCT AcaoSupervisorLocal.IdAcao'),
			'conditions'=>array('AcaoSupervisorLocal.IdCliente' => $idCliente)
				));
	}

public function retornaAcoesPorSupervisor($idSupervisor){
	return $this->AcaoSupervisorLocal->find('all', array(
			'fields'=>array('DISTINCT AcaoSupervisorLocal.IdAcao'),
			'conditions'=>array('AcaoSupervisorLocal.IdSupervisor' => $idSupervisor)
				));
	}


}
