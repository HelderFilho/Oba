<?php
App::uses('AcaoCliente', 'Model');

/**
 * AcaoCliente Test Case
 *
 */
class AcaoClienteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acao_cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcaoCliente = ClassRegistry::init('AcaoCliente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcaoCliente);

		parent::tearDown();
	}

}
