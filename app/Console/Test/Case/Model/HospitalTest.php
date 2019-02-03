<?php
App::uses('Hospital', 'Model');

/**
 * Hospital Test Case
 *
 */
class HospitalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hospital'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hospital = ClassRegistry::init('Hospital');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hospital);

		parent::tearDown();
	}

}
