<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Prefecture $Prefecture
 * @property Log $Log
 * @property OmbudsmanArea $OmbudsmanArea
 * @property Secretary $Secretary
 * @property Sector $Sector
 */
class User extends AppModel {

    public function beforeSave($options = array())
    {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password(
                $this->data['User']['password']
            );
        }
        $this->data["User"]['status'] = 1;
        if (!empty($this->data[$this->alias]['filepath'])) {
            $this->data[$this->alias]['image'] = $this->data[$this->alias]['filepath'];
        }
        return parent::beforeSave($options);
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'prefecture_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => array('Group.removed' => 'N','Group.active' => 'S'),
			'fields' => '',
			'order' => ''
		),
		'Prefecture' => array(
			'className' => 'Prefecture',
			'foreignKey' => 'prefecture_id',
			'conditions' => array('Prefecture.removed' => 'N','Prefecture.active' => 'S'),
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Log' => array(
			'className' => 'Log',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => array('Log.removed' => 'N','Log.active' => 'S'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OmbudsmanArea' => array(
			'className' => 'OmbudsmanArea',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => array('OmbudsmanArea.removed' => 'N','OmbudsmanArea.active' => 'S'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Secretary' => array(
			'className' => 'Secretary',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => array('Secretary.removed' => 'N','Secretary.active' => 'S'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Sector' => array(
			'className' => 'Sector',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => array('Sector.removed' => 'N','Sector.active' => 'S'),
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'dir'
                )
            )
        )
    );


}
