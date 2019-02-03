<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();
    public $components = array('Paginator');




    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
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
                        $conditions['Trabalho.' . $param_name . ' LIKE'] = '%' . urldecode(urldecode($value)) . '%';
                        } else {
                        $conditions['Trabalho.' . $param_name . ' ='] = urldecode(urldecode($value));
                        }
                }
            }
        }
        
        $this->Trabalho->recursive = 0;
        $this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
        $options = array('Trabalho.removed' => 'N');
        $this->set('trabalhos', $this->Paginator->paginate($options));
        
            }



    public function notification()
    {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $user = CakeSession::read('Auth.User.id');
        $this->loadModel("Notification");
        $notifications = $this->Notification->find('all', array('conditions' => array('Notification.removed' => 'N', 'Notification.active' => 'S', 'Notification.user_id' => $user)));
        $retorno = [];
        foreach ($notifications as $notification) {
            $retorno = array('msg' =>'', 'contador' => 0);

            if ($notification['Notification']['type'] == 'D') {
                $retorno['msg'] .= "Existem novos documentos para serem pagos.";
            }
            if ($retorno !== "") {
                $retorno['msg'] .= "\n";
            }
            if ($notification['Notification']['type'] == 'C') {
                $retorno['msg'] .= "Existem novos clientes para serem ativados.";
            }
            $notification['Notification']['removed'] = 'S';
            $this->Notification->save($notification);

            $retorno['contador'] = 0;
            $this->loadModel("Document");
            $documents = $this->Document->find('first', array('fields' => array('Count(Document.id)   AS total'), 'conditions' => array('Document.removed' => 'N', 'Document.active' => 'N')));
            $retorno['contador'] += $documents[0]['total'];

            $this->loadModel("Client");
            $clients = $this->Client->find('first', array('fields' => array('Count(Client.id)   AS total'), 'conditions' => array('Client.removed' => 'N', 'Client.active' => 'N')));
            $retorno['contador'] += $clients[0]['total'];

        }


        return json_encode((empty($retorno)) ? false : $retorno);
    }
}
