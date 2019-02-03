<?php
/**
 * AcaoClienteFixture
 *
 */
class AcaoClienteFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'AcaoCliente';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IdAcao' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'IdCliente' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'IdCliente' => 1
		),
	);

}
