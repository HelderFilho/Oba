<?php
/**
 * WallInfoFixture
 *
 */
class WallInfoFixture extends CakeTestFixture {

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
		'arquivo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'link' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dir' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'message_board_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_wall_infos_message_boards1_idx' => array('column' => 'message_board_id', 'unique' => 0)
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
			'created' => '2018-01-08 22:23:05',
			'modified' => '2018-01-08 22:23:05',
			'active' => 'Lorem ipsum dolor sit ame',
			'removed' => 'Lorem ipsum dolor sit ame',
			'arquivo' => 'Lorem ipsum dolor sit amet',
			'link' => 'Lorem ipsum dolor sit amet',
			'dir' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'message_board_id' => 1
		),
	);

}
