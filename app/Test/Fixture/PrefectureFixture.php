<?php
/**
 * PrefectureFixture
 *
 */
class PrefectureFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'active' => array('type' => 'string', 'null' => false, 'default' => 'S', 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'removed' => array('type' => 'string', 'null' => false, 'default' => 'N', 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'neighborhood' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'uf' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name_mayor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cpf' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2017-11-08 15:57:13',
			'modified' => '2017-11-08 15:57:13',
			'active' => 'Lorem ipsum dolor sit ame',
			'removed' => 'Lorem ipsum dolor sit ame',
			'name' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet',
			'neighborhood' => 'Lorem ipsum dolor sit amet',
			'number' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'uf' => '',
			'name_mayor' => 'Lorem ipsum dolor sit amet',
			'cpf' => 'Lorem ipsum '
		),
	);

}
