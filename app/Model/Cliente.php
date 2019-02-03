<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 */
class Cliente extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Clientes';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Id';

}
