<?php
App::uses('FuncionariosPDV', 'Model');

/**
 * FuncionariosPDV Test Case
 *
 */
class FuncionariosPDVTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.funcionarios_p_d_v'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FuncionariosPDV = ClassRegistry::init('FuncionariosPDV');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FuncionariosPDV);

		parent::tearDown();
	}

}
