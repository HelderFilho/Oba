<?php
App::uses('AcaoPDV', 'Model');

/**
 * AcaoPDV Test Case
 *
 */
class AcaoPDVTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.acao_p_d_v'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcaoPDV = ClassRegistry::init('AcaoPDV');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcaoPDV);

		parent::tearDown();
	}

}
