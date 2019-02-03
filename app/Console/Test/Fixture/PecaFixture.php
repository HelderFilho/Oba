<?php
/**
 * PecaFixture
 *
 */
class PecaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'Responsavel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Data' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'Numero_Frascos' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Conforme' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Complexidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Numero_Blocos' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'Nao_Conformidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Falha_Identificacao' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Pagamento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Material_Trocado' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Material_Ausente' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'Responsavel' => 'Lorem ipsum dolor sit amet',
			'Data' => '2018-07-02 00:38:06',
			'Numero_Frascos' => 1,
			'Conforme' => 'Lorem ipsum dolor sit amet',
			'Complexidade' => 'Lorem ipsum dolor sit amet',
			'Numero_Blocos' => 1,
			'Nao_Conformidade' => 'Lorem ipsum dolor sit amet',
			'Falha_Identificacao' => 'Lorem ipsum dolor sit amet',
			'Pagamento' => 'Lorem ipsum dolor sit amet',
			'Material_Trocado' => 'Lorem ipsum dolor sit amet',
			'Material_Ausente' => 'Lorem ipsum dolor sit amet',
			'Removed' => 'Lorem ipsum dolor sit ame',
			'Created' => '2018-07-02 00:38:06',
			'Modified' => '2018-07-02 00:38:06'
		),
	);

}
