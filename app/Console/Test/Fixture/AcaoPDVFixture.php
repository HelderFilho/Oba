<?php
/**
 * AcaoPDVFixture
 *
 */
class AcaoPDVFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'AcaoPDV';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'AcaoPDVcol' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Cliente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Equipe' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Supervisor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Funcionarios' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Local' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Latitude' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Longitude' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Empresa' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Inicio' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'Termino' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'Fotos' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Videos' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'AcaoPDVcol' => 'Lorem ipsum dolor sit amet',
			'Cliente' => 'Lorem ipsum dolor sit amet',
			'Equipe' => 'Lorem ipsum dolor sit amet',
			'Supervisor' => 'Lorem ipsum dolor sit amet',
			'Funcionarios' => 'Lorem ipsum dolor sit amet',
			'Local' => 'Lorem ipsum dolor sit amet',
			'Latitude' => 'Lorem ipsum dolor sit amet',
			'Longitude' => 'Lorem ipsum dolor sit amet',
			'Empresa' => 'Lorem ipsum dolor sit amet',
			'Inicio' => '2018-08-31 14:50:40',
			'Termino' => '2018-08-31 14:50:40',
			'Fotos' => 'Lorem ipsum dolor sit amet',
			'Videos' => 'Lorem ipsum dolor sit amet',
			'Removed' => 'Lorem ipsum dolor sit ame',
			'Created' => '2018-08-31 14:50:40',
			'Modified' => '2018-08-31 14:50:40'
		),
	);

}
