<?php
App::uses('Trabalho', 'Model');

/**
 * Trabalho Test Case
 *
 */
class TrabalhoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trabalho'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trabalho = ClassRegistry::init('Trabalho');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trabalho);

		parent::tearDown();
	}

}
