<?php
/**
 * PdvFixture
 *
 */
class PdvFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'pdv';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IdAcao' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Supervisor' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Promotor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Loja' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Produto' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Preco' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'EstoqueInicial' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'EstoqueFinal' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'PrecoConcorrente1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'PrecoConcorrente2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Vendas' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'TrocaBrindes' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Abordagens' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'Supervisor' => 1,
			'Promotor' => 'Lorem ipsum dolor sit amet',
			'Loja' => 'Lorem ipsum dolor sit amet',
			'Produto' => 'Lorem ipsum dolor sit amet',
			'Preco' => 'Lorem ipsum dolor sit amet',
			'EstoqueInicial' => 'Lorem ipsum dolor sit amet',
			'EstoqueFinal' => 'Lorem ipsum dolor sit amet',
			'PrecoConcorrente1' => 'Lorem ipsum dolor sit amet',
			'PrecoConcorrente2' => 'Lorem ipsum dolor sit amet',
			'Vendas' => 'Lorem ipsum dolor sit amet',
			'TrocaBrindes' => 'Lorem ipsum dolor sit amet',
			'Abordagens' => 'Lorem ipsum dolor sit amet'
		),
	);

}
