<?php
App::uses('OmbudsmanArea', 'Model');

/**
 * OmbudsmanArea Test Case
 *
 */
class OmbudsmanAreaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ombudsman_area',
		'app.prefecture',
		'app.user',
		'app.group',
		'app.prefectures',
		'app.log',
		'app.sector'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OmbudsmanArea = ClassRegistry::init('OmbudsmanArea');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OmbudsmanArea);

		parent::tearDown();
	}

}
