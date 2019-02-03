<?php
/**
 * TrabalhoFixture
 *
 */
class TrabalhoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Trabalhos';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Funcionarios_Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'Local' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'Funcionarios_Id' => 1,
			'Local' => 'Lorem ipsum dolor sit amet'
		),
	);

}
