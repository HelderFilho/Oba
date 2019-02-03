<?php
App::uses('Acao', 'Model');

/**
 * Acao Test Case
 *
 */
class AcaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Acao = ClassRegistry::init('Acao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Acao);

		parent::tearDown();
	}

}
