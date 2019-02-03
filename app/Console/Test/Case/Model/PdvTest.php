<?php
App::uses('Pdv', 'Model');

/**
 * Pdv Test Case
 *
 */
class PdvTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pdv'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pdv = ClassRegistry::init('Pdv');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pdv);

		parent::tearDown();
	}

}
