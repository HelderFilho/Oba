<?php
/**
 * EquipeFixture
 *
 */
class EquipeFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'Equipe';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Nome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'Removed' => 'Lorem ipsum dolor sit ame',
			'Created' => '2018-08-07 02:48:06',
			'Modified' => '2018-08-07 02:48:06'
		),
	);

}
