<?php
/**
 * ClienteEmailFixture
 *
 */
class ClienteEmailFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'ClienteEmail';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IdCliente' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'IdCliente' => 1,
			'Email' => 'Lorem ipsum dolor sit amet'
		),
	);

}
