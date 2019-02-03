<?php
App::uses('Pacient', 'Model');

/**
 * Pacient Test Case
 *
 */
class PacientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacient'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pacient = ClassRegistry::init('Pacient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pacient);

		parent::tearDown();
	}

}
