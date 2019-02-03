<?php
App::uses('AppModel', 'Model');
/**
 * Trabalho Model
 *
 */
class Trabalho extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Trabalhos';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Funcionarios_Id' => array(
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
}
