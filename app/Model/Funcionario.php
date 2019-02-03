<?php
App::uses('AppModel', 'Model');
/**
 * Funcionario Model
 *
 */
class Funcionario extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Funcionarios';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Id';

}
