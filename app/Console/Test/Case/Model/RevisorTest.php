<?php
App::uses('Revisor', 'Model');

/**
 * Revisor Test Case
 *
 */
class RevisorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.revisor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Revisor = ClassRegistry::init('Revisor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Revisor);

		parent::tearDown();
	}

}
