<?php
App::uses('AcaoSupervisorLocal', 'Model');

/**
 * AcaoSupervisorLocal Test Case
 *
 */
class AcaoSupervisorLocalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acao_supervisor_local'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcaoSupervisorLocal = ClassRegistry::init('AcaoSupervisorLocal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcaoSupervisorLocal);

		parent::tearDown();
	}

}
