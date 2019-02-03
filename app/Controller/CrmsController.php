<?php
App::uses('AppController', 'Controller');
/**
 * Crms Controller
 *
 */
class CrmsController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;

		public function RetornaTodosCrm($id){
			return $this->Crm->find('all', array(
				'conditions'=>array('Crm.IdAcao'=>$id)
			));
		}
		public function RetornaCRM($id){
       	return $this->Crm->find('all',
       	array('conditions'=>array('Crm.IdAcao' => $id)
       ));
}

}
