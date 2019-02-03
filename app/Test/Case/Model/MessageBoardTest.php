<?php
App::uses('MessageBoard', 'Model');

/**
 * MessageBoard Test Case
 *
 */
class MessageBoardTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.message_board',
		'app.prefecture',
		'app.accept_term',
		'app.department',
		'app.secretary',
		'app.user',
		'app.group',
		'app.log',
		'app.ombudsman_area',
		'app.sector',
		'app.secretarie',
		'app.wall_info'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MessageBoard = ClassRegistry::init('MessageBoard');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MessageBoard);

		parent::tearDown();
	}

}
