<?php
/**
 * SlideFixture
 *
 */
class SlideFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Responsavel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Data' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Numero_Lâminas' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Conforme' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'Motivos_Conformidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'Responsavel' => 'Lorem ipsum dolor sit amet',
			'Data' => 'Lorem ipsum dolor sit amet',
			'Numero_Lâminas' => 1,
			'Conforme' => 1,
			'Motivos_Conformidade' => 'Lorem ipsum dolor sit amet'
		),
	);

}
