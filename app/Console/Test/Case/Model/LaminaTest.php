<?php
App::uses('Lamina', 'Model');

/**
 * Lamina Test Case
 *
 */
class LaminaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lamina'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lamina = ClassRegistry::init('Lamina');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lamina);

		parent::tearDown();
	}

}
