<?php
/**
 * FuncionarioFixture
 *
 */
class FuncionarioFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Funcionarios';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Endereco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Telefone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'CPF' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Cargo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Removed' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'Modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'Id', 'unique' => 1)
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
			'Id' => 1,
			'Nome' => 'Lorem ipsum dolor sit amet',
			'Endereco' => 'Lorem ipsum dolor sit amet',
			'Email' => 'Lorem ipsum dolor sit amet',
			'Telefone' => 'Lorem ipsum dolor sit amet',
			'CPF' => 'Lorem ipsum dolor sit amet',
			'Cargo' => 'Lorem ipsum dolor sit amet',
			'Removed' => 'Lorem ipsum dolor sit ame',
			'Created' => '2018-07-31 01:54:47',
			'Modified' => '2018-07-31 01:54:47'
		),
	);

}
