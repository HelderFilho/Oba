<?php
/**
 * CrmFixture
 *
 */
class CrmFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'crm';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IdAcao' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Endereco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Telefone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Quantidade' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Cupom' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Valor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Loja' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Nascimento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'IdAcao' => 1,
			'Nome' => 'Lorem ipsum dolor sit amet',
			'Endereco' => 'Lorem ipsum dolor sit amet',
			'Email' => 'Lorem ipsum dolor sit amet',
			'Telefone' => 'Lorem ipsum dolor sit amet',
			'Quantidade' => 1,
			'Cupom' => 'Lorem ipsum dolor sit amet',
			'Valor' => 'Lorem ipsum dolor sit amet',
			'Loja' => 'Lorem ipsum dolor sit amet',
			'Nascimento' => 'Lorem ipsum dolor sit amet'
		),
	);

}
