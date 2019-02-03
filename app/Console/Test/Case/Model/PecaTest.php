<?php
App::uses('Peca', 'Model');

/**
 * Peca Test Case
 *
 */
class PecaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.peca'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Peca = ClassRegistry::init('Peca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Peca);

		parent::tearDown();
	}

}
