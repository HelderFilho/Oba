<?php
App::uses('ClientesPDV', 'Model');

/**
 * ClientesPDV Test Case
 *
 */
class ClientesPDVTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.clientes_p_d_v'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ClientesPDV = ClassRegistry::init('ClientesPDV');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ClientesPDV);

		parent::tearDown();
	}

}
