<?php
App::uses('WallInfo', 'Model');

/**
 * WallInfo Test Case
 *
 */
class WallInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.wall_info',
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
		'app.secretarie'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WallInfo = ClassRegistry::init('WallInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WallInfo);

		parent::tearDown();
	}

}
