<?php
App::uses('ClienteEmail', 'Model');

/**
 * ClienteEmail Test Case
 *
 */
class ClienteEmailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cliente_email'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClienteEmail = ClassRegistry::init('ClienteEmail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClienteEmail);

		parent::tearDown();
	}

}
