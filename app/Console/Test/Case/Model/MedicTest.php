<?php
App::uses('Medic', 'Model');

/**
 * Medic Test Case
 *
 */
class MedicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medic = ClassRegistry::init('Medic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medic);

		parent::tearDown();
	}

}
