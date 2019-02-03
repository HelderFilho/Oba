<?php
App::uses('Bedroom', 'Model');

/**
 * Bedroom Test Case
 *
 */
class BedroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bedroom',
		'app.accommodation'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bedroom = ClassRegistry::init('Bedroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bedroom);

		parent::tearDown();
	}

}
