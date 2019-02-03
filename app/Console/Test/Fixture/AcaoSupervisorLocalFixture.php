<?php
/**
 * AcaoSupervisorLocalFixture
 *
 */
class AcaoSupervisorLocalFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'AcaoSupervisorLocal';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'IdAcao' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'IdSupervisor' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Local' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'IdSupervisor' => 1,
			'Local' => 'Lorem ipsum dolor sit amet'
		),
	);

}
