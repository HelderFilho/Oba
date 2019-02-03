<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model
{
    /**
     * @param array $queryData
     * @return array|bool
     * @author Edson Lima
     */
    public function beforeFind($queryData)
    {
//        if (!empty(CakeSession::read('Auth.User'))) {
//            if (parent::beforeFind($queryData) !== false) {
//                if ($this->defaultSystem($this->alias)) {
//                    $defaultConditions = array('or' => [
//                        $this->alias . '.id' => empty(CakeSession::read('Auth.User.Prefecture.id')) ? 0 : CakeSession::read('Auth.User.Prefecture.id')
//                    ]);
//                    $queryData['conditions'] = array_merge_recursive((array)$defaultConditions, (array)$queryData['conditions']);
//                    return $queryData;
//                } else {
//                    $defaultConditions = array($this->alias . '.id' => empty(CakeSession::read('Auth.User.Prefecture.id')) ? 0 : CakeSession::read('Auth.User.Prefecture.id'));
//                    $queryData['conditions'] = array_merge_recursive((array)$defaultConditions, (array)$queryData['conditions']);
//                    return $queryData;
//                }
//            }
//            return false;
//        }
    }

    /**
     * a ideia e qua antes de salva qualquer coisa ele pegue o ID da empresa logada CASO NÃO TENHA ID VAI CAIR NA FABTECH  ID 1
     * @param array $options
     * @return bool
     * @author Edson Lima
     */
    public function beforeSave($options = array())
    {
//        if ($this->exceptions($this->alias) || $this->alias == "User") {
//            if (empty($this->data[$this->alias]['prefecture_id'])) {
//                $this->data[$this->alias]['prefecture_id'] = empty(CakeSession::read('Auth.User.Prefecture.Prefecture.id')) ? 1 : CakeSession::read('Auth.User.Prefecture.Prefecture.id');
//            }
//        }
//        return true;
    }

    private function defaultSystem($nameModel)
    {
        switch ($nameModel) {
            case 'AcceptTerm';
                return true;
            case 'Department';
                return true;
            case 'Group';
                return true;
            case 'User';
                return true;
            case 'MessageBoard';
                return true;
            case 'OmbudsmanArea';
                return true;
            case 'Population';
                return true;
            case 'Prefecture';
                return true;
            case 'Secretary';
                return true;
            case 'WallInfo';
                return true;
            case 'Sector';
                return true;
            default :
                return false;

        }
    }
    public function afterSave($created, $options = array())
    {
        $request = new CakeRequest();
        $newData['User'] = CakeSession::read('Auth.User');
        $newData['User']['ip'] = $request->clientIp();
        $newData = $this->data;
        CakeLog::write('log', json_encode($newData));
    }

    /**
     *
     */
    protected function saveLog()
    {
        $newData = $this->read(null, $this->id);
        CakeLog::write('log', json_encode($newData));
    }
}
